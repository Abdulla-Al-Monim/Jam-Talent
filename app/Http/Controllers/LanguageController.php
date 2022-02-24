<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App;
class LanguageController extends Controller
{
    // for bangla language
    public function arbi(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','arbi');
        return redirect()->back();
    }

    //   for english language
    public function english(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }
}
