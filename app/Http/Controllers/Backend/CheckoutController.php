<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\TaskOffer;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Backend\Task;
use App\Models\Backend\Order;
use App\Models\Backend\TaskApply;
use App\Models\Backend\RequiedSkill;
use App\Models\Backend\DelivaryOrder;
use App\Models\Backend\ReviewEmployer;
use App\Models\Backend\OrderCheckout;
use App\Models\Backend\ReviewFreelancer;
use App\Models\Backend\Job;
use App\Models\Backend\JobApply;
use Auth;
class CheckoutController extends Controller
{
    function customOrderCheckout(Request $request){
        try{
            \Stripe\Stripe::setApiKey('sk_test_51JCzs9JXz4mwbqPLnWJp4CTKlQgvKdH1eHV9CtpGWppZdjFy6srKO0eXp33ApHztUTbV20n7vpxhbPNxCgsNRutp00PsCF9T0B');
                $token = $_POST['stripeToken'];
                $charge = \Stripe\Charge::create([
                'amount' => $request->budget*100,
                'currency' => 'usd',
                'description' => 'Payment From Jamtalent',
                'source' => $token,
                'metadata' => ['user_id' => uniqid()],
                ]);

            $orderCheckout = new OrderCheckout();
            $orderCheckout->freelancer_id   = $request->freelancer_id;
            $orderCheckout->employer_id     = $request->user_id;
            $orderCheckout->transaction_id  = $charge->balance_transaction;
            $orderCheckout->budget          = $request->budget;
            $orderCheckout->order_type      = 1;
            $orderCheckout->save();
            $taskOffer  = TaskOffer::Find($request->task_offer_id);
            $taskOffer->status =0;
            $taskOffer->save();
            $datas = array();
            $data = 1;
            $checkOut = OrderCheckout::Find($orderCheckout->id);
            return view('backend.pages.employer.checkoutConfirm',compact('checkOut'));
        }
        catch(Exception $e){
            return view('frontend.pages.pages-404');
        }
        
    }

    public function taskOrderCheckout(Request $request){
        $id = $request->id;
        \Stripe\Stripe::setApiKey('sk_test_51JCzs9JXz4mwbqPLnWJp4CTKlQgvKdH1eHV9CtpGWppZdjFy6srKO0eXp33ApHztUTbV20n7vpxhbPNxCgsNRutp00PsCF9T0B');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => $request->budget*100,
        'currency' => 'usd',
        'description' => 'Payment From Jamtalent',
        'source' => $token,
        'metadata' => ['user_id' => uniqid()],
        ]);

        
        $taskApply = TaskApply::Find($id);
        $taskApply->status = 1;
        $taskApply->save();
        $task_id = Task::where('id',$taskApply->task_id)->first();
        $task = Task::Find($task_id->id);
        $task->freelancer_id = $taskApply->freelancer_id;
        $task->save();
        $order = new Order;
        $order                  = new Order;
        $order->order_type      = 2;
        $order->order_id        = '#' . rand();
        $order->offer_id        = $taskApply->id;
        $order->freelancer_id   = $taskApply->freelancer_id;
        $order->employer_id     = $taskApply->employer_id;
        $order->budget          = $taskApply->min_budget;
        $order->delivery_type   = $taskApply->delivery_type;
        $order->delivary_time   = $taskApply->delivary_time;
        $order->save();

       
        
        $delivaryOrder = new DelivaryOrder();

        $delivaryOrder->freelancer_id   = $taskApply->freelancer_id;
        $delivaryOrder->employer_id     = $taskApply->employer_id;
        $delivaryOrder->order_id         = $order->id;
        $delivaryOrder->revision        = 0;
        $delivaryOrder->save();


        $orderCheckout = new OrderCheckout();
        $orderCheckout->freelancer_id   = $request->freelancer_id;
        $orderCheckout->employer_id     = $request->user_id;
        $orderCheckout->transaction_id  = $charge->balance_transaction;
        $orderCheckout->budget          = $request->budget;
        $orderCheckout->order_type      = 2;
        $orderCheckout->task_id         = $task->id;

        $orderCheckout->save();



        $checkOut = OrderCheckout::Find($orderCheckout->id);
        return view('backend.pages.employer.checkoutConfirm',compact('checkOut'));
    }


    function jobPaymentrCheckout(Request $request){
        try{
            try{
                \Stripe\Stripe::setApiKey('sk_test_51JCzs9JXz4mwbqPLnWJp4CTKlQgvKdH1eHV9CtpGWppZdjFy6srKO0eXp33ApHztUTbV20n7vpxhbPNxCgsNRutp00PsCF9T0B');
                $token = $_POST['stripeToken'];
                $charge = \Stripe\Charge::create([
                'amount' => $request->budget*100,
                'currency' => 'usd',
                'description' => 'Payment From Jamtalent',
                'source' => $token,
                'metadata' => ['user_id' => uniqid()],
                ]);
            }
            
            catch(Exception $e){
                return view('frontend.pages.pages-404');
            }


        
        $jobApply = JobApply::Find($request->jobApplyId);
        $jobApply->status = 1;
        $jobApply->save();
        $job = Job::Find($request->jobId);
        $job->freelancer_id = $jobApply->freelancer_id;
        $job->save();
        $notification=array(
            'message'=>'Approve Successfully',
            'alert-type'=>'success'
        );


        $orderCheckout = new OrderCheckout();
        $orderCheckout->freelancer_id   = $request->freelancer_id;
        $orderCheckout->employer_id     = $request->user_id;
        $orderCheckout->transaction_id  = $charge->balance_transaction;
        $orderCheckout->budget          = $request->budget;
        $orderCheckout->job_id          = $job->id;
        $orderCheckout->order_type      = 3;
        $orderCheckout->save();
        $orderCheckout->job_id         = $job->id;
        $checkOut = OrderCheckout::Find($orderCheckout->id);
        return view('backend.pages.employer.checkoutConfirm',compact('checkOut'));
        }
        catch(Exception $e){
            return view('frontend.pages.pages-404');
        }
        
    }

    //customoffer all payment

    public function customOfferPaymentAll(){
       $orderCheckouts = orderCheckout::orderBy('id','desc')->where('order_type',1)->get();
       return view('backend.pages.superAdmin.payment.customOffer',compact('orderCheckouts')); 
    }

    public function taskPaymentAll(){
       $orderCheckouts = orderCheckout::orderBy('id','desc')->where('order_type',2)->get();
       return view('backend.pages.superAdmin.payment.task',compact('orderCheckouts')); 
    }
    public function jobPaymentAll(){
       $orderCheckouts = orderCheckout::orderBy('id','desc')->where('order_type',3)->get();
       return view('backend.pages.superAdmin.payment.job',compact('orderCheckouts')); 
    }

    public function invoice($id){
         $checkOut = OrderCheckout::Find($id);
        return view('backend.pages.employer.invoice',compact('checkOut'));
    }

    public function confirm($id){
        $checkOut = OrderCheckout::Find($id);
        
        return view('backend.pages.employer.checkoutConfirm',compact('checkOut'));
    }
}

    
