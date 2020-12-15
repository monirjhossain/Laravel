<?php

namespace App\Http\Controllers;
use Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contact(){
        return view('contact');
    }

    function contactSubmit(Request $request){
        Mail::send('emails.contactmail',
        [
            'name' => $request->fname,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg
        ],
        function($mail) use ($request){
            $mail->from(env('MAIL_FROM_ADDRESS'), $request->fname);
            $mail->to(env('md.monirjhossain@gmail.com')->subject('contact message'));
        });
        return "Message has been sent";
    }
}
