<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function blog(){
        return view('admin.blog');
    }
    
    public function event(){
        return view('admin.event');
    }
}
