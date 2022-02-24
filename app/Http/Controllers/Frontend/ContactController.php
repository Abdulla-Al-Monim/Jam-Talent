<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class ContactController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|max:120',
            'email' => 'required',
            'phone' => 'required|min:11|numeric',
            'message'=>'required'
            ]);
        $contact = new Contact;
        $contact->name      = $request->name;
        $contact->email     = $request->email; 
        $contact->phone     = $request->phone;
        $contact->message   = $request->message;
        $contact->save();
        $email = $contact->email;
        $mailInfo = [
            'title' => 'Thank You for
                 Contract Us. We will contact you as soon as possable.',
            'url' => 'jamtalent.net'
        ];
        Mail::to($email)->send(new WelcomeMail($mailInfo));
        $notification=array(
            'message'=>'Your Mail submitted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
