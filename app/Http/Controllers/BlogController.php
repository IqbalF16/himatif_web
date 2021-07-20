<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs')->select('title', 'thumbnile', 'markdown')->get();
        return view('blog', ['blogs' => $blogs]);
    }
}
