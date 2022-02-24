<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MembershipPlan;
use App\Models\Backend\Checkout;
use Auth;
class MembershipPlanController extends Controller
{
    public function create()
    {
        
        return view('backend.pages.superAdmin.membershipPlan.add');
    }
    public function manage()
    {
        $membershipPlans = MembershipPlan::orderBy('id','desc')->get();
        return view('backend.pages.superAdmin.membershipPlan.manage',compact('membershipPlans'));
    }
    
    public function store(Request $request){
         $request->validate([
        'plan_name' => 'required',
        'Billed' => 'required',
        'rate' => 'required',
        's_desc' => 'required',
        's_desc_ar'=>'required',
        's_desc_tr'=>'required',
        'desc' => 'required',
        'desc_ar' => 'required',
        'desc_tr' => 'required',

        
            ]);
        $membershipPlan = new MembershipPlan;
        $membershipPlan->plan_name  = $request->plan_name;
        $membershipPlan->Billed     = $request->Billed;
        $membershipPlan->rate       = $request->rate;
        $membershipPlan->s_desc     = $request->s_desc;
        $membershipPlan->s_desc_ar     = $request->s_desc_ar;
        $membershipPlan->s_desc_tr     = $request->s_desc_tr;
        $membershipPlan->desc       = $request->desc;
        $membershipPlan->desc_ar       = $request->desc_ar;
        $membershipPlan->desc_tr       = $request->desc_tr;
        $membershipPlan->status     = 1;
        $membershipPlan->save();
        return redirect()->route('membership.manage');

    }
    public function destroy($id){
        $membershipPlan = MembershipPlan::where('id',$id);
        $membershipPlan->delete();
        return redirect()->back();

    }


    //employerMembershipPlan
    public function employerMembershipPlan(){
        $checkout = Checkout::where('user_id',Auth::user()->id)->first();
        return view('backend.pages.employer.membershipPlan',compact('checkout'));
    }
}
