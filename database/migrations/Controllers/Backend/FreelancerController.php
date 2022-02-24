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

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

use Image;
use File;
use Auth;
class FreelancerController extends Controller
{


    public function all()
    {
        $freelancers = User::orderBy('id','asc')->where('user_type_id',1)->get();
        return view('backend.pages.admin.allFreelancer',compact('freelancers'));
    }
    // valid the freelancer
    public function activeFreelancer($id)
    {
        $freelancer = User::find($id);
        $freelancer->verified = 1;
        $freelancer->save();
        return redirect()->route('freelancer.all');
    }
    public function enActive($id)
    {
        $freelancer = User::find($id);
        $freelancer->verified = 0;
        $freelancer->save();
        return redirect('user.dashbord');
    }


    public function edit()
    {
         //$freelancer = Freelancer:: where('user_id',Auth::user()->user_id);
        $user = User::find(Auth::user()->id);
        return view('backend.pages.freelancer.edit',compact('user'));
    }

    public function update(Request $request)
    {
         $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        
            ]);
        $user = User::find(Auth::user()->id);
        $user->email                = $request->email;
        $user->first_name           = $request->first_name;
        $user->last_name            = $request->last_name;
        $user->language             = $request->language;
        $user->sort_description     = $request->sort_description;
        $user->description          = $request->description;
        if ($request->image) {
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->getClientOriginalExtension();
            // $img = Image::make($image->getRealPath());
            // $img->resize(100, 100);
            $location               = public_path('images/freelancer/' . $img);
            Image::make($image)->resize(100,100)->save($location);
            $user->image            = $img;
        }

        $full_name = $request->first_name . ' ' . $request->last_name;
        $user->full_name            = $full_name;
        if( is_null($user->user_name))
        {
            
            $full_name = str_replace(' ','',$full_name);
            $user_name               = $full_name . rand(0,100);
            $user->user_name         = $user_name;
            $user->gender                = $request->gender;
            $user->slug              = Str::slug($user_name); 
        }
        else
        {
            $user_name               = $request->user_name;
            $user_name =str_replace(' ','',$user_name );
            $user->user_name         = $user_name;
            $user->gender                = $request->gender;
            $user->slug              = Str::slug($user_name);
        }
        $user->location             = $request->longitude;
        $user->hourly_rate           = $request->hourly_rate;
        if ( $request->file ) 
        {
            $file                    = $request->file('file');
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
            $user->file               = $fileName;
        }
        $user->location               = $request->nationality;
        // $user->password               = Hash::make($request->new_password);
        $user->save();
        return redirect()->back();

    }
        //Add skill 
    public function addSkill(Request $request)
    {
        $skill = new Skill;
        $skill->name                = $request->name;
        $skill->user_id           = Auth::user()->id;
        $skill->save();
       return redirect()->back();

    }

    //edit social media 
    public function socialMedia()
    {
        $social = SocialMedia::where('user_id',Auth::user()->id)->first();
       return view('backend.pages.freelancer.setting.socialMedia',compact('social'));
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
        return redirect()->back();
    }
    //edit social media 
    public function skill()
    {
        $skill = Skill::where('user_id',Auth::user()->id)->first();
       return view('backend.pages.freelancer.setting.skill',compact('skill'));
    }

    public function skillUpdate(Request $request)
    {
        $sk = Skill::where('user_id',Auth::user()->id)->first();
        $skill = Skill::Find($sk->id);
        $skill->skill_one = $request->skill_one;
        $skill->skill_two = $request->skill_two;
        $skill->skill_three = $request->skill_three;
        $skill->skill_four = $request->skill_four;
        $skill->skill_five = $request->skill_five;
        $skill->skill_six = $request->skill_six;
        $skill->save();
        return redirect()->back();
    }

    // add freelancer by superadmin
    public function add(){

        return view('backend.pages.superAdmin.freelancer.add');
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
                //$user->gender                = $request->gender;
                // $admin->user_name         = $user_name;
                // $admin->slug              = Str::slug($user_name);
            }
            $user->gender                = $request->gender;
            $user->password             = Hash::make($request->password);
            $user->user_type_id         = 1;
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
            return redirect()->route('freelancer.all');
            
            
    }
   
}
