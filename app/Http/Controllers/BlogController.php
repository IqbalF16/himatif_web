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
        $parse = new Parsedown();
        $blogs = DB::table('blogs')->where('title_route', $title_route)->select('title', 'thumbnail', 'markdown')->get();
        // for ($i=0; $i < count($blogs); $i++) {
        //     $blogs[$i]->markdown = $parse->text($blogs[$i]->markdown);
        // }
        return view('view', ['blogs' => $blogs, 'parse' => $parse]);
    }
}
