<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MembershipPlan;
use App\Models\Backend\Checkout;
use App\Models\User;
use Carbon\Carbon;
Use Auth;

class CheckoutController extends Controller
{
    //show check out by super admin
    public function all(){
        $checkouts = checkout::orderBy('id','desc')->get();
        return view('backend.pages.superAdmin.checkout.all',compact('checkouts'));
    }
    public function index($id){
        $user = User::where('id',Auth::user()->id)->first();
        $membershipPlan = MembershipPlan::find($id);
        return view('frontend.pages.checkout',compact('user','membershipPlan'));
    }

    public function edit($id){
        $user = User::where('id',Auth::user()->id)->first();
        $membershipPlan = MembershipPlan::find($id);
        return view('frontend.pages.checkout.edit',compact('user','membershipPlan'));
    }

    public function confirm(){
        
        return view('frontend.pages.checkout.checkoutConfirm');
    }
     public function invoice(){
        
        return view('frontend.pages.checkout.invoice');
    }
    //co
    public function checkoutStore(Request $request){
        
       
    $checkout = new Checkout();
    $checkout->user_id          = $request->user_id;
    $checkout->plan_name        = $request->plan_name;
    $checkout->Billed           = $request->Billed;
    $checkout->rate             = $request->rate;
    $checkout->expired_date     = Carbon::now()->addMonth();
    $checkout->save();
    return redirect()->route('checkout.confirm');
    }
    public function checkoutUpdate($id, Request $request){
        
        \Stripe\Stripe::setApiKey('sk_test_51JCzs9JXz4mwbqPLnWJp4CTKlQgvKdH1eHV9CtpGWppZdjFy6srKO0eXp33ApHztUTbV20n7vpxhbPNxCgsNRutp00PsCF9T0B');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => $request->rate*100,
        'currency' => 'usd',
        'description' => 'Payment From Jamtalent',
        'source' => $token,
        'metadata' => ['user_id' => uniqid()],
        ]);
    


    $checkout = Checkout::find($id);
    $checkout->plan_name        = $request->plan_name;
    $checkout->Billed           = $request->Billed;
    $checkout->rate             = $request->rate;
    $checkout->transaction_id   = $charge->balance_transaction;
    $checkout->expired_date     = Carbon::now()->addMonth();
    $checkout->save();
    return redirect()->route('checkout.confirm');
    }

    //
    public function alreadtAlert(){
                if(session()->get('locale') == 'ar') {
 } 
        elseif(session()->get('locale') == 'tk'){
}  
        else{
        }
        $notification=array(
            'message'=>'Your membership plan Existing',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    //
    public function alert(){
                if(session()->get('locale') == 'ar') {
                    $notification=array(
                        'message'=>'First you have to login as an Employer',
                        'alert-type'=>'success'
                    );
                } 
        elseif(session()->get('locale') == 'tk'){
                    $notification=array(
                    'message'=>'First you have to login as an Employer',
                    'alert-type'=>'success'
                );
            }  
        else{
                $notification=array(
                'message'=>'First you have to login as an Employer',
                'alert-type'=>'success'
            );
        }
        
        return redirect()->route('login')->with($notification);
    }

    //buy alert 
    public function buyAlert(){
                if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'أولا عليك أن تشتري خطة العضوية',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'İlk önce bir üyelik planı satın almalısınız',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
            'message'=>'First you have to a buy membership plan',
            'alert-type'=>'success'
        );
        }
        
        return redirect()->route('membership.plan')->with($notification);
    }
   
    public function updateAlert(){
                if(session()->get('locale') == 'ar') {
                    $notification=array(
                    'message'=>'قم بتحديث خطة عضويتك',
                    'alert-type'=>'success'
                );

            } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Üyelik planınızı güncelleyin',
            'alert-type'=>'success'
        );

        }  
        else{
            $notification=array(
            'message'=>'Update your membership plan',
            'alert-type'=>'success'
        );
        }
        
        return redirect()->route('membership.plan')->with($notification);
    }
}
