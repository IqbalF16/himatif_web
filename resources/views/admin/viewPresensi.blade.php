@extends('layouts.app')

@section('content')
    @csrf
    <input type="hidden" name="link" id="link" value="{{ $presensi->link }}">
    <div class="container">
        <div class="card" style="height: 73vh">
            <div class="card-body">
                <div class="container row justify-content-between mb-3">
                    <h1 class="align-middle m-0" id=" title">
                        {{ $presensi->title }}
                    </h1>
                    <input id="presensitoggle" type="checkbox" data-toggle="switchbutton" {{ $presensi->active ? ' checked' : '' }}
                        data-onlabel="Active" data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger">
                    <div class="countdown d-inline-flex">
                        <button type="button" class="btn btn-primary">
                            Refresh <span id="timer" class="badge badge-light" data-countdown="120">00:02:00</span>
                        </button>
                    </div>
                </div>
                <div class="
                        card-text">
                    <table class="table table-bordered">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col>
                        </colgroup>
                        <tbody>
                            <tr>
                                <td scope="row" rowspan="2">
                                    <span style="writing-mode: vertical-lr; transform: rotate(180deg)"><a
                                            class="text-dark" href="{{ route('checkin', $presensi->link) }}"
                                            target="_blank">{{ route('checkin', $presensi->link) }}</a></span>
                                </td>
                                <td class="text-center align-middle" rowspan="2">
                                    <div id='qrcode' class="center">
                                    </div>
                                    <h4 id="pin">{{ $presensi->pin }}</h4>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
