<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PresensiController extends Controller
{
    public function add(Request $request)
    {
        $pin = rand(111111, 999999);
        Presensi::create([
            'title' => $request->title,
            'link' => $request->link,
            'pin' => $pin,
            'active' => false,
        ]);

        return redirect()->route('viewPresensi', [
            'title' => $request->title,
            'link' => $request->link
        ]);
    }

    public function view(Request $request, $link)
    {
        $presensi = Presensi::where('link', $link)->select('id', 'title', 'link', 'pin', 'active')->first();

        return view('admin.viewPresensi', [
            'presensi' => $presensi,
        ]);
    }

    public function checkin($link){
        $presensi = Presensi::where('link', $link)->first();
        return view('checkin',[
            'presensi' => $presensi
        ]);
    }

    public function checkinauto($link){
        echo "asd auto";
    }

    public function postCheckin($request){
        dd($request);
    }

    public function refresh(Request $request){
        $pin = rand(111111, 999999);
        Presensi::where('link', $request->link)->update([
            'pin' => $pin,
        ]);

        return $pin;
    }

    public function toggle(Request $request){
        if ($request->toggle) {
            Presensi::where('link', $request->link)->update([
                'active' => 1,
            ]);
        } else {
            Presensi::where('link', $request->link)->update([
                'active' => 0,
            ]);
        }

        return $request;
    }
}
