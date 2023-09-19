<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmailTemplate;
use App\GeneralSetting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class UserInviteEmailController extends Controller
{
    public function index(){

        $page_title = 'User Invite Email Template';
        $general_setting = GeneralSetting::first(['email_from', 'email_template']);
        return view('admin.user_invite_email.index',compact('general_setting','page_title'));
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
