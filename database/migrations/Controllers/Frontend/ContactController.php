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
            'title' => 'Thank You
                Your Contract. we will contact with as soon ass possable.',
            'url' => 'testserver.jamtalent.net'
        ];
        Mail::to($email)->send(new WelcomeMail($mailInfo));
        return redirect()->back();
    }
}
