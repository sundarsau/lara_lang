<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
class HomeController extends Controller
{
    public function setLanguage($lang)
    {
        Session::put('locale',$lang);
        App::setLocale($lang);
        return redirect()->back(); 
    }
  public function index(){
    return view('index');
  }
}
