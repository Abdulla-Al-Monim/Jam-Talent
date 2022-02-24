<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Models\Backend\ReviewFreelancer;
use App\Models\Backend\EmploymentHistory;
use App\Models\Backend\Order;
class FreelancerController extends Controller
{
    
    public function show($id)
    {
        $freelancer = User::find($id);
        $freelancerReviews = ReviewFreelancer::orderBy('id','desc')->where('user_id',$id)->paginate(1);
        $employmentHistories = EmploymentHistory::orderBy('id','desc')->where('user_id',$id)->paginate(2);
        $jobDone = Order::where('freelancer_id',$id)->where('status',3)->count(); 
        if ($freelancer) {
            // code...
            return view('frontend.pages.freelancer.profile',compact('freelancer','freelancerReviews','jobDone','employmentHistories'));
        }
        else{
            return redirect()->route('home.page');
        }
        
    }
    
    public function allFreelancer()
    {
        $freelancers = User::orderBy('id','asc')->where('user_type_id',1)->where('verified',1)->whereNotNull('status')->get();
        return view('frontend.pages.freelancer.all',compact('freelancers'));
    }
    
    
    //cover litter download

    public function coverLitterDownload($id)
    {
        //$myFile = storage_path("folder/dummy_pdf.pdf");

        $user = User::Find($id);
        return response()->download(public_path('uploads/'.$user->file));
    }

    public function cVDownload($id)
    {
        //$myFile = storage_path("folder/dummy_pdf.pdf");

        $user = User::Find($id);
        return response()->download(public_path('uploads/'.$user->cv));
    }

    public function qualificationDownload($id)
    {
        //$myFile = storage_path("folder/dummy_pdf.pdf");

        $user = User::Find($id);
        return response()->download(public_path('uploads/'.$user->qualification_certificate));
    }

    public function portfolioDownload($id)
    {
        //$myFile = storage_path("folder/dummy_pdf.pdf");

        $user = User::Find($id);
        return response()->download(public_path('uploads/'.$user->portfolio));
    }

    public function recommendationDownload($id)
    {
        //$myFile = storage_path("folder/dummy_pdf.pdf");

        $user = User::Find($id);
        return response()->download(public_path('uploads/'.$user->recommendation_letter));
    }
    
    
}
