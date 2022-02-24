<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\Blog;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1);
        $highRatedUsers = User::orderBy('hourly_rate','desc')->where('user_type_id',1)->where('verified',1)->get()->take(6
        );
        return view('frontend.pages.index',compact('highRatedUsers','user'));
    }
    
     // privecy policy
    public function privacypolicy()
    {
        return view('frontend.pages.privacy');
    }
    // how page
    public function how()
    {
        return view('frontend.pages.how');
    }
    // about us
    public function aboutus()
    {
        return view('frontend.pages.aboutus');
    }
    // contact
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    // whyJamtalent
    public function whyJamtalent()
    {
        return view('frontend.pages.whyJamtalent');
    }
    // Knoledge hub
    public function knowledgeHub()
    {
        $blogs = Blog::orderBy('id','desc')->where('status',1)->get();
        $blogsPaginate = Blog::orderBy('id','desc')->where('status',1)->paginate(5);
        $trandPosts = Blog::orderBy('id','desc')->where('status',1)->paginate(3);
        return view('frontend.pages.knowledgeHub',compact('blogs','blogsPaginate','trandPosts'));
        return view('frontend.pages.knowledgeHub',compact('blogs'));
    }
    // happilancing
    public function happilancing()
    {
        return view('frontend.pages.happilancing');
    }
    
}
