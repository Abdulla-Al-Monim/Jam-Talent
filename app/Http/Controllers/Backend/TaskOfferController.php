<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\TaskOffer;
use App\Models\Backend\DelivaryOrder;
use App\Models\Backend\Order;
use Carbon\Carbon;
use Auth;
class TaskOfferController extends Controller
{

    // request task manage by freelancer
    public function requestTaskManage()
    {
        if (Auth::user()->user_type_id == 1) {
            $taskRequests = TaskOffer::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->where('status',0)->get();
            return view('backend.pages.freelancer.customOffer.requestTask',compact('taskRequests'));
            
        }
        else
        {
            return view('frontend.pages.pages-404');
        }
        
    }

    // confirm task request by freelancer
    public function confirmAppliedTask($id)
    {
        if (Auth::user()->user_type_id == 1) {
            $taskOffer          = TaskOffer::Find($id);
            $taskOffer->status  = 1;
            $taskOffer->save();
            //insert order table
            $order                  = new Order;
            $order->order_type       = 1;
            $order->order_id        = '#' . rand();
            $order->offer_id        = $taskOffer->id;
            $order->freelancer_id   = $taskOffer->freelancer_id;
            $order->employer_id     = $taskOffer->employer_id;
            $order->budget          = 500;
            $order->delivery_type   = 1;
            $order->delivary_time   = 5;
            $order->save();

            $delivaryOrder = new DelivaryOrder();

            $delivaryOrder->freelancer_id   = $order->freelancer_id;
            $delivaryOrder->employer_id     = $order->employer_id;
            $delivaryOrder->order_id         = $order->id;
            $delivaryOrder->revision        = 0;
            $delivaryOrder->save();
            return redirect()->route('request.task.manage');
        }
        else
        {
            return view('frontend.pages.pages-404');
        }
        

    }

    //download Document custom offer
    public function downloadDocumentFreelancer($id)
    {
        
        $taskOffer = TaskOffer::Find($id);
        return response()->download(public_path('uploads/'.$taskOffer->file));
    }
    // offer task
    public function offerTask(Request $request, $id)
    {
        $request->validate([
        
        'title' => 'required',
        
        'file' => 'required',
        'budget'=>'required|numeric',
       
            ]);
        $taskOffer = new TaskOffer();
        $taskOffer->employer_id            = Auth::user()->id;
        $taskOffer->freelancer_id          = $id;
        $taskOffer->email                  = $request->emailaddress;
        $taskOffer->title                  = $request->title;
        $taskOffer->message                = $request->message;
        if ( $request->file ) {
            $file                       = $request->file('file');
            $fileName                   = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
            $taskOffer->file                 = $fileName;
        }
        $taskOffer->budget       = $request->budget;
        $taskOffer->status       = 2; 
        $taskOffer->save();
        
        $data = array();
        $data['task_offer_id']      = $taskOffer->id;
        $data['freelancer_id']      = $taskOffer->freelancer_id;
        $data['budget']             = $taskOffer->budget;

        return view('frontend.pages.task.checkout',compact('data'));

    }

    public function customOfferCheckout(){
     return view('frontend.pages.task.checkout');
    }
    // manage custom offer emp
    public function manageCustomOffer()
    {
        $customOffers = TaskOffer::where('employer_id',Auth::user()->id)->where('status',0)->paginate(5);
        $count = TaskOffer::where('employer_id',Auth::user()->id)->count();
        return view('backend.pages.employer.task.customOffer',compact('customOffers','count'));
    }
    //update cutom offer by emp
    public function updateCustomOffer(Request $request, $id)
    {
        $taskOffer = TaskOffer::Find($id);
        $taskOffer->message                = $request->message;
        if ( $request->file ) {
            $file                       = $request->file('file');
            $fileName                   = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
            $taskOffer->file                 = $fileName;
        }
        $taskOffer->save();
        return redirect()->route('mangage.custom.offer');

    }
    //update cutom offer by emp
    public function deleteCustomOffer($id)
    {
        $taskOffer = TaskOffer::Find($id);
        
        $taskOffer->delete();
        return redirect()->route('mangage.custom.offer');

    }

}
