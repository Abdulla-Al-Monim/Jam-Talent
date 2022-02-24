<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\BookMarkEmployer;
use App\Models\Backend\BookMarkFreelancer;
use App\Models\Backend\BookMarkJob;
use App\Models\Backend\BookMarkTask;
use Auth;
class BookmarkController extends Controller
{
    //manage Bookmark employer
    public function manageBookMarkEmployer()
    {
        $bookMarkFreelancers = BookMarkFreelancer::orderBy('id','asc')->where('user_id',Auth::user()->id)->get();
        return view('backend.pages.employer.bookmark',compact('bookMarkFreelancers'));
        
    }
    //freelancer BookMark by employer
    public function bookMarkFreelancer($id)
    {
        $bookMarkFreelancer = new BookMarkFreelancer();
        $bookMarkFreelancer->user_id  = Auth::user()->id;
        $bookMarkFreelancer->freelancer_id = $id; 
        $bookMarkFreelancer->save();
        return redirect()->back();  
    }
    //freelancer BookMark by employer remove
    public function bookMarkFreelancerRemove($id)
    {
        $bookMarkFreelancer = BookMarkFreelancer::Find($id);
        $bookMarkFreelancer->delete();
        return redirect()->back();
        
    }
    public function manageBookMarFreelancer()
    {
        $bookMarkJobs = BookMarkJob::orderBy('id','asc')->where('user_id',Auth::user()->id)->get();
        $bookMarkTasks = BookMarkTask::orderBy('id','asc')->where('user_id',Auth::user()->id)->get();
        $bookMarkEmployers = BookMarkEmployer::orderBy('id','asc')->where('user_id',Auth::user()->id)->get();
        return view('backend.pages.freelancer.bookmark',compact('bookMarkJobs','bookMarkTasks','bookMarkEmployers'));
        
    }
    //freelancer bookmark Job
    public function bookMarkJob($id)
    {
        $bookMarkJob = new BookMarkJob();
        $bookMarkJob->user_id  = Auth::user()->id;
        $bookMarkJob->job_id = $id; 
        $bookMarkJob->save();
        return redirect()->back();  
    }
    //freelancer bookmark Job remove
    public function bookMarkJobRemove($id)
    {
        $bookMarkJob = BookMarkJob::Find($id);
        $bookMarkJob->delete();
        return redirect()->back();
        
    }
    //freelancer bookmark task
    public function bookMarkTask($id)
    {
        $bookMarkTask = new BookMarkTask();
        $bookMarkTask->user_id  = Auth::user()->id;
        $bookMarkTask->task_id = $id; 
        $bookMarkTask->save();
        return redirect()->back();  
    }
    //freelancer bookmark task remove
    public function bookMarkTaskRemove($id)
    {
        $bookMarkTask = BookMarkTask::Find($id);
        $bookMarkTask->delete();
        return redirect()->back();
        
    }
}
