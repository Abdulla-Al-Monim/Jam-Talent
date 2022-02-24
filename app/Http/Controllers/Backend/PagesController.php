<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user       = User::Find(Auth::user()->id);
        return view('backend.pages.index',compact('user'));
    }
    public function message()
    {
        
        return view('backend.pages.message');
    }
    public function bookmark()
    {
        return view('backend.pages.bookmark');
    }
    public function review()
    {
        return view('backend.pages.review');
    }
    public function manageJob()
    {
        return view('backend.pages.job.manageJob');
    }
    public function manageCandidate()
    {
        return view('backend.pages.job.manageCandidate');
    }
    
    public function taskManage()
    {
        return view('backend.pages.task.manageTask');
    }
    public function activeBid()
    {
        return view('backend.pages.task.activeBid');
    }
    public function postTask()
    {
        return view('backend.pages.task.postTask');
    }
    public function setting()
    {
        return view('backend.pages.setting');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
