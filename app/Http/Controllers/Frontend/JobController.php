<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Job;
use App\Models\BackJobContact;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Image;
use File;
class JobController extends Controller
{
    //download cadidate cv
    public function downloadCv($id)
    {
        
        $backJobContact = BackJobContact::Find($id);
        return response()->download(public_path('uploads/'.$backJobContact->file));
    }
    // apply 
    public function applyIndex(){
        return view('frontend.pages.job.apply');
    }

    //apply all
    public function allApply(){
        $backJobContacts = BackJobContact::orderBy('id','desc')->get();
        return view('backend.pages.superAdmin.grow',compact('backJobContacts'));
    }
    public function applyStore(Request $request){

        $request->validate([
        'contact_reason' => 'required',
        'interest_type_of' => 'required',
        'first_name' => 'required',
        'email'=>'required|email',
            ]);
        $jobApply = new BackJobContact();
        $jobApply->contact_reason = $request->contact_reason;
        $jobApply->interest_type_of = $request->interest_type_of;
        $jobApply->first_name = $request->first_name;
        $jobApply->last_name = $request->last_name;
        $jobApply->position = $request->position;
        $jobApply->organization_name = $request->organization_name;
        $jobApply->office_address = $request->office_address;
        $jobApply->email = $request->email;
        $jobApply->website_url_address = $request->website_url_address;
        $jobApply->linkedin_url = $request->linkedin_url;
        $jobApply->behance_link = $request->behance_link;
        $jobApply->github_link = $request->github_link;
        $jobApply->whatsapp_messaging_number = $request->whatsapp_messaging_number;
        $jobApply->cover_letter = $request->cover_letter;
        if ($request->file) {
            $file                   = $request->file('file');
            $fileName = time().'.'.$request->file->extension();  
   
            $request->file->move(public_path('uploads'), $fileName);
            $jobApply->file             = $fileName;
        }
        $jobApply->save();
        $email = $jobApply->email;
                if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'شكرا لك على الاتصال بنا',
            'alert-type'=>'success'
        );
        } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Bizimle iletişime geçtiğiniz için teşekkür ederiz',
            'alert-type'=>'success'
        );
        }  
        else{
            $notification=array(
            'message'=>'Thank you for you contact Us',
            'alert-type'=>'success'
        );
        }
        
       $mailInfo = [
            'title' => 'Thank You For You contact Us We will mail return as soon as possable',
            'url' => 'jamtalent.net' 
        ];
        Mail::to($email)->send(new WelcomeMail($mailInfo));
        return redirect()->back()->with($notification);
    }
    // featuread job show in home page
    public function subCategortyJob($name)
    {
        $subCategory = Category::where('name',$name)->first();
        $jobs = Job::orderBy('id','asc')->where('job_category',$name)->get();
        $jobCount = Job::orderBy('id','asc')->where('job_category',$name)->count();
        if ($jobCount == 0) {
            $jobs = Job::orderBy('id','asc')->where('status',1)->get();
        }
        if ($jobs) {
            return view('frontend.pages.job.subCategoryJob',compact('jobs','subCategory','jobCount'));
        }
        else{
            if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'Job not found',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Job not found',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
            'message'=>'Job not found',
            'alert-type'=>'success'
        );
        }
            return redirect()->back()->with($notification);
        }
        
    }
    // featuread job show in home page
    public function subCategortyJobSearch($name)
    {
        $subCategory = Category::where('name',$name)->first();
        $jobs = Job::orderBy('id','asc')->where('job_category',$name)->get();
        $jobCount = Job::orderBy('id','asc')->where('job_category',$name)->count();
        if ($jobCount == 0) {
            $jobs = Job::orderBy('id','asc')->get();
        }
        return view('frontend.pages.job.subCategoryJob',compact('jobs','subCategory','jobCount'));
    }

    // all job
    public function allJob()
    {
        
        $jobs = Job::orderBy('id','desc')->where('status',1)->where('freelancer_id',null)->paginate(6);
        return view('frontend.pages.job.all',compact('jobs'));
    }
    // all job
    public function searchJob(Request $request)
    {
        $location = $request->location;
        $title = $request->job_title;
        $jobs = Job::orderBy('id','desc')->orWhere('location' , 'LIKE' ,  '%'. $location.'%')->orWhere('job_title' , 'LIKE' ,  '%'. $title.'%')->paginate(6);
        $jobsCount = Job::orderBy('id','desc')->orWhere('location' , 'LIKE' ,  '%'. $location.'%')->orWhere('job_title' , 'LIKE' ,  '%'. $title.'%')->count();
        if ($jobs == null) {
            $jobs = Job::orderBy('id','desc')->take(6)->paginate(6);
        }
        else if($jobsCount == 0)
        {
            $jobs = Job::orderBy('id','desc')->paginate(6);
        }
        
        return view('frontend.pages.job.all',compact('jobs'));
    }
}
