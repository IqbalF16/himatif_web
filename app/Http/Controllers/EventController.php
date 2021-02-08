<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $count = 100;
        return view('event', ['count' => $count]);
    }
}
