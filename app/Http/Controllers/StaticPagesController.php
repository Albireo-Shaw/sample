<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{
    //主页控制
    public function home() {
        return view('static_pages/home');
    }

    //帮助
    public function help() {
        return view('static_pages/help');
    }

    //关于
    public function about() {
        return view('static_pages/about');
    }

}
