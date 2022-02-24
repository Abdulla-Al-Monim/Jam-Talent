<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Backend\UserType;
use App\Models\Backend\BankInfo;
use App\Models\Backend\Address;
use Illuminate\Support\Str;
use App\Models\Backend\Skill;
use App\Models\Backend\SocialMedia;
use App\Models\Backend\Note;
use App\Models\Backend\FreelancerActivity;
use App\Models\Backend\EmployerActivity;
use App\Models\Backend\FreelancerBalance;
use App\Notification\registationNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Image;
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
        $bankInfo = BankInfo::where('user_id',Auth::user()->id)->first();
        return view('backend.pages.freelancer.edit',compact('user','bankInfo'));
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
        $user = User::find(Auth::user()->id);
        $user->email                = $request->email;
        $user->first_name           = $request->first_name;
        $user->last_name            = $request->last_name;
        $user->language             = $request->language;
        $user->sort_description     = $request->sort_description;
        $user->description          = $request->description;
        
        if ($request->image) {
            if ($user->image) {
                 unlink("images/freelancer/".$user->image);
            }
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            // $img = Image::make($image->getRealPath());
            // $img->resize(100, 100);
            $location               = public_path('images/freelancer/' . $img);
            Image::make($image)->resize(300,300)->save($location);
            $user->image            = $img;
        }

        $full_name = $request->first_name . ' ' . $request->last_name;
        $user->full_name            = $full_name;
        
        $user_name = str_replace(' ','',$request->user_name);
        $user->user_name         = $user_name;
        $user->gender                = $request->gender;
        $user->slug              = Str::slug($user_name); 
        
        //$user->location             = $request->longitude;
        $user->hourly_rate           = $request->hourly_rate;
        if ( $request->file ) 
        {
            // if ($user->file) {
            //      unlink("uploads/".$user->file);
            // }
            $file                    = $request->file('file');
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
            $user->file               = $fileName;
        }
        
        $user->location               = $request->location;
        // $user->password               = Hash::make($request->new_password);
        if(Auth::user()->status == null){
            //skill
            $skill                      = new Skill();
            $skill->user_id             = $user->id;
            $skill->save();
           //social media table
            $socialMedia                = new SocialMedia();
            $socialMedia ->user_id      = $user->id;
            $socialMedia->save();
            //freelancer activity
            $FreelancerActivity                 = new FreelancerActivity;
            $FreelancerActivity->user_id        = $user->id;
            $FreelancerActivity->save();
            $user->status = 1;
            if ($request->radio == 1) {
                $request->validate([
                
                
                    ]);

                $bankInfo = new BankInfo;

                $bankInfo->user_id = Auth::user()->id;
                $bankInfo->payment_type = $request->radio;
                $bankInfo->account_name = $request->account_name;
                $bankInfo->account_number = $request->account_number;
                $bankInfo->bank_name = $request->bank_name;
                $bankInfo->bank_address = $request->bank_address;
                $bankInfo->swift_code = $request->swift_code;
                $bankInfo->iban_no = $request->iban_no;
                $bankInfo->passport_no = $request->passport_no;
                if ( $request->national_id_photo ) 
                {
                    $file                    = $request->file('national_id_photo');
                    $fileName = time().'.'.$request->national_id_photo->extension();
                    $request->national_id_photo->move(public_path('uploads'), $fileName);
                    $bankInfo->national_id_photo               = $fileName;
                }
               
                $bankInfo->save();
            }
            else{
                $request->validate([
                
                    ]);
                $bankInfo = new BankInfo;
                $bankInfo->user_id = Auth::user()->id;
                $bankInfo->payment_type = $request->radio;
                $bankInfo->account_name = $request->account_name;
                $bankInfo->account_number = $request->account_number;
                $bankInfo->bank_name = $request->bank_name;
                $bankInfo->bank_address = $request->bank_address;
                $bankInfo->swift_code = $request->swift_code;
                $bankInfo->iban_no = $request->iban_no;
                $bankInfo->passport_no = $request->passport_no;
                if ( $request->national_id_photo ) 
                {
                    $file                    = $request->file('national_id_photo');
                    $fileName = time().'.'.$request->national_id_photo->extension();
                    $request->national_id_photo->move(public_path('uploads'), $fileName);
                    $bankInfo->national_id_photo               = $fileName;
                }
               
                $bankInfo->save();
            }
        }
