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
        $blogs = DB::table('blogs')->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('admin.blog', ['blogs' => $blogs]);
    }

    public function event(){
        $events = DB::table('events')->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('admin.event', ['events' => $events]);
    }

    public function form(){
        $forms = DB::table('events')->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('admin.form', ['forms' => $forms]);
    }
}
