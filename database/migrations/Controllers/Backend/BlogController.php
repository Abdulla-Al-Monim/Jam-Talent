<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\Blog;
use App\Models\Backend\Blogtype;
use Illuminate\Support\Str;
use Image;
use Auth;
class BlogController extends Controller
{
    public function create(){
        $blogtypes  = Blogtype::orderBy('id','asc')->get();
        return view('backend.pages.blog.create',compact('blogtypes'));
    }
    public function store(Request $request){
        $request->validate([
        'title' => 'required',

        'image' => 'required',
        'desc' => 'required',
        's_desc' => 'required',
        'desc' => 'required',
        'type' => 'required',
            ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->user_id = Auth::user()->id;
        $blog->type = $request->type;
        $blog->slug = Str::slug($request->title); 
        if ($request->image) {
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->getClientOriginalExtension();
            $location               = public_path('images/blog/' . $img);
            Image::make($image)->save($location);
            $blog->image            = $img;
        }
        $blog->s_desc = $request->s_desc;
        $blog->desc = $request->desc;
        $blog->featured = 1;
        $blog->save();
        return redirect()->route('blog.manage');
    }
    // manage blog
    public function manage(){
        if (Auth::user()->user_type_id == 0) {
            $blogs  = Blog::orderBy('id','asc')->get();
            return view('backend.pages.blog.manage',compact('blogs'));
        }
        else if(Auth::user()->user_type_id == 2){
            $blogs  = Blog::orderBy('id','asc')->get();
            return view('backend.pages.blog.manage',compact('blogs'));
        }
        else{
            $blogs  = Blog::orderBy('id','asc')->where('user_id',Auth::user()->id)->get();
            return view('backend.pages.blog.manage',compact('blogs'));
        }
        
    }

    //delete blog
    public function delete($id){
        $blog  = Blog::Find($id);
        $blog->delete();
        return redirect()->back();
    }
    //actvie blog
    public function active($id){
        $blog  = Blog::Find($id);
        $blog->status = 1;
        $blog->save();
        return redirect()->back();
    }
    //en-actvie blog
    public function enActive($id){
        $blog  = Blog::Find($id);
        $blog->status = 0;
        $blog->save();
        return redirect()->back();
    }

    
    // manage blog
    public function addBlogType(){
        return view('backend.pages.blog.createBlogType');
    }

    // add blog type
    public function storeBlogType(Request $request){
        $request->validate([
        'name' => 'required',
            ]);
        $blogType  = new Blogtype;
        $blogType->name = $request->name;
        $blogType->save();
        return redirect()->route('blog.type.manage');
    }

    //manage Blog Type
    public function manageBlogType(){
        $blogTypes  = Blogtype::orderBy('id','asc')->get();
        return view('backend.pages.blog.manageBlogType',compact('blogTypes'));
    }
    //delete blog type
    public function deleteBlogType($id){
        $blogtype  = Blogtype::Find($id);
        $blogtype->delete();
        return redirect()->back();
    }
}
