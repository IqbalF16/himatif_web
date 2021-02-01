@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- ini adalah penggunaan 'blade directive' untuk role -->
                    @role('admin')
                    Anda masuk dengan role 'admin'
                    @endrole
                    @role('user')
                    Anda masuk dengan role 'user'
                    @endrole
                    @guest
                    Anda belum login
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
