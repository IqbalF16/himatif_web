<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Parsedown;

class AdminBlog extends Controller
{
    public function index()
    {
        return view("admin.writeBlog");
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:blogs',
            'thumbnail' => 'required',
            'markdown' => 'required'
        ],[
            'title.required|unique:blogs' => 'Title harus berbeda dengan post yang sudah pernah dibuat.',
            'thumbnail.required' => 'Thumbnail is required',
            'makrdown.required' => 'Markdown is required',
        ]);
        // dd($validated);
        Blog::create([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'markdown' => $request->markdown,
        ]);
        return redirect()->route('adminBlog');
    }

    public function remove()
    {
    }

    public function edit()
    {
    }
}
