<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // uncomment code below must login for access this class
        // dd(Auth::check());
        // $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->select('id', 'title_route', 'title', 'thumbnail')->limit(5)->get();
        $events = Event::orderBy('id', 'desc')->select('id', 'title_route', 'title', 'thumbnail')->limit(5)->get();

        return view('home', ['blogs' => $blogs, 'events' => $events]);
    }
}
