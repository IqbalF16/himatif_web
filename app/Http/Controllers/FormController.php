<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index($link){
        $forms = Form::where('link', $link)->select('id', 'title', 'link', 'iframe')->get();
        return view('form', ['forms' => $forms]);
    }
}
