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
    // blog edit
    public function edit($id){
        $blog = Blog::Find($id);
        $blogtypes  = Blogtype::orderBy('id','asc')->get();
        return view('backend.pages.blog.edit',compact('blogtypes','blog'));
    }

    public function store(Request $request){
        $request->validate([
        'title' => 'required',

        'image' => 'required',
        
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
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/blog/' . $img);
            Image::make($image)->resize(1293,934)->save($location);
            $blog->image            = $img;
        }
        if ($request->image) {
            
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/blog/' . $img);
            Image::make($image)->resize(700,506)->save($location);
            $blog->image_related            = $img;
        }
        if ($request->image) {
            
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/blog/' . $img);
            Image::make($image)->resize(500,750)->save($location);
            $blog->image_single            = $img;
        }

        $blog->s_desc = $request->s_desc;
        $blog->desc = $request->desc;
        $blog->featured = 1;
        $blog->save();
                                if(session()->get('locale') == 'ar') 
        {
            $notification=array(
            'message'=>'إنشاء مدونة بنجاح',
            'alert-type'=>'success'
        );
        } 
        elseif(session()->get('locale') == 'tk')
        {
            $notification=array(
            'message'=>'Blog Başarıyla Oluşturuldu',
            'alert-type'=>'success'
        );
        }  
        else
        {
            $notification=array(
            'message'=>'Blog Create Successfully',
            'alert-type'=>'success'
        );
        }
        
        return redirect()->route('blog.manage')->with($notification);
    }
    // update blog
    public function update(Request $request, $id){
        $request->validate([
        'title' => 'required',

        'desc' => 'required',
       
        'type' => 'required',
        'image'=>'required|dimensions:min_width=1293,min_height=934',
        
            ],
            [ 'image.dimensions' => ' Please set Image dimensions: Min with 1293 , Min height 934']);
        $blog =  Blog::Find($id);
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->slug = Str::slug($request->title); 
        if ($request->image) {
            
            
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/blog/' . $img);
            Image::make($image)->resize(1293,934)->save($location);
            $blog->image            = $img;
        }
        if ($request->image) {
                        $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/blog/' . $img);
            Image::make($image)->resize(700,950)->save($location);
            $blog->image_single            = $img;
        }
        if ($request->image) {
           
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/blog/' . $img);
            Image::make($image)->resize(700,506)->save($location);
            $blog->image_related            = $img;
        }
        
        $blog->s_desc = $request->s_desc;
        $blog->desc = $request->desc;
        $blog->featured = 1;
        $blog->save();
                                        if(session()->get('locale') == 'ar') 
        {
                    $notification=array(
            'message'=>'تحديث المدونة بنجاح',
            'alert-type'=>'success'
        );
        } 
        elseif(session()->get('locale') == 'tk')
        {
                    $notification=array(
            'message'=>'Blog Güncellemesi Başarıyla',
            'alert-type'=>'success'
        );
        }  
        else
        {
                    $notification=array(
            'message'=>'Blog Update Successfully',
            'alert-type'=>'success'
        );
        }

        return redirect()->route('blog.manage')->with($notification);
    }
    // manage blog
    public function manage(){
        if (Auth::user()->user_type_id == 0) {
            $blogs  = Blog::orderBy('id','desc')->get();
            return view('backend.pages.blog.manage',compact('blogs'));
        }
        else if(Auth::user()->user_type_id == 2){
            $blogs  = Blog::orderBy('id','desc')->get();
            return view('backend.pages.blog.manage',compact('blogs'));
        }
        else{
            $blogs  = Blog::orderBy('id','desc')->where('user_id',Auth::user()->id)->get();
            return view('backend.pages.blog.manage',compact('blogs'));
        }
        
    }

    //delete blog
    public function delete($id){
        $blog  = Blog::Find($id);
        $blog->delete();
       if(session()->get('locale') == 'ar') {
            $notification=array(
            'message'=>'تم حذف المدونة بنجاح',
            'alert-type'=>'success'
        );
                                                }
        
        
        elseif(session()->get('locale') == 'tk')
        {
            $notification=array(
            'message'=>'Blog Başarıyla Silindi',
            'alert-type'=>'success'
        );
        }  
        else
        {
            $notification=array(
            'message'=>'Blog Delete Successfully',
            'alert-type'=>'success'
        );
        }

        
        return redirect()->back()->with($notification);
    }
    //actvie blog
    public function active($id){
        $blog  = Blog::Find($id);
        $blog->status = 1;
        $blog->save();
                                if(session()->get('locale') == 'ar') 
        {
            $notification=array(
            'message'=>'تم تفعيل المدونة بنجاح',
            'alert-type'=>'success'
        );
        } 
        elseif(session()->get('locale') == 'tk')
        {
            $notification=array(
            'message'=>'Blog başarıyla aktif',
            'alert-type'=>'success'
        );
        }  
        else
        {
            $notification=array(
            'message'=>'Blog active Successfully',
            'alert-type'=>'success'
        );
        }
        
        return redirect()->back()->with($notification);
    }
    //en-actvie blog
    public function enActive($id){
        $blog  = Blog::Find($id);
        $blog->status = 0;
        $blog->save();
                        if(session()->get('locale') == 'ar') 
        {
            $notification=array(
            'message'=>'تم تفعيل المدونة بنجاح',
            'alert-type'=>'success'
        );
        } 
        elseif(session()->get('locale') == 'tk')
        {
            $notification=array(
            'message'=>'Blog Başarıyla Etkinleştirildi',
            'alert-type'=>'success'
        );
        }  
        else
        {
            $notification=array(
            'message'=>'Blog En-Active Successfully',
            'alert-type'=>'success'
        );
        }

        
        return redirect()->back()->with($notification);
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
        $blogType->name_ar = $request->name_ar;
        $blogType->name_tr = $request->name_tr;
        $blogType->save();
                if(session()->get('locale') == 'ar') 
        {
            $notification=array(
            'message'=>'تم إنشاء فئة المدونة بنجاح',
            'alert-type'=>'success'
        );
        } 
        elseif(session()->get('locale') == 'tk')
        {
            $notification=array(
            'message'=>'Blog Kategorisi Başarıyla Oluşturuldu',
            'alert-type'=>'success'
        );
        }  
        else
        {
            $notification=array(
            'message'=>'Blog Category Created Successfully',
            'alert-type'=>'success'
        );
        }
        
        return redirect()->route('blog.type.manage')->with($notification);
    }
    // add blog type
    public function updateBlogType($id, Request $request){
        $request->validate([
        'name' => 'required',
            ]);
        $blogType  =  Blogtype::Find($id);
        $blogType->name = $request->name;
        $blogType->name_ar = $request->name_ar;
        $blogType->name_tr = $request->name_tr;
        $blogType->save();
                if(session()->get('locale') == 'ar') 
        {
            $notification=array(
            'message'=>'تم التحديث بنجاح',
            'alert-type'=>'success'
        );
        } 
        elseif(session()->get('locale') == 'tk')
        {
            $notification=array(
            'message'=>'Başarıyla Güncelle',
            'alert-type'=>'success'
        );
        }  
        else
        {
            $notification=array(
            'message'=>'Update Successfully',
            'alert-type'=>'success'
        );
        }
        
        return redirect()->back()->with($notification);
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
        if(session()->get('locale') == 'ar') 
        {
            $notification=array(
            'message'=>'تم حذف الفئة بنجاح',
            'alert-type'=>'success'
            );
        } 
        elseif(session()->get('locale') == 'tk')
        {
            $notification=array(
            'message'=>'Kategori Başarıyla Silindi',
            'alert-type'=>'success'
            );
        }  
        else
        {
            $notification=array(
            'message'=>'Category Delete Successfully',
            'alert-type'=>'success'
            );
        }
        
        return redirect()->back()->with($notification);
    }
}
