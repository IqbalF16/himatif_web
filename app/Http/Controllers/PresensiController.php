<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'active' => 0,
        ]);

        $json_data = Storage::disk('local')->exists($request->link . '.json') ? json_decode(Storage::disk('local')->get($request->link . '.json')) : [];
        // dd($json_data);
        Storage::disk('local')->put($request->link . '.json', json_encode($request));

        return redirect()->route('viewPresensi', [
            'title' => $request->title,
            'link' => $request->link
        ]);
    }

    public function view(Request $request, $link)
    {
        $presensi = Presensi::where('link', $link)->first();
        // foreach ($presensi as $p) {
            $temp = new Carbon($presensi->created_at);
            // array_push($datetime, $temp->toDateTimeString());
            // }
            $datetime = $temp->toDateTimeString();
        return view('admin.viewPresensi', [
            'presensi' => $presensi,
            'datetime' => $datetime
        ]);
    }

    public function checkin($link)
    {
        $presensi = Presensi::where('link', $link)->first();
        // dd($presensi);
        return view('checkin', [
            'presensi' => $presensi
        ]);
    }

    public function checkinauto($link)
    {
        echo "asd auto";
    }

    public function postCheckin(Request $request)
    {
        $nama = $request->name;
        $nim = $request->nim;
        $pin = $request->pin1 . $request->pin2 . $request->pin3 . $request->pin4 . $request->pin5 . $request->pin6;

        $data = [
            'nama' => $nama,
            'nim' => $nim
        ];

        $json_data = json_decode(Storage::get($request->link . '.json'));

        array_push($json_data, $data);

        Storage::put($request->link . '.json', $json_data);

        dd($json_data);
        return redirect()->back();
    }

    public function refresh(Request $request)
    {
        $pin = rand(111111, 999999);
        Presensi::where('link', $request->link)->update([
            'pin' => $pin,
        ]);

        return $pin;
    }

    public function toggle(Request $request)
    {
        $toggle = ($request->toggle == true) ? 1 : 0;
        $presensi = Presensi::where('link', $request->link)->first();

        if ($presensi->active == 1) {
            Presensi::where('link', $request->link)->update([
                'active' => 0,
            ]);
        } else {
            Presensi::where('link', $request->link)->update([
                'active' => 1,
            ]);
        }

        return [$request, $toggle, $presensi];
    }

    public function control(Request $request)
    {
        // $Presensi::where('link', $request->link)->first();
        // echo "asd";
        // return $request;
    }

    public function file($filename)
    {
    }
}
