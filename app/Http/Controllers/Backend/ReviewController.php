<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\Task;
use App\Models\Backend\TaskOffer;
use App\Models\Backend\TaskApply;
use App\Models\Backend\RequiedSkill;
use App\Models\Backend\DelivaryOrder;
use App\Models\Backend\ReviewEmployer;
use App\Models\Backend\ReviewFreelancer;
use App\Models\Backend\FreelancerActivity;
use App\Models\Backend\EmployerActivity;
use Image;
use File;
use Auth;

class ReviewController extends Controller
{
    //manage review Freelancer
    public function reviewManageFreelancer()
    {
        if (Auth::user()->user_type_id == 1) {
            $reviewFreelancers = ReviewFreelancer::orderBy('id','desc')->where('user_id',Auth::user()->id)->where('status','1')->paginate(5);
            $reviewEmployers = ReviewEmployer::orderBy('id','desc')->where('status','1')->where('freelancer_id',Auth::user()->id)->paginate(5);
            return view('backend.pages.freelancer.review',compact('reviewFreelancers','reviewEmployers'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
        
    }

    //give review freelancer
    public function reviewOrderFreelancer(Request $request, $id, $employerActivityId)
    {
        $request->validate([
        'rating' => 'required',
        'comment' => 'required',
        
            ]);
        $review = ReviewEmployer::Find($id);
        $review->rating             = $request->rating;
        $review->comment            = $request->comment;
        $review->status             = 1;
        $review->save();

        $employerActivity = EmployerActivity::Find($employerActivityId);
        $employerActivity->total_review   = $employerActivity->total_review + 1;
        $employerActivity->total_rating   = $employerActivity->total_rating + $review->rating;
        $employerActivity->average_rating = $employerActivity->total_rating / $employerActivity->total_review;
        $employerActivity->save();
        return redirect()->back();
    }

     //give review employer
    public function reviewOrderEmployer(Request $request, $id, $freelancerActivityId)
    {
        $request->validate([
        'on_budget' => 'required',
        'on_time' => 'required',
        'rating' => 'required',
        'comment' => 'required'
        
            ]);

        $review = ReviewFreelancer::Find($id);
        
           
        $review->on_budget          = $request->on_budget;
        $review->on_time            = $request->on_time;
        $review->rating             = $request->rating;
        $review->comment            = $request->comment;
        $review->status             = 1;
        $review->save();
        //FreelancerActivity
        $FreelancerActivity = FreelancerActivity::Find($freelancerActivityId);
        $FreelancerActivity->user_id        = $review->user_id;
        $FreelancerActivity->total_review   = $FreelancerActivity->total_review + 1;
        $FreelancerActivity->total_rating   = $FreelancerActivity->total_rating + $review->rating;
        $FreelancerActivity->average_rating = $FreelancerActivity->total_rating / $FreelancerActivity->total_review;
        
        if ($review->on_budget == 1) {
           $FreelancerActivity->on_budget =  $FreelancerActivity->on_budget + 100;
        }
        
        if ($review->on_time == 1) {
           $FreelancerActivity->on_time =  $FreelancerActivity->on_time + 100; 
        }
        $FreelancerActivity->save();
       
            return redirect()->back(); 
        }
        
    

    //manage review Employer
    public function reviewManageEmployer()
    {
        if (Auth::user()->user_type_id == 3) {
            $reviewFreelancers = ReviewFreelancer::orderBy('id','asc')->where('employer_id',Auth::user()->id)->where('status','1')->paginate(5);
            $reviewEmployers = ReviewEmployer::orderBy('id','asc')->where('status','1')->where('user_id',Auth::user()->id)->paginate(5);
            return view('backend.pages.employer.review',compact('reviewFreelancers','reviewEmployers'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }
        
}
