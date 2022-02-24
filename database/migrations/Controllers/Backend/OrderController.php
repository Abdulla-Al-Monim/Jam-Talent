<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\Task;
use App\Models\Backend\TaskOffer;
use App\Models\Backend\TaskApply;
use App\Models\Backend\Order;
use App\Models\Backend\RequiedSkill;
use App\Models\Backend\DelivaryOrder;
use App\Models\Backend\ReviewEmployer;
use App\Models\Backend\ReviewFreelancer;
use Image;
use File;
use Auth;
class OrderController extends Controller
{

    //active order
    public function freelancerActiveOrder()
    {
        if (Auth::user()->user_type_id == 1) {
            $user = User::Find(Auth::user()->id);
            $orders = Order::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->where('status',1)->get();
            return view('backend.pages.freelancer.order.activeOrder',compact('orders','user'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
        
    }
    
    //delivered order
    public function freelancerDeliveredOrder()
    {
        if (Auth::user()->user_type_id == 1) {
            $user = User::Find(Auth::user()->id);
            $orders = Order::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->where('status',2)->get();
            return view('backend.pages.freelancer.order.deliveredOrder',compact('orders','user'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
        
    }
    //Completed order
    public function freelancerCompletedOrder()
    {
        if (Auth::user()->user_type_id == 1) {
            $user = User::Find(Auth::user()->id);
            $orders = Order::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->where('status',3)->get();
            return view('backend.pages.freelancer.order.completedOrder',compact('orders','user'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
        
    }
    //place order
    public function placeOrderFreelancer(Request $request, $id,$orderId)
    {
        $delivaryOrder = DelivaryOrder::Find($id);
        $delivaryOrder->description     = $request->description;
        if ( $request->file ) {
            $file                       = $request->file('file');
            $fileName                   = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
            $delivaryOrder->file        = $fileName;
        }
        $delivaryOrder->save();
        $order = Order::Find($orderId);
        $order->status = 2;
        $order->save();
        return redirect()->back();

    }


        //cancel requested freelancer
    public function manageCancelRequectFreelancer()
    {
        if (Auth::user()->user_type_id == 1) 
        {
        $orderCancels = Order::orderBy('id','asc')->where('status',5)->where('freelancer_id',Auth::user()->id)->get();

        $count = Order::orderBy('id','asc')->where('status',5)->where('freelancer_id',Auth::user()->id)->count();

        return view('backend.pages.freelancer.order.cancelRequested',compact('orderCancels','count'));
        }
         else{
            return view('frontend.pages.pages-404');
        }
    }

    //cancel order List freelancer
    public function manageCancelOrderFreelancer()
    {
        if (Auth::user()->user_type_id == 1) 
        {
        $orderCancels = Order::orderBy('id','asc')->where('status',6)->where('freelancer_id',Auth::user()->id)->get();

        $count = Order::orderBy('id','asc')->where('status',6)->where('freelancer_id',Auth::user()->id)->count();
        
        return view('backend.pages.freelancer.order.cancel',compact('orderCancels','count'));
        }
         else{
            return view('frontend.pages.pages-404');
        }
    }

    // manage order emmloyer
    public function manageOrderEmp()
    {
        if (Auth::user()->user_type_id == 3) {
            $user = User::Find(Auth::user()->id);
        $orders = Order::orderBy('id','asc')->where('employer_id',Auth::user()->id)->where('status',1)->get();
        return view('backend.pages.employer.order.manageOrder',compact('orders','user'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }

    // manage deliverd order emmloyer
    public function manageDeliveredOrderEmp()
    {
        if (Auth::user()->user_type_id == 3) {
            $user = User::Find(Auth::user()->id);
        $orders = Order::orderBy('id','asc')->where('employer_id',Auth::user()->id)->where('status',2)->get();
        return view('backend.pages.employer.order.manageDeliveredOrder',compact('orders','user'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }

    // manage Confirmed order emmloyer
    public function manageConfirmedOrderEmp()
    {
        if (Auth::user()->user_type_id == 3) {
            $user = User::Find(Auth::user()->id);
            $orders = Order::orderBy('id','asc')->where('employer_id',Auth::user()->id)->where('status',3)->get();
        return view('backend.pages.employer.order.confirmedOrder',compact('orders','user'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }

    //confirm order
     public function confirmOrderEmployer(Request $request, $id,$orderId)
    {
        if (Auth::user()->user_type_id == 3) {
            $delivaryOrder                      = DelivaryOrder::Find($id);
            $delivaryOrder->save();

            $order = Order::Find($orderId);
            $order->status = 3;
            $order->save();
            // create review table employer

            $reviewEmployer                     = new ReviewEmployer;
            $reviewEmployer->freelancer_id      = $delivaryOrder->freelancer_id;
            $reviewEmployer->user_id            = $delivaryOrder->employer_id;
            $reviewEmployer->order_id           = $order->id;
            $reviewEmployer->save();

            // create review table freelancer

            $reviewFreelancer                     = new ReviewFreelancer;
            $reviewFreelancer->user_id      = $delivaryOrder->freelancer_id;
            $reviewFreelancer->employer_id        = $delivaryOrder->employer_id;
            $reviewFreelancer->order_id           = $order->id;
            $reviewFreelancer->save();

            return redirect()->route('order.manage.emp');
        }
        else{
            return view('frontend.pages.pages-404');
        }

    }
    //revision order
    public function revisionOrderEmployer(Request $request, $id,$orderId)
    {
        $delivaryOrder = DelivaryOrder::Find($id);
        $revision                       = $delivaryOrder->revision;
        $revision++;
        $delivaryOrder->revision        = $revision;
        $delivaryOrder->save();
        $order = Order::Find($orderId);
        $order->status = 1;
        $order->save();
        return redirect()->route('order.manage.emp');

    }
    //cancel requested employer
    public function manageCancelRequectEmployer()
    {
        if (Auth::user()->user_type_id == 3) 
        {
        $orderCancels = Order::orderBy('id','asc')->where('status',5)->where('employer_id',Auth::user()->id)->get();

        $count = Order::orderBy('id','asc')->where('status',5)->where('employer_id',Auth::user()->id)->count();

        return view('backend.pages.employer.order.cancelRequested',compact('orderCancels','count'));
        }
         else{
            return view('frontend.pages.pages-404');
        }
    }
    //cancel requested employer
    public function manageCancelOrderEmployer()
    {
        if (Auth::user()->user_type_id == 3) 
        {
        $orderCancels = Order::orderBy('id','asc')->where('status',6)->where('employer_id',Auth::user()->id)->get();

        $count = Order::orderBy('id','asc')->where('status',6)->where('employer_id',Auth::user()->id)->count();
        
        return view('backend.pages.employer.order.cancel',compact('orderCancels','count'));
        }
         else{
            return view('frontend.pages.pages-404');
        }
    }

    //all active order
    public function allActiveOrder()
    {
        if (Auth::user()->user_type_id == 2) {
        $user = User::Find(Auth::user()->id);
        $orders = Order::orderBy('id','asc')->where('status',1)->get();
        return view('backend.pages.admin.order.allActiveOrder',compact('orders','user'));
        }

        else if (Auth::user()->user_type_id == 0) {
        $user = User::Find(Auth::user()->id);

        $orders = Order::orderBy('id','asc')->where('status',1)->get();
        $count = Order::orderBy('id','asc')->where('status',1)->count();
        return view('backend.pages.superAdmin.order.allActiveOrder',compact('orders','user','count'));
        }

        else{
            return view('frontend.pages.pages-404');
        }
    }

    //all cancel order
    public function allCancelOrder()
    {
        if (Auth::user()->user_type_id == 2) {
            $user = User::Find(Auth::user()->id);
        $orders = Order::orderBy('id','asc')->where('status',6)->get();
        return view('backend.pages.admin.order.allCancelOrder',compact('orders','user'));
        }

        else if (Auth::user()->user_type_id == 0) {
            $user = User::Find(Auth::user()->id);
        $orders = Order::orderBy('id','asc')->where('status',6)->get();
        return view('backend.pages.admin.order.allCancelOrder',compact('orders','user'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }

    //super admin route
    //all active order
    public function allActiveOrderLaslWeeek()
    {
        if (Auth::user()->user_type_id == 0) {
        $date = \Carbon\Carbon::today()->subDays(7);
        $user = User::Find(Auth::user()->id);
        $orders = Order::orderBy('id','asc')->where('status',1)->where('created_at','>=',$date)->get();
        $count = Order::orderBy('id','asc')->where('status',1)->where('created_at','>=',$date)->count();
        return view('backend.pages.superAdmin.order.allActiveOrder',compact('orders','user','count'));
        }

        else{
            return view('frontend.pages.pages-404');
        }
    }
     //all active order
    public function allCompleteOrder()
    {
        if (Auth::user()->user_type_id == 2) {
        $user = User::Find(Auth::user()->id);
        $orders = Order::orderBy('id','asc')->where('status',3)->get();
        $count = Order::orderBy('id','asc')->where('status',3)->count();
        return view('backend.pages.superAdmin.order.allCompleteOrder',compact('orders','user','count'));
        }

        else if (Auth::user()->user_type_id == 0) {
        $user = User::Find(Auth::user()->id);

        $orders = Order::orderBy('id','asc')->where('status',3)->get();
        $count = Order::orderBy('id','asc')->where('status',3)->count();
        return view('backend.pages.superAdmin.order.allCompleteOrder',compact('orders','user','count'));
        }

        else{
            return view('frontend.pages.pages-404');
        }
    }
    //super admin route end
}
