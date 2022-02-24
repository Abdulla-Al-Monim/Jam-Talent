<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
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
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    //all user manage by admin
    public function all()
    {
        $users       = User::orderBy('name','asc')->get();

        return view('backend.pages.users.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

         $nUser = User::all();
            $user                       = new User();
            $user->email                = $request->email;
            $user->password             = Hash::make($request->password);
            $user->user_type_id         = $request->account_type;
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
            return redirect()->route('home.page');
            
            
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
            $user->password             = Hash::make($request->password);
            $user->user_type_id         = 0;
            
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
            'url' => 'testserver.jamtalent.net/login' 
        ];
        Mail::to($email)->send(new WelcomeMail($mailInfo));
            return redirect()->route('home.page');
            return redirect()->route('home.page');
            
            
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
