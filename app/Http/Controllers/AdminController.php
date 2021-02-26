<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function blog(){
        $count = 100;
        return view('admin.blog', ['count' => $count]);
    }
    
    public function event(){
        $count = 100;
        return view('admin.event', ['count' => $count]);
    }

    public function form(){
        $count = 100;
        return view('admin.form', ['count' => $count]);
    }
}