if(Auth::user()->status !== null){
        if ($request->radio === 1) {
                $request->validate([
                
                
                    ]);

            
                $bank = BankInfo::where('user_id',Auth::user()->id)->first();
                $bankInfo = BankInfo::Find($bank->id);

                $bankInfo->user_id = Auth::user()->id;
                $bankInfo->payment_type = $request->radio;
                $bankInfo->account_name = $request->account_name;
                $bankInfo->account_number = $request->account_number;
                $bankInfo->bank_name = $request->bank_name;
                $bankInfo->bank_address = $request->bank_address;
                $bankInfo->swift_code = $request->swift_code;
                $bankInfo->iban_no = $request->iban_no;
                $bankInfo->passport_no = $request->passport_no;
                if ( $request->national_id_photo ) 
                {
                    $file                    = $request->file('national_id_photo');
                    $fileName = time().'.'.$request->national_id_photo->extension();
                    $request->national_id_photo->move(public_path('uploads'), $fileName);
                    $bankInfo->national_id_photo               = $fileName;
                }
               
                $bankInfo->save();
            }
            else{
                $request->validate([
               
                    ]);
                $bank = BankInfo::where('user_id',Auth::user()->id)->first();
                $bankInfo = BankInfo::Find($bank->id);
                $bankInfo->user_id = Auth::user()->id;
                $bankInfo->payment_type = $request->radio;
                $bankInfo->account_name = $request->account_name;
                $bankInfo->account_number = $request->account_number;
                $bankInfo->bank_name = $request->bank_name;
                $bankInfo->bank_address = $request->bank_address;
                $bankInfo->swift_code = $request->swift_code;
                $bankInfo->iban_no = $request->iban_no;
                $bankInfo->passport_no = $request->passport_no;
                if ( $request->national_id_photo ) 
                {
                    $file                    = $request->file('national_id_photo');
                    $fileName = time().'.'.$request->national_id_photo->extension();
                    $request->national_id_photo->move(public_path('uploads'), $fileName);
                    $bankInfo->national_id_photo               = $fileName;
                }
               
                $bankInfo->save();
            }
}

        if ( $request->hasFile('cv') ) 
        {
            $file                    = $request->file('cv');
            $fileName = time().'.'.$request->cv->extension();
            $request->cv->move(public_path('uploads'), $fileName);
            $user->cv               = $fileName;
        }
        if ( $request->hasFile('portfolio') ) 
        {
            $file                    = $request->file('portfolio');
            $fileName = time().'.'.$request->portfolio->extension();
            $request->portfolio->move(public_path('uploads'), $fileName);
            $user->portfolio               = $fileName;
        }
        if ( $request->hasFile('qualification_certificate') ) 
        {
            $file                    = $request->file('qualification_certificate');
            $fileName = time().'.'.$request->qualification_certificate->extension();
            $request->qualification_certificate->move(public_path('uploads'), $fileName);
            $user->qualification_certificate               = $fileName;
        }
        if ( $request->hasFile('recommendation_letter') ) 
        {
            $file                    = $request->file('recommendation_letter');
            $fileName = time().'.'.$request->recommendation_letter->extension();
            $request->recommendation_letter->move(public_path('uploads'), $fileName);
            $user->recommendation_letter               = $fileName;
        }
        $user->file_link                = $request->file_link;
        $user->cv_link                = $request->cv_link;
        $user->portfolio_link                = $request->portfolio_link;
        $user->qualification_certificate_link                = $request->qualification_certificate_link;
        $user->recommendation_letter_link                = $request->recommendation_letter_link;
        $user->save();
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
    //create socail media
    public function socialMediaCreate(Request $request)
    {
        
        $socialMedia = new SocialMedia;
        $socialMedia->user_id = Auth::user()->id;
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
    //edit social media 
    public function skill()
    {
        $skill = Skill::where('user_id',Auth::user()->id)->first();
       return view('backend.pages.freelancer.setting.skill',compact('skill'));
    }
    //skill create
    public function skillCreate(Request $request)
    {
        
        $skill = new Skill;
        $skill->user_id = Auth::User()->id;
        $skill->skill_one = $request->skill_one;
        $skill->skill_two = $request->skill_two;
        $skill->skill_three = $request->skill_three;
        $skill->skill_four = $request->skill_four;
        $skill->skill_five = $request->skill_five;
        $skill->skill_six = $request->skill_six;
        $skill->save();
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
                //$user->gender                = $request->gender;
                // $admin->user_name         = $user_name;
                // $admin->slug              = Str::slug($user_name);
            }
            $user->gender                = $request->gender;
            $user->password             = Hash::make($request->password);
            $user->user_type_id         = 1;
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
            'message'=>'إضافة المترجم المستقل بنجاح',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Freelancer Başarıyla Ekledi',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
            'message'=>'Freelancer Add Successfully',
            'alert-type'=>'success'
        );
        }
        
        return redirect()->route('freelancer.all')->with($notification);
            
            
    }


    //bankinfo
    public function bankInfo($id){
        $bankInfo = BankInfo::Find($id);
        $freelancer = User::find($bankInfo->user_id);
        return view('backend.pages.admin.freelancerBankinfo',compact('bankInfo','freelancer'));
    }

    //download National id
    public function downloadNationalId($id)
    {
        
        $bankInfo = BankInfo::Find($id);
      
            return response()->download(public_path('uploads/'.$bankInfo->national_id_photo));
       
    }

    //freelancer earning
    public function earnig(){
        $freelancerBalances = FreelancerBalance::where('user_id',Auth::user()->id)->get();
        $totalBalance = FreelancerBalance::where('user_id',Auth::user()->id)->sum('balace');
        return view('backend.pages.freelancer.earning',compact('freelancerBalances','totalBalance'));
    }
   
}
