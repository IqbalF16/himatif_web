<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $date = Carbon::now();
        $date = str_replace('-', '', $date->toDateString());
        $title_route = $date."-".
        $request->title;
        Blog::create([
            'title_route' => $title_route,
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'markdown' => $request->markdown,
        ]);
        return redirect()->route('adminBlog');
    }

    public function delete($title_route)
    {
        DB::table('blogs')->where('title_route', $title_route)->delete();
        return redirect()->back();
    }

    public function edit()
    {
    }
}
