<?php
namespace App\Http\Controllers\Admin;
use App\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
class GeneralSettingController extends Controller
{
    public function index()
    {
        $general = GeneralSetting::first();
        
        $page_title = 'General Settings';
        return view('admin.setting.general_setting', compact('page_title', 'general'));
    }

    public function update(Request $request)
    {
        $validation_rule = [
            'base_color' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
            'secondary_color' => ['nullable', 'regex:/^[a-f0-9]{6}$/i']
        ];

        $validator = Validator::make($request->all(), $validation_rule, []);
        $validator->validate();
        $general_setting = GeneralSetting::first();

        $request->merge(['ev' => isset($request->ev) ? 1 : 0]);
        $request->merge(['en' => isset($request->en) ? 1 : 0]);
        $request->merge(['sv' => isset($request->sv) ? 1 : 0]);
        $request->merge(['sn' => isset($request->sn) ? 1 : 0]);
        $request->merge(['registration' => isset($request->registration) ? 1 : 0]);
        $request->merge(['registration_bonus' => isset($request->registration_bonus) ? $request->registration_bonus : 0]);

        $general_setting->update($request->only(['sitename', 'cur_text', 'cur_sym', 'ev', 'en', 'sv', 'sn', 'registration', 'registration_bonus', 'base_color','secondary_color','contact_email','contact_phone','contact_loc','contact_map']));

        $notify[] = ['success', 'General Setting has been updated.'];

        return back()->with('success', 'General Setting has been updated.');
    }

    public function logoIcon()
    {
        $page_title = 'Logo & Icon';
        return view('admin.setting.logo_icon', compact('page_title'));
    }

    public function logoIconUpdate(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:jpg,jpeg,png',
            'favicon' => 'image|mimes:png',
        ]);

        if ($request->hasFile('logo')) {

            try {

                $path = imagePath()['logoIcon']['path'];
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                Image::make($request->logo)->save($path . '/logo.png');

            } catch (\Exception $exp) {

                $notify[] = ['error', 'Logo could not be uploaded.'];
                return back()->withNotify($notify);
            }

        }

        if ($request->hasFile('favicon')) {

            try {

                $path = imagePath()['logoIcon']['path'];
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                $size = explode('x', imagePath()['favicon']['size']);
                Image::make($request->favicon)->resize($size[0], $size[1])->save($path . '/favicon.png');

            } catch (\Exception $exp) {

                $notify[] = ['error', 'Favicon could not be uploaded.'];
                return back()->withNotify($notify);

            }

        }

        $notify[] = ['success', 'Logo Icons has been updated.'];

        return back()->withNotify($notify);
    }
}