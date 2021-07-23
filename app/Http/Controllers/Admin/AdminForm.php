<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminForm extends Controller
{
    public function index()
    {
        return view("admin.writeForm");
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:events',
            'thumbnail' => 'required',
            'markdown' => 'required'
        ], [
            'title.required|unique:events' => 'Title harus berbeda dengan post yang sudah pernah dibuat.',
            'thumbnail.required' => 'Thumbnail is required',
            'makrdown.required' => 'Markdown is required',
        ]);

        $date = Carbon::now();
        $date = str_replace('-', '', $date->toDateString()) . str_replace(':', '', $date->toTimeString());
        $title_route = $date . "-" . $request->title;
        Form::create([
            'title_route' => $title_route,
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'markdown' => $request->markdown,
        ]);
        return redirect()->route('adminEvent');
    }

    public function delete($title_route)
    {
        DB::table('events')->where('title_route', $title_route)->delete();
        return redirect()->back();
    }

    public function edit($title_route)
    {
        $posts = DB::table('events')->where('title_route', $title_route)->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('admin.editMarkdown', ['posts' => $posts]);
    }

    public function update(Request $request)
    {
        $update = Form::where('title_route', $request->title_route)->update([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'markdown' => $request->markdown,
        ]);
        return redirect()->route('adminForm');
    }
}
