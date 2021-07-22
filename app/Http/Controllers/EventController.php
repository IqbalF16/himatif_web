<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Parsedown;

class EventController extends Controller
{
    public function index(){
        $events = DB::table('events')->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('event', ['events' => $events]);
    }

    public function view($title_route){
        $posts = DB::table('events')->where('title_route', $title_route)->select('title', 'thumbnail', 'markdown')->get();
        return view('view', ['posts' => $posts]);
    }
}
