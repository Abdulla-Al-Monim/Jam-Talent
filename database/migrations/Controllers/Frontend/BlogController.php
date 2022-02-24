<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Blog;
class BlogController extends Controller
{
    // Knoledge hub
    public function singleKnowledgeHub($id,$slug)
    {
        $blog = Blog::Find($id);
        $trandPosts = Blog::where('type',$blog->type)->where('status',1)->whereNotIn('id',[$blog->id])->limit(3)->get();
        $relatedPosts = Blog::where('type',$blog->type)->where('status',1)->whereNotIn('id',[$blog->id])->limit(2)->get();
        return view('frontend.pages.knowledgeHub.single',compact('blog','trandPosts','relatedPosts'));
    }

    // Knoledge hub
    public function searchKnowledgeHub($name)
    {
        $blogs = Blog::where('type',$name)->get();
        $blogsPaginate = Blog::where('type',$name)->where('status',1)->paginate(5);
        $trandPosts = Blog::where('type',$name)->where('status',1)->limit(3)->get();
        return view('frontend.pages.knowledgeHub',compact('blogs','blogsPaginate','trandPosts'));
    }
}
