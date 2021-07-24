<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class AdminForm extends Controller
{
    public function index()
    {
        return view("admin.writeForm");
    }

    public function save(Request $request)
    {
        // $data = $request->session()->put('json_data',$request->json_data);
    }

    public function add(Request $request)
    {
        dd(json_decode($request->data));
        // echo( json_decode($request->data)[0]->label);
        // echo count(json_decode($request->data));
        $i = 0;
        foreach (json_decode($request->data) as $data) {
            echo $data->type."\n";
        }

        $data_full = json_decode($request->data);
        // $data_inputable =

        // $date = Carbon::now();
        // $date = str_replace('-', '', $date->toDateString()) . str_replace(':', '', $date->toTimeString());
        // $title_route = $date . "-" . $request->title;
        // Form::create([
        //     'title_route' => $title_route,
        //     'title' => $request->title,
        //     'form_in_json' => $request->data,
        // ]);
        // $table_title = preg_replace("![^a-z0-9]+!i", "-", $request->title);


        // Schema::connection('mysql')->create($table_title, function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     // $table->
        //     $table->timestamps();
        // });
        // return redirect()->route('adminForm');
    }

    public function delete($title_route)
    {
        DB::table('forms')->where('title_route', $title_route)->delete();
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
