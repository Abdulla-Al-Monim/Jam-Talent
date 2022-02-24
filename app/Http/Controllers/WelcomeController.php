<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;


class WelcomeController extends Controller
{
    public function mailSend() {
        $email = 'abdullaalmonim@gmail.com';
   
        $mailInfo = [
            'title' => 'Thank You
Your subscription has been confirmed. You’ve been added to our list and will hear from us soon... You will get the latest news on the world of freelance and recruitment and Be the first to be informed.',
            'url' => 'https://www.remotestack.io'
        ];
  
        Mail::to($email)->send(new WelcomeMail($mailInfo));
   
        return response()->json([
            'message' => 'Mail has sent.'
        ], Response::HTTP_OK);
    }
}