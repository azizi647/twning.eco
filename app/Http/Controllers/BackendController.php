<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App\Page;
class BackendController extends Controller
{

    public function index()
    {
        /*
            $menucount  = Menu::groupby('menu_id')->distinct()->get()->count();
            $usercount  = User::count();
            $pagecount  = Page::groupby('page_id')->distinct()->get()->count();
        */
        return view('adminpanel.dashboard');
//        return view('adminpanel.dashboard')->with([
//            'menucount'=>$menucount,
//            'usercount'=>$usercount,
//            'pagecount'=>$pagecount,
//        ]);
    }
}
