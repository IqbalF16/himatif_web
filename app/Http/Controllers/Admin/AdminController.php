<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function blog()
    {
        $blogs = DB::table('blogs')->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('admin.blog', ['blogs' => $blogs]);
    }

    public function event()
    {
        $events = DB::table('events')->select('title_route', 'title', 'thumbnail', 'markdown')->get();
        return view('admin.event', ['events' => $events]);
    }

    public function form(Request $request)
    {
        $forms = Form::select('id', 'title', 'link', 'iframe')->get();
        return view('admin.form', ['forms' => $forms, 'request' => $request]);
    }

    public function usermanagement()
    {
        $users = User::where('email', '!=', 'admin@himatifumg.com')->get();
        // dd($users);
        return view('admin.usermanagement', ['users' => $users]);
    }

    public function saveUserManagement(Request $request)
    {
        $usernames = array();
        foreach (array_keys($request->all()) as $key) {
            array_push($usernames, $key);
        }
        array_splice($usernames, 0, 1);

        $roles = array();
        foreach (array_values($request->all()) as $value) {
            array_push($roles, $value);
        }
        array_splice($roles, 0, 1);

        $users = array();
        for ($i = 0; $i < count($usernames); $i++) {
            $user = User::where('name', $usernames[$i])->first();
            // echo $i."=> ";
            // echo $user->getRoleNames()[0].", ";
            $user->syncRoles($roles[$i]);
        }
        // echo User::where('name', 'uba')->first()->getRoleNames()->first();
        // dd($usernames, $roles, User::where('name', 'uba')->first()->getRoleNames());
        return redirect()->back();
    }

    public function deleteUserManagement($name)
    {
        User::where('name', $name)->delete();
        return redirect()->back();
    }

    public function presensi(Request $request){
        $presensi = Presensi::all();
        return view('admin.presensi', ['presensi' => $presensi, 'request' => $request]);
    }
}
