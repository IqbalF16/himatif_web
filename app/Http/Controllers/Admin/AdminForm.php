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
        $form = Form::create([
            'title' => $request->title,
            'link' => $request->link,
            'iframe' => $request->iframe,
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('forms')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        // dd($request, $id);
        $update = Form::where('id', $id)->update([
            'title' => $request->title_edit,
            'link' => $request->link_edit,
            'iframe' => $request->iframe_edit,
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
