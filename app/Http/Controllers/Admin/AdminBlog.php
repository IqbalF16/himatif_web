<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBlog extends Controller
{
    public function index(){
        return view("admin.writeBlog");
    }

    public function add(Request $request){
        dd($request);
    }

    public function remove(){

    }

    public function edit(){

    }
}
