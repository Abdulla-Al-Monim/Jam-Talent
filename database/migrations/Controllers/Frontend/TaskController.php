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
        
        $tasks = Task::orderBy('id','desc')->paginate(6);
        return view('frontend.pages.task.all',compact('tasks'));
    }

    // show single Task in front
    public function show($id)
    {
        $task = Task::Find($id);
        
        return view('frontend.pages.task.show',compact('task'));
    }
}
