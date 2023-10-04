<?php
namespace App\Http\Controllers\Auth;
use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserLogin;
use App\{Country, State, City};
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Transaction;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('regStatus')->except('registrationNotAllowed');
        $this->activeTemplate = activeTemplate();
    }

    public function fetchCountry(Request $request)
    {
        $data['country'] = Country::where("id",$request->countrymainid)->first();      
        return response()->json($data);
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function referralRegister($reference)
    {  
        $page_title = "Sign Up";
        session()->put('reference', $reference);
        $countries = Country::orderBy('phonecode', 'asc')->get();
        $info = json_decode(json_encode(getIpInfo()), true);
        $country_code = @implode(',', $info['code']);
        return view($this->activeTemplate . 'user.auth.registerNew', compact('countries','reference', 'page_title','country_code'));
    }
    public function showRegistrationForm()
    {
        $page_title = "Sign Up";
        $info = json_decode(json_encode(getIpInfo()), true);
        $countries = Country::orderBy('name', 'asc')->get();
        $country_code = @implode(',', $info['code']);
        return view($this->activeTemplate . 'user.auth.registerNew', compact('countries','page_title','country_code'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validate = Validator::make($data, [
            // 'firstname' => 'sometimes|required|string|max:60',
            // 'lastname' => 'sometimes|required|string|max:60',
            'firstname' => 'max:60',
            'lastname' => 'max:60',
            'email' => 'required|string|email|max:160|unique:users',
            'mobile' => 'required|string|max:30|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|alpha_num|unique:users|min:6',
            'captcha' => 'sometimes|required',
            'country_code' => 'required',
            'terms' => 'required',
            'dob' => 'required|string',
            'race' => 'required|string'
        ]);
        return $validate;
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $exist = User::where('mobile',$request->country_code.$request->mobile)->first();
        if ($exist) {
            $notify[] = ['error', 'Mobile number already exist'];
            return back()->withNotify($notify)->withInput();
        }
        if (isset($request->captcha)) {
            if (!captchaVerify($request->captcha, $request->captcha_secret)) {
                $notify[] = ['error', "Invalid Captcha"];
                return back()->withNotify($notify)->withInput();
            }
        }
//        dd($request->all());
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {   

        $gnl = GeneralSetting::first();
        $referBy = session()->get('reference');
        if ($referBy != null) {
            $referUser = User::where('username', $referBy)->first();
        } else {
            $referUser = null;
        }
        //User Create
        $user = new User();
        $user->firstname = isset($data['firstname']) ? $data['firstname'] : null;
        $user->lastname = isset($data['lastname']) ? $data['lastname'] : null;
        $user->email = strtolower(trim($data['email']));
        $user->password = Hash::make($data['password']);
        $user->gender = $data['gender'];
        $user->date_of_birth = date('Y-m-d', strtotime($data['dob']));
        $user->race = $data['race'];
        $user->username = trim($data['username']);
        $user->ref_by = ($referUser != null) ? $referUser->id : null;
        $user->mobile = $data['country_code'].$data['mobile'];
        $user->address = [
            'address' => '',
            'state' => isset($data['state']) ? $data['state'] : null,
            'zip' => '',
            'country' => isset($data['country']) ? $data['country'] : null,
            'city' => isset($data['city']) ? $data['city'] : null
        ];
        $user->status = 1;
        $user->ev = $gnl->ev ? 1 : 0;
        $user->sv = $gnl->sv ? 1 : 0;
        $user->ts = 0;
        $user->tv = 1;
        $user->balance = $gnl->registration_bonus;
        $user->save();

        // $transaction = new Transaction();
        // $transaction->user_id = $user->user_id;
        // $transaction->amount = $gnl->registration_bonus;
        // $transaction->post_balance = $gnl->registration_bonus;
        // $transaction->charge = 0;
        // $transaction->trx_type = '+';
        // $transaction->details = 'Registration Bonus';
        // $transaction->trx = 'Registration Bonus';
        // $transaction->save();

        //Login Log Create
        $ip = $_SERVER["REMOTE_ADDR"];
        $exist = UserLogin::where('user_ip',$ip)->first();
        $userLogin = new UserLogin();
        //Check exist or not
        if ($exist) {
            $userLogin->longitude =  $exist->longitude;
            $userLogin->latitude =  $exist->latitude;
            $userLogin->location =  $exist->location;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country =  $exist->country;
        }else{
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude =  @implode(',',$info['long']);
            $userLogin->latitude =  @implode(',',$info['lat']);
            $userLogin->location =  @implode(',',$info['city']) . (" - ". @implode(',',$info['area']) ."- ") . @implode(',',$info['country']) . (" - ". @implode(',',$info['code']) . " ");
            $userLogin->country_code = @implode(',',$info['code']);
            $userLogin->country =  @implode(',', $info['country']);
        }
        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip =  $ip;
        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();
        return $user;
    }
    public function registered()
    {
        return redirect()->route('user.home');
    }
}