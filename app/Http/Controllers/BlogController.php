<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Parsedown;

class BlogController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs')->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('blog', ['blogs' => $blogs]);
    }

    public function view($title_route){
        $posts = DB::table('blogs')->where('title_route', $title_route)->select('title', 'thumbnail', 'markdown')->get();
        return view('view', ['posts' => $posts]);
    }
}
