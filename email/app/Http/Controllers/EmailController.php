<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
class EmailController extends Controller
{
    public function sendEmail()
    {
        $data['title'] = "This is Test Mail Tuts Make";
 
        Mail::send('emails.myemail', $data, function($message) {
 
            $message->to('atecrecrutamento@gmail.com', 'Receiver Name')
 
                    ->subject('Tuts Make Mail');
        });
 
        if (Mail::failures()) {
           return response()->json('Sorry! Please try again latter');
         }else{
           return response()->json('Great! Successfully send in your mail');
         }
    }
}