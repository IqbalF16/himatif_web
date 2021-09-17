@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="top: 50%;">
            <div class="col-md-7">
                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $presensi->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><a
                                href="{{ route('checkin', $presensi->link) }}">{{ route('checkin', $presensi->link) }}</a>
                        </h6>
                        <p class="card-text">
                        <form action="{{ route('postCheckin') }}" method="post" class="w-100">
                            <div class="form-group">
                                <label for="pin"></label>
                                <div class="row justify-content-center">
                                    <div class="form-group row justify-content-center">
                                        <label for="name"></label>
                                        <input id="name" class="form-control w-100" type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pin"></label>
                                <div class="row justify-content-center">
                                    <input id="pin" class="form-control" type="text" name="pin1">
                                    <input id="pin" class="form-control" type="text" name="pin2">
                                    <input id="pin" class="form-control" type="text" name="pin3">
                                    <input id="pin" class="form-control" type="text" name="pin4">
                                    <input id="pin" class="form-control" type="text" name="pin5">
                                    <input id="pin" class="form-control" type="text" name="pin6">
                                </div>
                            </div>
                        </form>
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
    <script>
        $("[name^='pin']").attr('maxlength', '1');
        $("[name^='pin']").keyup(function() {
            if ($(this).val().lenght == 1) {
                
            }
            $(this).next().focus();
        });
    </script>
@endsection
