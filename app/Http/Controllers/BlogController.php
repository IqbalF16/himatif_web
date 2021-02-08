<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $count = 100;
        return view('blog', ['count' => $count]);
    }
}
