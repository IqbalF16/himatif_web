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
        Storage::disk('local')->put($request->link . '.json', "[]");

        return redirect()->route('viewPresensi', [
            'title' => $request->title,
            'link' => $request->link
        ]);
    }

    public function delete($link)
    {
        Presensi::where('link', $link)->delete();
        if (Storage::exists($link . '.json')) {
            Storage::delete($link . '.json');
        }
        return redirect()->back();
    }

    public function deleteData(Request $request)
    {
        $data = json_decode(Storage::get($request->link.".json"));
        unset($data[$request->id]);
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    public function view(Request $request, $link)
    {
        $presensi = Presensi::where('link', $link)->first();
        $temp = new Carbon($presensi->created_at);
        $datetime = $temp->toDateTimeString();

        $data = json_decode(Storage::get($link.'.json'));

        return view('admin.viewPresensi', [
            'presensi' => $presensi,
            'datetime' => $datetime,
            'data' => $data,
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'nim' => 'required',
            'pin1' => 'required',
            'pin2' => 'required',
            'pin3' => 'required',
            'pin4' => 'required',
            'pin5' => 'required',
            'pin6' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Presensi tidak valid');
        }

        $nama = $request->name;
        $nim = $request->nim;
        $pin = $request->pin1 . $request->pin2 . $request->pin3 . $request->pin4 . $request->pin5 . $request->pin6;

        $datetime = Carbon::now()->toDateTimeString();

        $presensi = Presensi::where('link', $request->link)->first();
        if ($presensi->active == 0) {
            return redirect()->back()->with(['error' => 'Presensi tidak aktif']);
        }

        if ($pin != $presensi->pin) {
            return redirect()->back()->with(['error' => 'Pin sudah kedaluwarsa / tidak benar']);
        }

        $data = [
            'nama' => $nama,
            'nim' => $nim,
            'datetime' => $datetime,
        ];
        // dd(json_encode($data, JSON_PRETTY_PRINT));
        $json_data = json_decode(Storage::get($request->link . '.json'));
        // dd($json_data);
        array_push($json_data, $data);
        $asd = $json_data;
        // dd($asd, $test);

        Storage::put($request->link . '.json', json_encode($json_data, JSON_PRETTY_PRINT));

        // dd($json_data);
        return redirect()->back()->with(['success' => 'Presensi telah berhasil dilakukan']);
    }

    public function refresh(Request $request)
    {
        $pin = rand(111111, 999999);
        Presensi::where('link', $request->link)->update([
            'pin' => $pin,
        ]);

        return $pin;
    }

    public function refreshname(Request $request)
    {
        $data = Storage::get($request->link.'.json');

        return $data;
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

    public function download(Request $request)
    {
        $file = Storage::get($request->link.'.json');
        // $file = $file[$request->id];
        return $file;
    }
}
