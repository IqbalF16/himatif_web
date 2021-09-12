@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="height: 73vh">
            <div class="card-body">
                <h4 class="card-title">{{ $presensi->title }}</h4>
                <p class="card-text">
                <table class="table table-bordered">
                    <colgroup>
                        <col style="width: 5%">
                        <col style="width: 25%">
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td scope="row" rowspan="2">
                                <span style="writing-mode: vertical-lr; transform: rotate(180deg)"><a
                                        class="text-dark" href="{{ route('checkin', $presensi->link) }}">{{ route('checkin', $presensi->link) }}</a></span>
                            </td>
                            <td class="text-center align-middle" rowspan="2">
                                {!! QrCode::size(200)->generate(route('checkinAuto', [$presensi->link, $presensi->pin])) !!}
                                <h1>{{ $presensi->pin }}</h1>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </tbody>
                </table>

                </p>
            </div>
        </div>
    </div>
@endsection
