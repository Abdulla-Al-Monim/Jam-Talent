<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\JobType; 
use App\Models\Backend\Category;
use App\Models\Backend\Job;
use App\Models\Backend\JobApply;
use Image;
use File;
use Auth;
class JobController extends Controller
{
    
    public function create()
    {
        $jobTypes = JobType::orderBy('name','desc')->get();
        $categories = Category::orderBy('name','asc')->get();
        return view('backend.pages.employer.job.post',compact('jobTypes','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'job_title' => 'required',
        'location' => 'required',
        'job_type' => 'required',
        'job_category' => 'required',
        'min_salary' => 'required',
        'max_salary' => 'required',
        'description' => 'required',
        'file' => 'required',
        
            ]);
        $job                    = new Job();
        $job->user_id           = Auth::user()->id;
        $job->job_title         = $request->job_title;
        $job->location          = $request->location;
        $job->job_type          = $request->job_type;
        $job->job_category      = $request->job_category;
        $job->min_salary        = $request->min_salary;
        $job->max_salary        = $request->max_salary;
        $job->description       = $request->description;
        $job->status            = 1;
        if ( $request->file ) 
        {
            $file                   = $request->file('file');
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
            $job->file             = $fileName;
        }
        $job->save();
        return redirect()->route('user.dashbord');

    }

    // show single jon in fron
    public function show($id)
    {
        $Job = Job::Find($id);
        return view('frontend.pages.job.show',compact('Job'));
    }
    //apply job
    public function applyJob(Request $request, $id)
    {
        $job = Job::Find($id);
        $jobApply = new jobApply();
        $jobApply->job_id               = $job->id;
        $jobApply->freelancer_id        = Auth::user()->id;
        $jobApply->employer_id          = $job->user_id;
        $jobApply->name                 = $request->name;
        $jobApply->email                = $request->emailaddress;
        if ($request->file) {
            $file                   = $request->file('file');
            $fileName = time().'.'.$request->file->extension();  
   
            $request->file->move(public_path('uploads'), $fileName);
            $jobApply->file             = $fileName;
        }
        $jobApply->status = 0;
        $jobApply->save();
        return redirect()->route('job.show',$job->id);

    }
    //update Cv
    public function updateCvFreelancer($id, Request $request)
    {
        
        $jobApply = JobApply::Find($id);
        if ($request->file) {
            $file                   = $request->file('file');
            $fileName = time().'.'.$request->file->extension();  
   
            $request->file->move(public_path('uploads'), $fileName);
            $jobApply->file             = $fileName;
        }
        $jobApply->save(); 
        return redirect()->back();
        
    }
    // applied job freelancer
    public function appliedJob()
    {
        
        $jobApplies = JobApply::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->where('status',0)->get();
        return view('backend.pages.freelancer.job.appliedJob',compact('jobApplies'));

    }
    //freelancer active job List
     public function freelancerActiveJob()
    {
        
        $jobs = Job::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->get();
        return view('backend.pages.freelancer.job.activeJobs',compact('jobs'));

    }
    //
    // manage job by employer
    public function manageJob()
    {
        
        $jobs = job::orderBy('id','asc')->where('user_id',Auth::user()->id)->paginate(5);
        return view('backend.pages.employer.job.manageJob',compact('jobs'));

    }

    //delete job
    public function deleteJobEmployer($id)
    {
        $job = Job::Find($id);
        $job->delete();
        return redirect()->back();
    }

    // manage Candidate by employer
    public function manageCandidates($id)
    {
        
        $jobApplies = JobApply::orderBy('id','asc')->where('employer_id',Auth::user()->id)->where('job_id',$id)->get();
        // count job applies
         $count = JobApply::orderBy('id','asc')->where('employer_id',Auth::user()->id)->where('job_id',$id)->count();
         
        $job = Job::Find($id);
        return view('backend.pages.employer.job.manageCandidate',compact('jobApplies','job','count'));
        
    }

    //remove cadidate by employyer
    public function removeCandidate($id)
    {
        
        $jobApply = JobApply::Find($id);
        $jobApply->delete(); 
        return redirect()->back();
        
    }

    //approve cadidate by employer
    public function approveCandidate($id,$jobId)
    {
        
        $jobApply = JobApply::Find($id);
        $jobApply->status = 1;
        $jobApply->save();
        $job = Job::Find($jobId);
        $job->freelancer_id = $jobApply->freelancer_id;
        $job->save();
        return redirect()->back();
      

    }
    //download cadidate cv
    public function downloadCandidateCv($id)
    {
        
        $jobApply = JobApply::Find($id);
        return response()->download(public_path('uploads/'.$jobApply->file));
    }
    // All Post job Admin
    public function allPostJob()
    {
        if (Auth::user()->user_type_id == 2) 
        {
        $jobs = job::orderBy('id','asc')->where('status',1)->paginate(2);
        return view('backend.pages.admin.job.allPostJob',compact('jobs'));
        }
        else if (Auth::user()->user_type_id == 0) 
        {
        $jobs = job::orderBy('id','asc')->where('status',1)->paginate(2);
        return view('backend.pages.admin.job.allPostJob',compact('jobs'));
        }
        else
        {
            return view('frontend.pages.pages-404');
        }

    }

    // All week Post job Admin
    public function allPostJobWeek()
    {
        if (Auth::user()->user_type_id == 2) 
        {
            $date = \Carbon\Carbon::today()->subDays(7);
            $jobs = job::orderBy('id','asc')->where('created_at','>=',$date)->where('status',1)->paginate(5);
            return view('backend.pages.admin.job.allPostJob',compact('jobs'));
        }
        else if (Auth::user()->user_type_id == 0) 
        {

            $date = \Carbon\Carbon::today()->subDays(7);
            $jobs = job::orderBy('id','asc')->where('created_at','>=',$date)->where('status',1)->paginate(5);
            return view('backend.pages.admin.job.allPostJob',compact('jobs'));

        }
        else
        {
            return view('frontend.pages.pages-404');
        }

    }

    // All day Post job Admin
    public function allPostJobDay()
    {
        if (Auth::user()->user_type_id == 2) 
        {
            $date = \Carbon\Carbon::today();
            $jobs = job::orderBy('id','asc')->where('created_at','>=',$date)->where('status',1)->paginate(5);
            return view('backend.pages.admin.job.allPostJob',compact('jobs'));
        }
        else if (Auth::user()->user_type_id == 0) 
        {

            $date = \Carbon\Carbon::today()->subDays(7);
            $jobs = job::orderBy('id','asc')->where('created_at','>=',$date)->where('status',1)->paginate(5);
            return view('backend.pages.admin.job.allPostJob',compact('jobs'));

        }
        else
        {
            return view('frontend.pages.pages-404');
        }

    }
    //update Cv
    public function updateDocumentJobEmoloyer($id, Request $request)
    {
        
        $job = Job::Find($id);
        if ($request->file) {
            $file                   = $request->file('file');
            $fileName = time().'.'.$request->file->extension();  
   
            $request->file->move(public_path('uploads'), $fileName);
            $job->file             = $fileName;
        }
        $job->save(); 
        return redirect()->back();
        
    }
     // manage Candidate by admin
    public function manageCandidatesAdmin($id, $userId)
    {
        
        $jobApplies = JobApply::orderBy('id','asc')->where('job_id',$id)->where('employer_id',$userId)->get();
        // count job applies
         $count = JobApply::orderBy('id','asc')->where('job_id',$id)->where('employer_id',$userId)->count();
         
        $job = Job::Find($id);
        return view('backend.pages.admin.job.manageCandidate',compact('jobApplies','job','count'));
        
    }

}
