<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\UserType;
use App\Models\Backend\Address;
use App\Models\Backend\Skill;
use App\Models\Backend\SocialMedia;
use App\Models\Backend\Note;
use App\Models\Backend\FreelancerActivity;
use App\Models\Backend\EmployerActivity;
use App\Notification\registationNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Auth;
class SuperAdminController extends Controller
{
    //edit social media 
    public function socialMedia()
    {
        $social = SocialMedia::where('user_id',Auth::user()->id)->first();
       return view('backend.pages.superAdmin.setting.socialMedia',compact('social'));
    }
}
