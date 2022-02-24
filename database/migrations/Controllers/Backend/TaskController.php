<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\User;
use App\Models\Backend\Task;
use App\Models\Backend\Order;
use App\Models\Backend\TaskOffer;
use App\Models\Backend\TaskApply;
use App\Models\Backend\RequiedSkill;
use App\Models\Backend\DelivaryOrder;
use App\Models\Backend\ReviewEmployer;
use App\Models\Backend\ReviewFreelancer;
use Image;
use File;
use Auth;
class TaskController extends Controller
{

    //download Document task offer
    public function downloadDocumentTaskFreelancer($id)
    {
        
        $task = Task::Find($id);
        return response()->download(public_path('uploads/'.$task->file));
    }

    // freelancer active bid
    public function freelancerActiveBid()
    {
        $taskApplies = TaskApply::orderBy('id','asc')->where('freelancer_id',Auth::user()->id)->where('status',0)->get();
        return view('backend.pages.freelancer.task.activeBid',compact('taskApplies'));
    }
    
    
    //place bid freelancer
    public function applyTask(Request $request, $id)
    {
        $count = TaskApply::where('freelancer_id',Auth::user()->id)->where('task_id',$id)->count();
        if ($count ==  0) {
            $task = Task::Find($id);
        $taskApply = new TaskApply();
        $taskApply->task_id                     = $task->id;
        $taskApply->freelancer_id               = Auth::user()->id;
        $taskApply->employer_id                 = $task->employer_id;
        $taskApply->min_budget                  = $request->min_budget;
        $taskApply->delivery_type               = $request->delivery_type;
        $taskApply->delivary_time               = $request->qtyInput;
        //$jobApply->email                = $request->emailaddress;
        $taskApply->save();
        return redirect()->back();
        }
        else{
           return redirect()->back(); 
        }

    }

    //update bid freelancer
    public function updateBidFreelancer(Request $request, $id)
    {

        $taskApply = TaskApply::Find($id);
        $taskApply->min_budget                  = $request->min_budget;
        $taskApply->delivery_type               = $request->delivery_type;
        $taskApply->delivary_time               = $request->qtyInput;
        //$jobApply->email                = $request->emailaddress;
        $taskApply->save();
        return redirect()->back();

    }
    
    //delete bid freelancer
    public function deleteBidFreelancer($id)
    {

        $taskApply = TaskApply::Find($id);
        $taskApply->delete();
        return redirect()->back();

    }
    
    // task manage by emp
    public function manageTaskEmp()
    {
        $taskRequests = Task::orderBy('id','asc')->where('employer_id',Auth::user()->id)->get();

        return view('backend.pages.employer.task.manageTask',compact('taskRequests'));
    }
    
    //request task bid manage by emp
    public function manageTaskBidEmp($id)
    {
        $count = TaskApply::orderBy('id','asc')->where('task_id',$id)->count();
        $task = Task::Find($id);
        $taskBids = TaskApply::orderBy('id','asc')->where('task_id',$id)->get();
        return view('backend.pages.employer.task.manageTaskBid',compact('taskBids','count','task'));
    }
    //download order document
    public function downloadOrderFile($id)
    {
        
        $delivaryOrder = DelivaryOrder::Find($id);
        if (is_null($delivaryOrder->file)) {
            # code...
        }
        else
        {
            return response()->download(public_path('uploads/'.$delivaryOrder->file));
        }
        
    }
    
    
   
    //Approve task bid by emp
    public function manageTaskBidEmpApprove($id,$task_id, Request $request)
    {
        $taskApply = TaskApply::Find($id);
        $taskApply->status = 1;
        $taskApply->save();
        $task = Task::Find($task_id);
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

        return redirect()->route('user.dashbord');
    }

    //reject task bid by emp
    public function manageTaskBidEmpReject($id, Request $request)
    {
        $taskApply = TaskApply::Find($id);
        $taskApply->status = 0;
        $taskApply->save();

        return redirect()->route('user.dashbord');
    }

    //delete task bid by emp
    public function manageTaskBidEmpDelete($id)
    {
        $taskApply = TaskApply::Find($id);
        $taskApply->delete();
        return redirect()->route('user.dashbord');
    }
    // view post task page
    public function create()
    {
        $categories = Category::orderBy('name','asc')->get();
        return view('backend.pages.employer.task.post',compact('categories'));
    }
    // post task
    public function store(Request $request)
    {
        $request->validate([
        'task_name' => 'required',
        'category_name' => 'required',
        'location' => 'required',
        'delivery_time' => 'required',
        'min_budget' => 'required',
        'max_budget' => 'required',
        'description' => 'required',
        'file' => 'required',
       
            ]);
        $task = new Task();
        $task->employer_id              = Auth::user()->id;
        $task->task_name                = $request->task_name;
        $task->category_name            = $request->category_name;
        $task->location                 = $request->location;
        $task->budget_type              = $request->radio;
        $task->delivery_time            = $request->delivery_time;
        $task->min_budget               = $request->min_budget;
        $task->max_budget               = $request->max_budget;
        $task->description              = $request->description;
        if ( $request->file ) {
            $file                       = $request->file('file');
            $fileName                   = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
            $task->file                 = $fileName;
        }
        $task->status                   = 1;
        $task->save();
        // if (count($request->skill_names) > 0) {
        //     foreach ( $request->skill_names as $skill_name) {
        //         $requiedSkill               = new RequiedSkill();
        //         $requiedSkill->task_id      = $task->id;
        //         $requiedSkill->skill_name   = $skill_name;
        //         $requiedSkill->save();
        //     }
        // }
        return redirect()->route('user.dashbord');

    }
    // Admin route

    // all post task
    public function allPostTask()
    {
        if (Auth::user()->user_type_id == 2) {
        
            $taskRequests = Task::orderBy('id','asc')->paginate(4);
            return view('backend.pages.admin.task.allPostTask',compact('taskRequests'));
        }
        else if (Auth::user()->user_type_id == 0) {
        
            $taskRequests = Task::orderBy('id','asc')->paginate(4);
            return view('backend.pages.superAdmin.task.allPostTask',compact('taskRequests'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }

    //
    public function allPostWeek()
    {
        if (Auth::user()->user_type_id == 0) {
            $date = \Carbon\Carbon::today()->subDays(7);
            $taskRequests = Task::orderBy('id','asc')->where('created_at','>=',$date)->paginate(4);
            return view('backend.pages.superAdmin.task.allPostTask',compact('taskRequests'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }
    // task show today
    public function allPostDay()
    {
        if (Auth::user()->user_type_id == 0) {
            $date = \Carbon\Carbon::today();
            $taskRequests = Task::orderBy('id','asc')->where('created_at','>=',$date)->paginate(4);
            return view('backend.pages.superAdmin.task.allPostTask',compact('taskRequests'));
        }
        else{
            return view('frontend.pages.pages-404');
        }
    }
    //request task bid manage by super Admin
    public function manageTaskBidSuperAdmin($id)
    {
        $count = TaskApply::orderBy('id','asc')->where('task_id',$id)->count();
        $task = Task::Find($id);
        $taskBids = TaskApply::orderBy('id','asc')->where('task_id',$id)->get();
        return view('backend.pages.superAdmin.task.manageTaskBid',compact('taskBids','count','task'));
    }
    
    //fontend route
    

}
