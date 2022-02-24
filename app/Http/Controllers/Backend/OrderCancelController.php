<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Order;
use App\Models\User;
use App\Models\Backend\OrderCancel;
use Auth;
class OrderCancelController extends Controller
{
    //request cancel order by freelancer

    public function requestCancelOrderFreelancer($id,Request $request)
    {
        if (Auth::user()->user_type_id == 1) {
            $order = Order::Find($id);
            $order->status = 5;
            $order->save();

            $orderCancel = new OrderCancel;
            $orderCancel->order_id = $order->id;
            $orderCancel->freelancer_id = $order->freelancer_id;
            $orderCancel->employer_id = $order->employer_id;
            $orderCancel->message = $request->message;
            $orderCancel->cancel_request = 1;
            $orderCancel->save();
            return redirect()->back();
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }

     //request cancel order by employer

    public function requestCancelOrderemployer($id,Request $request)
    {
        if (Auth::user()->user_type_id == 3) {
            $order = Order::Find($id);
            $order->status = 5;
            $order->save();

            $orderCancel = new OrderCancel;
            $orderCancel->order_id = $order->id;
            $orderCancel->freelancer_id = $order->freelancer_id;
            $orderCancel->employer_id = $order->employer_id;
            $orderCancel->message = $request->message;
            $orderCancel->cancel_request = 2;
            $orderCancel->save();
            return redirect()->back();
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }


    //admin funtion
     public function allCancelRequestFreelancer()
    {
        $orderCancels = OrderCancel::orderBy('id','desc')->where('status',0)->where('cancel_request',1)->get();
        return view('backend.pages.admin.task.cancelRequestFreelancer',compact('orderCancels'));
    }
    //confirm cancel reqaust freelancer
     public function confirmCancelRequestFreelancer($orderId)
    {
       
            $orderCancel = OrderCancel::Find($orderId);
            $orderCancel->status = 1;
            $orderCancel->save();
            $orderId = Order::where('id',$orderCancel->order_id)->first();
            $order = Order::Find($orderId->id);
            $order->status = 6;
            $order->save();
            return redirect()->back();
        
    }

    public function allCancelRequestEmployer()
    {
        $orderCancels = OrderCancel::orderBy('id','desc')->where('status',0)->where('cancel_request',2)->get();
        
        return view('backend.pages.admin.task.cancelRequestEmployer',compact('orderCancels'));
    }

}
