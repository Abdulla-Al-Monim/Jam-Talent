<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Backend\Address;
use App\Models\Backend\Skill;
use App\Models\Backend\SocialMedia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Backend\FreelancerActivity;
use App\Models\Backend\EmployerActivity;
use App\Mail\WelcomeMail;
use App\Models\Backend\ReviewEmployer;
use Image;
use File;
use Auth;
class EmployerController extends Controller
{
    

    // all freelancer show in admin 

    public function all()
    {
        $employers = User::orderBy('id','asc')->where('user_type_id',3)->get();
        return view('backend.pages.admin.allEmployer',compact('employers'));
    }
    // valid the employer
    public function activeEmployer($id)
    {
        $employer = User::find($id);
        $employer->verified = 1;
        $employer->save();
        return redirect()->route('employer.all');
    }

   
    public function show($id)
    {
        $emp = User::Find($id);
        $employerReviews = ReviewEmployer::orderBy('id','desc')->where('user_id',$id)->paginate(3);
      
        if ($emp) {
           return view('frontend.pages.employer.profile',compact('emp','employerReviews'));
        }
        else{
            return redirect()->route('home.page');
        }
    }

    
    public function edit()
    {

        $employer = User::find(Auth::user()->id);
        return view('backend.pages.employer.edit',compact('employer'));
    }

   
    public function update(Request $request)
    {
         $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'language' => 'required',
        'sort_description' => 'required',
        'gender' => 'required',
        'location' => 'required',
            ]);
        
        $employer = User::find(Auth::user()->id);
        $employer->email                = $request->email;
        $employer->first_name           = $request->first_name;
        $employer->last_name            = $request->last_name;
        $employer->language             = $request->language;
        $employer->sort_description     = $request->sort_description;
        $employer->description          = $request->description;
        if ($request->image) {
            if ($employer->image) {
                 unlink("images/employer/".$employer->image);
            }
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/employer/' . $img);
            Image::make($image)->resize(600,600)->save($location);
            $employer->image            = $img;
        }
        $full_name = $request->first_name . ' ' . $request->last_name;
        $employer->full_name            = $full_name;
        $user_name = str_replace(' ','',$request->user_name);
        $employer->user_name         = $user_name;
        $employer->gender                = $request->gender;
        $employer->slug              = Str::slug($user_name); 
        $employer->location             = $request->location;
        // $employer->password               = Hash::make($request->new_password);
        if(Auth::user()->status == null){

           //social media table
            $socialMedia                = new SocialMedia();
            $socialMedia ->user_id      = $employer->id;
            $socialMedia->save();
            //employer activity
            $employerActivity                 = new EmployerActivity;
                $employerActivity->user_id        = $employer->id;
                $employerActivity->save();
            $employer->status = 1;

        }
        $employer->save();
        if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'تم التحديث بنجاح',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Başarıyla Güncelle',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
            'message'=>'Update Successfully',
            'alert-type'=>'success'
        );
        }
        return redirect()->back()->with($notification);
    }

    //edit social media 
    public function socialMedia()
    {
        $social = SocialMedia::where('user_id',Auth::user()->id)->first();
       return view('backend.pages.employer.setting.socialMedia',compact('social'));
    }
    //edit socail media
    public function socialMediaUpdate(Request $request)
    {
        $social = SocialMedia::where('user_id',Auth::user()->id)->first();
        $socialMedia = SocialMedia::Find($social->id);
        $socialMedia->facebook = $request->facebook;
        $socialMedia->github = $request->github;
        $socialMedia->linkedin = $request->linkedin;
        $socialMedia->google_plus = $request->google_plus;
        $socialMedia->twitter = $request->twitter;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->save();
        if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'تم التحديث بنجاح',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Başarıyla Güncelle',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
            'message'=>'Update Successfully',
            'alert-type'=>'success'
        );
        }
        return redirect()->back()->with($notification);
    }
    // add employer by superadmin
    public function add(){

        return view('backend.pages.superAdmin.employer.add');
    }

    public function store(Request $request)
    {
             $request->validate([
            'email' => 'required|unique:users', 'string', 'email', 'max:255', 'unique:User',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:8'
                ]);

         
            $user                       = new User();
            $user->email                = $request->email;
            $user->email_verified_at    = Carbon::now();
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
            $user->user_type_id         = 3;
            $user->status = 1;
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
        if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'إضافة صاحب العمل بنجاح',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'İşveren Başarıyla Ekledi',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
            'message'=>'Employer Add Successfully',
            'alert-type'=>'success'
        );
        }
            return redirect()->route('employer.all')->with($notification);
            
            
    }
}
