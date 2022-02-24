<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Task;
use App\Models\User;
class TaskController extends Controller
{
    // all Task
    public function allTask()
    {
        
        $tasks = Task::orderBy('id','desc')->where('status',1)->where('freelancer_id',null)->paginate(6);
        if ($tasks) {
            // code...
            return view('frontend.pages.task.all',compact('tasks'));
        }
        else{
            return redirect()->route('home.page');
        }
        
    }

    // show single Task in front
    public function show($id)
    {
        $task = Task::Find($id);
        if ($task) {
            // code...
            return view('frontend.pages.task.show',compact('task'));
        }
        else{
            return redirect()->route('home.page');
        }

        
        
    }
}
