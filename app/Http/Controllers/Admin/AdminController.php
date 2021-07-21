<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function blog(){
        $blogs = DB::table('blogs')->select('title', 'thumbnail', 'markdown')->get();
        return view('admin.blog', ['blogs' => $blogs]);
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
