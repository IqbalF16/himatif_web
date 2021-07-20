<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Parsedown;

class AdminBlog extends Controller
{
    public function index(){
        return view("admin.writeBlog");
    }

    public function add(Request $request){
        // $this->validate($request,[
        //     'title' => 'required',
        //     'thumbnile' => 'required|file|image|mimes:jpeg,jpg,png|max:2048',
        //     'markdown' => 'required'
        // ]);

            Blog::create([
                'title' => $request->title,
                'thumbnile' => $request->thumbnile,
                'markdown' => $request->markdown,
            ]);
            return redirect()->route('adminBlog');
    }

    public function remove(){

    }

    public function edit(){

    }
}
