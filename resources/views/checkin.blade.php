@extends('layouts.app')

@section('content')
    <input type="hidden" name="link" value="{{ $presensi->link }}">
    <input type="hidden" name="toggle" value="{{ $presensi->toggle }}">
    <div class="container">
        <div class="row justify-content-center" style="top: 50%;">
            <div class="col-md-7">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $presensi->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><a
                                href="{{ route('checkin', $presensi->link) }}">{{ route('checkin', $presensi->link) }}</a>
                        </h6>
                        <p class="card-text">
                            @if ($presensi->active)
                                <form action="{{ route('postCheckin') }}" method="post" class="w-100"
                                    id="checkin">
                                    @csrf
                                    <input type="hidden" name="link" value="{{ $presensi->link }}">
                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="form-group row justify-content-center">
                                                <label for="name">Nama</label>
                                                <input id="name" class="form-control w-100" type="text" name="name"
                                                    placeholder="Name" maxlength="30" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="form-group row justify-content-center">
                                                <label for="nim">NIM</label>
                                                <input id="nim" class="form-control w-100" type="text" name="nim"
                                                    placeholder="NIM" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <label for="pin">Pin</label>
                                        </div>
                                        <div class="row justify-content-center">
                                            <input id="pin" class="form-control" type="text" name="pin1" required>
                                            <input id="pin" class="form-control" type="text" name="pin2" required>
                                            <input id="pin" class="form-control" type="text" name="pin3" required>
                                            <input id="pin" class="form-control" type="text" name="pin4" required>
                                            <input id="pin" class="form-control" type="text" name="pin5" required>
                                            <input id="pin" class="form-control" type="text" name="pin6" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            @else
                                <h1 class="text-center">Presensi Tidak Aktif</h1>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #pin {
            width: 35px;
            margin: 0 5px;
        }

    </style>
    <script src="{{ asset('js/jquery.maxlength.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script>
        $("[name^='pin']").attr('maxlength', '1');
        $("[name^='pin']").keyup(function() {
            if ($(this).val().lenght == 1) {

            }
            $(this).next().focus();
        });
    </script>
@endsection
