@extends('layouts.app')

@section('content')
    @csrf
    <input type="hidden" name="link" id="link" value="{{ $presensi->link }}">
    <div id="isi" class="d-none"></div>
    <div class="container">
        <div class="container row justify-content-between mb-3">
            <h1 class="align-middle m-0" id=" title">
                {{ $presensi->title }}
            </h1>
            <input id="presensitoggle" type="checkbox" data-toggle="switchbutton"
                {{ $presensi->active ? ' checked' : '' }} data-onlabel="Active" data-offlabel="Inactive"
                data-onstyle="success" data-offstyle="danger">
            <div id="datetime" class="align-self-center">{{ $datetime }}</div>
            <div class="countdown d-inline-flex">
                <button type="button" class="btn btn-primary" id="refresh">
                    Refresh <span id="timer" class="badge badge-light" data-countdown="60">00:01:00</span>
                </button>
            </div>
        </div>
        <div class="
                        card-text">
            <table class="table table-borderless" style="height: 20vh">
                <colgroup>
                    <col style="width: 5%">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <td colspan="3" class="text-center">
                            <a class="text-dark" href="{{ route('checkin', $presensi->link) }}"
                                target="_blank">{{ route('checkin', $presensi->link) }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle" rowspan="2">
                            <div id='qrcode' class="center">
                            </div>
                            <h4 id="pin">{{ $presensi->pin }}</h4>
                            <div class="border border-dark" style="overflow-y: scroll; height: 20vh;">
                                <button class="btn btn-dark mb-1" type="button" data-file="json">Download as JSON</button>
                                <button class="btn btn-dark mb-1" type="button" data-file="xlsx">Download as xlsx</button>
                                <button class="btn btn-dark mb-1" type="button" data-file="csv">Download as csv</button>
                            </div>
                        </td>
                        <td class="" style=" overflow-y: scroll; overflow-x: hidden; height: 50vh; width: 75vw;;
                            position: fixed;">
                            <table class="table table-light table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Waktu</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $id => $d)
                                        <tr>
                                            <td>
                                                {{ $d->nama }}
                                            </td>
                                            <td>
                                                {{ $d->nim }}
                                            </td>
                                            <td>
                                                {{ $d->datetime }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" type="button"
                                                    id="delete{{ $id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/qrcode.js') }}"></script>
    <script src="{{ asset('js/viewPresensi.js') }}"></script>
    <style>
        #qrcode img {
            margin: 0;
        }

    </style>
@endsection
