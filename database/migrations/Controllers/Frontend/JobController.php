<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Job;
use App\Models\Backend\Category;
class JobController extends Controller
{
    // featuread job show in home page
    public function subCategortyJob($name)
    {
        $subCategory = Category::where('name',$name)->first();
        $jobs = Job::orderBy('id','asc')->where('job_category',$name)->get();
        return view('frontend.pages.job.subCategoryJob',compact('jobs','subCategory'));
    }
    // featuread job show in home page
    public function subCategortyJobSearch($name)
    {
        $subCategory = Category::where('name',$name)->first();
        $jobs = Job::orderBy('id','asc')->where('job_category',$name)->get();
        return view('frontend.pages.job.subCategoryJob',compact('jobs','subCategory'));
    }

    // all job
    public function allJob()
    {
        
        $jobs = Job::orderBy('id','asc')->paginate(6);
        return view('frontend.pages.job.all',compact('jobs'));
    }
    // all job
    public function searchJob(Request $request)
    {
        $location = $request->location;
        $title = $request->job_title;
        $jobs = Job::orderBy('id','asc')->orWhere('location' , 'LIKE' ,  '%'. $location.'%')->orWhere('job_title' , 'LIKE' ,  '%'. $title.'%')->paginate(6);
        if ($jobs == null) {
            $jobs = Job::orderBy('id','asc')->take(6)->paginate(6);
        }
        return view('frontend.pages.job.all',compact('jobs'));
    }
}
