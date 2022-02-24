<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\EmploymentHistory;
use Image;
use File;
use Auth;
class EmploymentHistoryController extends Controller
{
    public function create(){
        return view('backend.pages.freelancer.employmentHistory.create');
    }
    public function mange(){
        $employmentHistoryManges = EmploymentHistory::orderBy('id','desc')->where('user_id',Auth::user()->id)->get();
        return view('backend.pages.freelancer.employmentHistory.manage',compact('employmentHistoryManges'));
    }
    public function store(Request $request){
        $request->validate([
        'title' => 'required|string',
        'company_name' => 'required|string',
        'company_name' => 'required|string',
        'company_url' => 'required|string',
        's_desciption' => 'required|string',
            ]);
        $employmentHistory = new EmploymentHistory;
        $employmentHistory->user_id = Auth::user()->id;
        $employmentHistory->title = $request->title;
        $employmentHistory->company_name = $request->company_name;
        $employmentHistory->company_url = $request->company_url;
        if ($request->image) {
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->getClientOriginalExtension();
            $location               = public_path('images/employmentHistory/' . $img);
            Image::make($image)->resize(100,100)->save($location);
            $employmentHistory->image            = $img;
        }
        $employmentHistory->s_desciption = $request->s_desciption;
        $employmentHistory->save();
        return redirect()->route('manage.employment.history');
    }
    //delete emp history
    public function delete($id){
        $employmentHistory = EmploymentHistory::Find($id);
        
        $employmentHistory->delete();
        return redirect()->back();
    }
}
