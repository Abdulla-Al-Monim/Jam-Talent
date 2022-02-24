<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
class CategoryController extends Controller
{
    //show sub category
    public function subCategory($id)
    {
        $subCategories = Category::where('parent_id',$id)->get();
        $countSubategories = Category::where('parent_id',$id)->count();
        if ($countSubategories == 0) {
            $subCategories = $subCategories = Category::orderBy('id','desc')->get();
        }
        return view('frontend.pages.category.subCategory',compact('subCategories','countSubategories'));
    }

    
}
