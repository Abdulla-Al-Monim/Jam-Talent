<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\Address;
use App\Models\Backend\Skill;
use App\Models\Backend\SocialMedia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Image;
use File;
use Auth;
class AdminController extends Controller
{
   //sitting page
    public function edit()
    {
        $admin = User::find(Auth::user()->id);
        return view('backend.pages.admin.edit',compact('admin'));
    }

    public function all()
    {
        $admins = User::orderBy('id','asc')->where('user_type_id',2)->get();
        return view('backend.pages.admin.user.allAdmin',compact('admins'));
    }
    public function update(Request $request)
    {
        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        
            ]);
        
        $admin = User::find(Auth::user()->id);
        $admin->email                = $request->email;
        $admin->first_name           = $request->first_name;
        $admin->last_name            = $request->last_name;
        $admin->sort_description     = $request->sort_description;
        $admin->description          = $request->description;
        if ($request->image) {
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->getClientOriginalExtension();
            $location               = public_path('images/admin/' . $img);
            Image::make($image)->resize(100,100)->save($location);
            $admin->image            = $img;
        }
        $full_name = $request->first_name . ' ' . $request->last_name;
        $admin->full_name            = $full_name;
        if( is_null($admin->user_name))
        {
            
            $full_name = str_replace(' ','',$full_name);
            $user_name               = $full_name . rand(0,100);
            $admin->user_name         = $user_name;
            $admin->slug              = Str::slug($user_name); 
                $admin->gender                = $request->gender;
        }
        else
        {
            // $user_name               = $request->user_name;
            // $user_name =str_replace(' ','',$user_name );
            $admin->gender                = $request->gender;
            // $admin->user_name         = $user_name;
            // $admin->slug              = Str::slug($user_name);
        }
        //$admin->password               = Hash::make($request->new_password);
        $admin->save();
        
        return redirect()->route('admin.edit');
    }
    //admin active
    public function activeAdmin($id)
    {
        $employer = User::find($id);
        $employer->verified = 1;
        $employer->save();
        return redirect()->back();
    }

    //admin en-active
    public function enActiveAdmin($id)
    {
        $employer = User::find($id);
        $employer->verified = 0;
        $employer->save();
        return redirect()->back();
    }
    // add admin by superadmin
    public function add(){

        return view('backend.pages.superAdmin.admin.add');
    }
    //add admin
    public function store(Request $request)
    {
             $request->validate([
            'email' => 'required|unique:users', 'string', 'email', 'max:255', 'unique:User',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:8'
                ]);

         
            $user                       = new User();
            $user->email                = $request->email;
            $user->first_name           = $request->first_name;
            $user->last_name            = $request->last_name;
            $full_name = $request->first_name . ' ' . $request->last_name;
            $user->full_name            = $full_name;
            if( is_null($user->user_name))
            {
                
                $full_name = str_replace(' ','',$full_name);
                $user_name               = $full_name . rand(0,100);
                $user->user_name         = $user_name;
                $user->slug              = Str::slug($user_name); 
                    
            }
            else
            {
                // $user_name               = $request->user_name;
                // $user_name =str_replace(' ','',$user_name );
                //$user->gander                = $request->gander;
                // $admin->user_name         = $user_name;
                // $admin->slug              = Str::slug($user_name);
            }
            $user->gender                = $request->gender;
            $user->password             = Hash::make($request->password);
            $user->user_type_id         = 2;
            $user->save();

            //Address table
            // $address                    = new Address();
            // $address->user_id         =$user->id;
            // $address->save();

            //skill table
            $skill                      = new Skill();
            $skill->user_id             = $user->id;
            $skill->save();

            //social media table
            $socialMedia                = new SocialMedia();
            $socialMedia ->user_id      = $user->id;
            $socialMedia->save();
            if ($user->user_type_id == 1) {
                $FreelancerActivity                 = new FreelancerActivity;
                $FreelancerActivity->user_id        = $user->id;
                $FreelancerActivity->save();
            }
            else if ($user->user_type_id == 3) {
                $employerActivity                 = new EmployerActivity;
                $employerActivity->user_id        = $user->id;
                $employerActivity->save();
            }
           $email = $user->email;
            $id = $user->id;
        $mailInfo = [
            'title' => 'Your account created.',
            'url' => 'http://localhost:8000/' 
        ];
        Mail::to($email)->send(new WelcomeMail($mailInfo));
            return redirect()->route('admin.all');
            
            
    }
}
