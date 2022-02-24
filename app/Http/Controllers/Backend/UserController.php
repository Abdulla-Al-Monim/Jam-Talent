<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Carbon\Carbon;
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
class UserController extends Controller
{
    
    //all user manage by admin
    public function all()
    {
        $users       = User::orderBy('name','asc')->get();

        return view('backend.pages.users.all',compact('users'));
    }

    
    public function create()
    {
        $userTypes       = UserType::orderBy('name','desc')->get();   
        return view('frontend.pages.registation.registation',compact('userTypes'));
    }
    //admin register
    public function adminRegister()
    {
        $userTypes       = UserType::orderBy('name','desc')->get();   
        return view('frontend.pages.registation.adminRegister',compact('userTypes'));
    }
    //freelancer or employer register
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
            $user->password             = Hash::make($request->password);
            $user->user_type_id         = $request->account_type;
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
                if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'تم إنشاء حسابك',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Hesabınız oluşturuldu',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
            'message'=>'Your account created',
            'alert-type'=>'success'
        );
        }
        
        Mail::to($email)->send(new WelcomeMail($mailInfo));
            return redirect()->route('login')->with($notification);
            
            
    }
    //Admin register
    public function adminRegisterStore(Request $request)
    {
         $request->validate([
        'email' => 'required|unique:users', 'string', 'email', 'max:255', 'unique:User',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required_with:password|same:password|min:8'
            ]);

            $user                       = new User();
            $user->email                = $request->email;
            $user->email_verified_at    = Carbon::now();
            $user->password             = Hash::make($request->password);
            $user->user_type_id         = 0;
            $user->status = 1;
            
            $user->save();

            // //Address table
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
            $email = $user->email;
            $mailInfo = [
            'title' => 'Your account created.',
            'url' => 'jamtalent.net/login' 
        ];
        Mail::to($email)->send(new WelcomeMail($mailInfo));
            return redirect()->route('login');
            
            
    }
    //add note
    public function storeNote(Request $request)
    {
        $note                   = new Note;
        $note->user_id          =  Auth::user()->id;
        $note->priority         = $request->priority;
        $note->note             = $request->note;
        $note->save();
        return redirect()->route('user.dashbord');
    }
    //delete note
    public function deleteNote($id)
    {
        $note                   = Note::Find($id);

        $note->delete();
        return redirect()->route('user.dashbord');
    }

    public function chnagePasswoed()
    {
        

        return view('backend.pages.changePassword');
    }

    // change passwoed store
    public function chnagePasswoedStore(Request $request)
    {
        $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8',
        'password_confirmation' => 'required|min:8',
    ]);

    $db_pass = Auth::user()->password;
    $current_password = $request->old_password;
    $newpass = $request->new_password;
    $confirmpass = $request->password_confirmation;

   if (Hash::check($current_password,$db_pass)) {
      if ($newpass === $confirmpass) {
          User::findOrFail(Auth::id())->update([
            'password' => Hash::make($newpass)
          ]);

                  
                if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'نجاح تغيير كلمة المرور الخاصة بك. الآن تسجيل الدخول بكلمة مرور جديدة',
            'alert-type'=>'success'
        );
                    } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Şifre Değişikliği Başarılı. Şimdi Yeni Şifre ile Giriş Yapın',
            'alert-type'=>'success'
        );
                    }  
        else{
            $notification=array(
            'message'=>'Your Password Change Success. Now Login With New Password',
            'alert-type'=>'success'
        );
                }
          
        return Redirect()->route('login')->with($notification);

      }

      else {
                if(session()->get('locale') == 'ar') {
                    $notification=array(
                    'message'=>'كلمة المرور الجديدة وتأكيد كلمة المرور ليسا متطابقين',
                    'alert-type'=>'success'
                        );
                    } 
                elseif(session()->get('locale') == 'tk'){
                    $notification=array(
                    'message'=>'Yeni Parola Ve Parolayı Onaylayın Aynı Değil',
                    'alert-type'=>'success'
                    );
                }  
                else{
                    $notification=array(
            'message'=>'New Password And Confirm Password Not Same',
            'alert-type'=>'success'
        );
                }
        
        return Redirect()->back()->with($notification);
      }
   }else {
            if(session()->get('locale') == 'ar') {
                $notification=array(
                'message'=>'كلمة المرور القديمة غير متطابقة',
                'alert-type'=>'error'
                );
            } 
            elseif(session()->get('locale') == 'tk'){
                 $notification=array(
                'message'=>'Eski Şifre Eşleşmiyor',
                'alert-type'=>'error'
                );
            }  
        else{
             $notification=array(
                'message'=>'Old Password Not Match',
                'alert-type'=>'error'
                );
            }
   
    return Redirect()->back()->with($notification);
   }
        
    }

    //change password
    public function changePassword()
    {
        return view('backend.pages.password.password');
    }
    
}
