<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;
use Parsedown;

class AdminBlog extends Controller
{
    public function index()
    {
        return view("admin.writeMarkdown");
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

        $date = SupportCarbon::now();
        $date = str_replace('-', '', $date->toDateString()).str_replace(':', '', $date->toTimeString());
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

    public function edit($title_route)
    {
        $posts = DB::table('blogs')->where('title_route', $title_route)->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('admin.editMarkdown', ['posts' => $posts]);
    }

    public function update(Request $request){
        $update = Blog::where('title_route', $request->title_route)->update([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'markdown' => $request->markdown,
        ]);
        return redirect()->route('adminBlog');
    }
}
