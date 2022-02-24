<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type_id == 2) {
            $categories = Category::orderBy('name','asc')->get();
            $primary_category = Category::orderBy('name','asc')->where('parent_id',0)->get();
            return view('backend.pages.admin.category.manage', compact('categories','primary_category'));
        }
        else if (Auth::user()->user_type_id == 0) {
            $categories = Category::orderBy('name','asc')->get();
            $primary_category = Category::orderBy('name','asc')->where('parent_id',0)->get();
            return view('backend.pages.admin.category.manage', compact('categories','primary_category'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary_category = Category::orderBy('name','asc')->where('parent_id',0)->get();
        return view('backend.pages.admin.category.create',compact('primary_category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'name' => 'required|unique:categories|max:255',
            'image' => 'required',
            'parent_id' => 'required',
            'desc' => 'required',
        ],
        [
            'name.required' => 'Please Provide Category Name',
            'desc.required' => 'Please write category description'
        ]);

        $category = new Category();
        $category->name       = $request->name;
        $category->name_ar       = $request->name_ar;
        $category->name_tr       = $request->name_tr;
        $category->slug       = Str::slug($request->name);
        if ($request->image) {
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/category/' . $img);
            Image::make($image)->resize(100,100)->save($location);
            $category->image            = $img;
        }
        $category->desc       = $request->desc;
        $category->parent_id  = $request->parent_id;
        $category->featured  = $request->featured;
        $category->popular  = $request->popular;
        $category->save();
        $notification=array(
            'message'=>'Category create Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('category.manage')->with($notification);
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
        $primary_category = Category::orderBy('name','asc')->where('parent_id',0)->get();
        $category = Category::find($id);
        if ( !is_null( $category ) ){
            return view('backend.pages.admin.category.update', compact('category','primary_category'));
        }
        else{
            return route('category.manage');
        }
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
        $request->validate([
            'name' => 'required|max:255'
        ],
        [
            'name.required' => 'Please Provide Category Name'
        ]);

        $category               = Category::find($id);
        $category->name       = $request->name;
        $category->name_ar       = $request->name_ar;
        $category->name_tr       = $request->name_tr;
        $category->slug       = Str::slug($request->name);
        if ($request->image) {
            $image                  = $request->file('image');
            $img                    = time() . '.' . $image->extension();
            $location               = public_path('images/category/' . $img);
            Image::make($image)->resize(100,100)->save($location);
            $category->image            = $img;
        }
        $category->desc       = $request->desc;
        $category->parent_id  = $request->parent_id;
        $category->featured  = $request->featured;
        $category->popular  = $request->popular;
        $category->save();
        $notification=array(
            'message'=>'Category Update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('category.manage')->with($notification);
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
