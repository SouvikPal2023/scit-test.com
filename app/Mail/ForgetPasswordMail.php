<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     $body = $this->data;
    //     return $this->subject('Password Reset')->view('partials.forgetPasswordemail',compact('body'));
    // }

    public function build()
{
    $body = $this->data;
    $subject = 'Password Reset';
    $to = 'souvik.pal@3raredynamics.com'; // Add the recipient's email address here
    
    \Log::info("Sending email to: $to with subject: $subject");
   
    return $this->subject($subject)->view('partials.forgetPasswordemail', compact('body'));
}

}
