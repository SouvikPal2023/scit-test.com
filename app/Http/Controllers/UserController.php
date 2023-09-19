<?php
namespace App\Http\Controllers;
use Image;
use App\Exam;
use App\User;
use App\Page;
use App\Coupon;
use App\Deposit;
use App\CouponUser;
use App\Transaction;
use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Lib\GoogleAuthenticator;
use App\{Country, State, City};
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Announcement;
use App\NewsLetter;
use App\AboutTheApp;
use App\UpcomingEvent;
use App\ThankYouSponser;
use App\HealthRecommendation;
use App\GuidelineOfWHO;

class UserController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }
    public function home()
    {
        $page_title = 'Dashboard';
        $user = User::first();
        $totalDeposit = Deposit::where('user_id',$user->id)->sum('amount');
        $totalTrx = Transaction::where('user_id',$user->id)->count();
        $examList =  Exam::where('status',1)->where('end_date','>=',\Carbon\Carbon::now()->toDateString())->whereHas('subject',function($sub){
            $sub->where('status',1)->whereHas('category', function($cat){
                $cat->where('status',1);
            });
        })->latest()->with('subject.category')->take(8)->get();
        return view($this->activeTemplate . 'user.dashboard', compact('page_title','totalDeposit','totalTrx','examList'));
    }
    public function profile()
    {
        $data['page_title'] = "Profile Setting";
        $data['user'] = Auth::user();
        $data['countries'] = Country::get();
        $data['State'] = State::where('country_id',$data['user']->address->country)->get();
        $data['City'] = City::where('state_id',$data['user']->address->state)->get();
        return view($this->activeTemplate. 'user.profile-setting', $data);
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
    public function submitProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'address' => "sometimes|required|max:80",
            'state' => 'sometimes|required|max:80',
            'zip' => 'sometimes|required|max:40',
            'city' => 'sometimes|required|max:50',
            'image' => 'mimes:png,jpg,jpeg'
        ],[
            'firstname.required'=>'First Name Field is required',
            'lastname.required'=>'Last Name Field is required'
        ]);
        $in['firstname'] = $request->firstname;
        $in['lastname'] = $request->lastname;
        $in['date_of_birth'] = date('Y-m-d',strtotime($request->date_of_birth));
        $in['race'] = $request->race;
        $in['gender'] = $request->gender;
        $in['address'] = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'city' => $request->city,
        ];
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'assets/images/user/profile/' . $filename;
            $in['image'] = $filename;
            $path = './assets/images/user/profile/';
            $link = $path . $user->image;
            if (file_exists($link)) {
                @unlink($link);
            }
            $size = imagePath()['profile']['user']['size'];
            $image = Image::make($image);
            $size = explode('x', strtolower($size));
            $image->resize($size[0], $size[1]);
            $image->save($location);
        }
        $user->fill($in)->save();
        $notify[] = ['success', 'Profile Updated successfully.'];
        return back()->withNotify($notify);
    }
    public function changePassword()
    {
        $data['page_title'] = "Change Password";
        return view($this->activeTemplate . 'user.password', $data);
    }
    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                $notify[] = ['success', 'Password Changes successfully.'];
                return back()->withNotify($notify);
            } else {
                $notify[] = ['error', 'Current password not match.'];
                return back()->withNotify($notify);
            }
        } catch (\PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }
    /*
     * Deposit History
     */
    public function depositHistory(Request $request)
    {
        $search = $request->search;
        if($search){
            $page_title = "Search Result of $search";
            $logs = auth()->user()->deposits()->with(['gateway'])->where('trx','like',"%$search%")->paginate(getPaginate(15));
        } else {
            $page_title = 'Deposit History';
            $logs = auth()->user()->deposits()->with(['gateway'])->latest()->paginate(getPaginate(15));
        }
        $empty_message = 'No history found.';
        return view($this->activeTemplate . 'user.deposit_history', compact('page_title', 'empty_message', 'logs','search'));
    }
    public function trxHistory(Request $request)
    {
        $search = $request->search;
        if($search){
            $page_title = "Search Result of $search";
            $logs = auth()->user()->transactions()->where('trx','like',"%$search%")->paginate(getPaginate(15));
        } else {
            $page_title = 'Transaction History';
            $logs = auth()->user()->transactions()->latest()->paginate(getPaginate(15));
        }
        $empty_message = 'No history found.';
        return view($this->activeTemplate . 'user.trxHistory', compact('page_title', 'empty_message', 'logs','search'));
    }
    /*
     * Withdraw Operation
     */
    public function show2faForm()
    {
        $gnl = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $secret);
        $prevcode = $user->tsc;
        $prevqr = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $prevcode);
        $page_title = 'Two Factor';
        return view($this->activeTemplate.'user.twofactor', compact('page_title', 'secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
    }
    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $ga = new GoogleAuthenticator();
        $secret = $request->key;
        $oneCode = $ga->getCode($secret);
        if ($oneCode === $request->code) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->tv = 1;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_ENABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Google Authenticator Enabled Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->withNotify($notify);
        }
    }
    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        $user = auth()->user();
        $ga = new GoogleAuthenticator();
        $secret = $user->tsc;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;
        if ($oneCode == $userCode) {
            $user->tsc = null;
            $user->ts = 0;
            $user->tv = 1;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_DISABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Two Factor Authenticator Disable Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->with($notify);
        }
    }
    public function applyCoupon(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'coupon'=> 'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }
        $coupon = Coupon::where('coupon_code','=',strtoupper($request->coupon))->where('status','=',1)->first();
        if(!$coupon){
            return response()->json(['coupon'=>['Sorry! Invalid coupon']]);
        }
        if($coupon->use_limit <= 0){
            return response()->json(['coupon'=>['Sorry! Coupon limit has been reached']]);
        }
        if($coupon->start_date > Carbon::now()->toDateString()){
            return response()->json(['coupon'=>['Sorry! Coupon is not valid in this date']]);
        }
        if($coupon->end_date < Carbon::now()->toDateString()){
            return response()->json(['coupon'=>['Sorry! Coupon has been expired']]);
            $coupon->status = 0;
            $coupon->update();
        }
        $general = GeneralSetting::first();
        $exam = Exam::find($request->examid);
        if(!$exam){
            return response()->json(['coupon'=>['Sorry! Something went wrong']]);
        }
        $couponUser = CouponUser::where('user_id',auth()->id())->where('coupon_id',$coupon->id)->get();
        if($exam->exam_fee < $coupon->min_order_amount){
            return response()->json(['coupon'=>["Sorry! Minimum exam price is required for this coupon is ".getAmount($coupon->min_order_amount).' '.$general->cur_text]]);
        }
        if($couponUser->count() >= $coupon->usage_per_user){
            return response()->json(['coupon'=>['Sorry! Your Coupon limit has been reached']]);
        } else {
            $couponUser = new CouponUser();
            $couponUser->user_id = auth()->id();
            $couponUser->coupon_id = $coupon->id;
            $couponUser->save();
        }
        if($coupon->exam_id == 0){
            if($coupon->amount_type == 2){
                $newPrice = $exam->exam_fee - $coupon->coupon_amount;
            } else{
                $discount = $exam->exam_fee*($coupon->coupon_amount/100);
                $newPrice = $exam->exam_fee - $discount;
            }
            session()->put('newPrice',$newPrice);
            session()->put('coupon', $coupon->coupon_code);
            return response()->json(['yes'=>"Coupon applied! new price is $newPrice".$general->cur_text,'newPrice'=>"$newPrice".' '.$general->cur_text]);
        } else {
            if($coupon->exam_id != $exam->id){
                return response()->json(['coupon'=>['Sorry! Coupon not valid for this exam']]);
            } else {
                if($coupon->amount_type == 2){
                    $newPrice = $exam->exam_fee - $coupon->coupon_amount;
                } else{
                    $discount = $exam->exam_fee*($coupon->coupon_amount/100);
                    $newPrice = $exam->exam_fee - $discount;
                }
                session()->put('newPrice',$newPrice);
                session()->put('coupon', $coupon->coupon_code);
                return response()->json(['yes'=>"Coupon applied! new price is $newPrice".$general->cur_text,'newPrice'=>"$newPrice".' '.$general->cur_text]);
            }
        }
    }

    public function pages($slug)
    {
        $page = Page::where('tempname',$this->activeTemplate)->where('slug',$slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections'] = $page;
        return view($this->activeTemplate . '/user/pages', $data);
    }

    public function userinvitemail(){

        $page_title = 'User Invite Email Template';
        $general_setting = GeneralSetting::first(['email_from', 'email_template']);
        return view('templates.basic.user.user-invite-email',compact('general_setting','page_title'));
    }

    public function introduction(Request $request){
        $page_title = "Introduction";

        return view($this->activeTemplate.'user.introduction',compact('page_title',));
    }

    public function facilitators(Request $request){
        $page_title = "Facilitators";

        return view($this->activeTemplate.'user.facilitators',compact('page_title',));
    }

    public function discussion(Request $request){
        $page_title = "Discussion";

        return view($this->activeTemplate.'user.discussion',compact('page_title',));
    }

    public function resources(Request $request){
        $page_title = "Resources";

        return view($this->activeTemplate.'user.resources.resources',compact('page_title',));
    }

    public function news_letter(){
        $page_title = "News Letter";

        $data['all_news_letter'] = NewsLetter::orderBy('id', 'DESC')->get();
        foreach ($data['all_news_letter'] as $key => $value) {
            $timestamp = strtotime($value['created_at']);
            if(date('d-m-Y') == date('d-m-Y',$timestamp)){
                $data['all_news_letter'][$key]['time'] = 'Today'; 
            }
            elseif(date('m-Y') == date('m-Y',$timestamp)){
                $data['all_news_letter'][$key]['time'] = 'Earlier This Month';
            }
            elseif(date('Y') == date('Y',$timestamp)){
                $data['all_news_letter'][$key]['time'] = 'Earlier This Year';
            }else{
                $data['all_news_letter'][$key]['time'] = date('d M Y',$timestamp);
            }
            $data['all_news_letter'][$key]['date'] = date('d M Y',$timestamp);
        }

        return view($this->activeTemplate.'user.resources.news_letter',compact('page_title', 'data'));
    }

    public function announcement(){
        $page_title = "Announcement";

        $data['all_announcement'] = Announcement::orderBy('id', 'DESC')->get();
        foreach ($data['all_announcement'] as $key => $value) {
            $timestamp = strtotime($value['created_at']);
            if(date('d-m-Y') == date('d-m-Y',$timestamp)){
                $data['all_announcement'][$key]['time'] = 'Today'; 
            }
            elseif(date('m-Y') == date('m-Y',$timestamp)){
                $data['all_announcement'][$key]['time'] = 'Earlier This Month';
            }
            elseif(date('Y') == date('Y',$timestamp)){
                $data['all_announcement'][$key]['time'] = 'Earlier This Year';
            }else{
                $data['all_announcement'][$key]['time'] = date('d M Y',$timestamp);
            }
            $data['all_announcement'][$key]['date'] = date('d M Y',$timestamp);
        }

        return view($this->activeTemplate.'user.resources.announcement',compact('page_title', 'data'));
    }

    public function about_the_app(){
        $page_title = "About The App";

        $about_the_app = AboutTheApp::orderBy('id', 'DESC')->get()->first();

        return view($this->activeTemplate.'user.resources.about_the_app',compact('page_title', 'about_the_app'));
    }

    public function upcoming_event(){
        $page_title = "Upcoming Event";

        $upcoming_event = UpcomingEvent::orderBy('id', 'DESC')->get()->first();

        return view($this->activeTemplate.'user.resources.upcoming_event',compact('page_title', 'upcoming_event'));
    }

    public function thank_you_sponser(){
        $page_title = "Thank you Sponser";

        $thank_you_sponser = ThankYouSponser::orderBy('id', 'DESC')->get()->first();

        return view($this->activeTemplate.'user.resources.thank_you_sponser',compact('page_title', 'thank_you_sponser'));
    }

    public function health_recommendation(){
        $page_title = "Health Recommendation";

        $health_recommendation = HealthRecommendation::orderBy('id', 'DESC')->get()->first();

        return view($this->activeTemplate.'user.resources.health_recommendation',compact('page_title', 'health_recommendation'));
    }

    public function guideline_of_who(){
        $page_title = "Guideline Of WHO";
        
        $guideline_of_who = GuidelineOfWHO::orderBy('id', 'DESC')->get()->first();

        return view($this->activeTemplate.'user.resources.guideline_of_who',compact('page_title', 'guideline_of_who'));
    }

    public function sendemail(Request $request){

        $request->validate([
            'email' => 'required',
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);
        $emails = explode(",",$request->email);
        
            /*$headers = "From: scit@example.com";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $general = GeneralSetting::first();
            if ($general->en != 1 || !$general->email_from) {
                return;
            }*/
        
    
        try{
            foreach ($emails as $emailid) {
                /*$reciver_name = strstr($emailid,'@',true);
                $message = shortCodeReplacer("{{message}}", $request->message, $general->email_template);
                $message = shortCodeReplacer("{{name}}", $reciver_name, $message);*/
                send_general_email($emailid, $request->subject, $request->message, strstr($emailid,'@',true));
                // $err = mail($emailid,$request->subject,strip_tags($message),$headers);
            }
        } catch (\Exception $exp) {
            $notify[] = ['error', 'Invalid Credential'];
            return back()->withNotify($notify);
        }

        $notify[] = ['success', 'Mail Send successfully.'];
        return back()->withNotify($notify);
    }
}