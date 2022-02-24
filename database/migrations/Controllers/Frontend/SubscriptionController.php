<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Subscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
class SubscriptionController extends Controller
{
   public function store(Request $request){
        $this->validate($request,[
            'email' => 'required',
            ]);
        $subscription = new Subscription;
        $subscription->email     = $request->email; 
        $subscription->save();
        $email = $subscription->email;
        $mailInfo = [
            'title' => 'Thank You
                Your subscription has been confirmed. You’ve been added to our list and will hear from us soon... You will get the latest news on the world of freelance and recruitment and Be the first to be informed.',
            'url' => 'testserver.jamtalent.net'
        ];
        Mail::to($email)->send(new WelcomeMail($mailInfo));
        return redirect()->back();
    }
}
