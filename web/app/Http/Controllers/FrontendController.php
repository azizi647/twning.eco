<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('site.pages.index');
    }
    
    public function about(){
        
        return view('site.pages.about');
    }
    public function team(){
        
        return view('site.pages.team');
    }
    public function contact(){
        
        return view('site.pages.contact');
    }
    public function pages(){
        
        return view('site.pages.pages');
    }
    
    
//     public function pages($url){
//     left menu 
//        $cat = \App\Menu::where('url','=', $url)->first();
//        if($cat){
//        
//            //sorgu
//          return view('site.pages.pages', ['projects'=>$projects]);
//        }
//          return Redirect::back();
//        }

       
}
