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

    static $data_full;
    static $data_type;
    static $data_name;

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
        AdminForm::$data_full = json_decode($request->data);
        AdminForm::$data_name = AdminForm::getNameData(AdminForm::$data_full);
        AdminForm::$data_type = AdminForm::getTypeData(AdminForm::$data_full);

        $date = Carbon::now();
        $date = str_replace('-', '', $date->toDateString()) . str_replace(':', '', $date->toTimeString());
        $title_route = $date . "-" . $request->title;
        $table_title = preg_replace("![^a-z0-9]+!i", "-", $request->title);

        $temp = $table_title;
        $form_link = str_replace('-', '', ucwords($temp));

        if (Schema::hasTable($table_title)) {
            return redirect()->back()->withErrors(["a form with this title has been created before."]);
        }

        Form::create([
            'title_route' => $title_route,
            'title' => $request->title,
            'table_title' => strtolower($table_title),
            'link' => $form_link,
            'form_in_json' => "$request->data",
        ]);

        Schema::connection('mysql')->create($table_title, function (Blueprint $table) {
            $table->bigIncrements('id');
            for ($i=0; $i < count(AdminForm::$data_type); $i++) {
                if (in_array('textarea', AdminForm::$data_type)) {
                    $table->longText(AdminForm::$data_name[$i]);
                }else{
                    $table->string(AdminForm::$data_name[$i]);
                }
            }
            $table->timestamps();
        });
        return redirect()->route('adminForm');
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

    static function getNameData($json_data)
    {
        $result_data = array();
        foreach ($json_data as $data) {
            if ($data->type == 'header') continue;
            if ($data->type == 'paragraph') continue;
            array_push($result_data, $data);
        }

        $array_new = array();
        for ($i = 0; $i < count($result_data); $i++) {
            $array_new[$i] = $result_data[$i]->name;
        }

        return $array_new;
    }

    static function getTypeData($json_data)
    {
        $result_data = array();
        foreach ($json_data as $data) {
            if ($data->type == 'header') continue;
            if ($data->type == 'paragraph') continue;
            array_push($result_data, $data);
        }

        $array_new = array();
        for ($i = 0; $i < count($result_data); $i++) {
            $array_new[$i] = $result_data[$i]->type;
        }

        return $array_new;
    }
}
