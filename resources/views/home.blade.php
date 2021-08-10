@extends('layouts.app')

@section('content')
    <div id="blogCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < count($events); $i++)
                <li data-target="#blogCarousel" data-slide-to="{{ $i }}"
                    class="{{ $i == 0 ? ' active' : '' }}"></li>
            @endfor
        </ol>
        <div class="carousel-inner" role="listbox">
            @for ($i = 0; $i < count($events); $i++)
                <div class="carousel-item{{ $i == 0 ? ' active' : '' }}" style="height: 400px">
                    <img src="{{ $events[$i]->thumbnail }}" alt="{{ $events[$i]->title }}"
                        style="width: 100%; object-fit: contain">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $events[$i]->title }}</h5>
                    </div>
                </div>
            @endfor
        </div>
        <a style="width: 5%" class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a style="width: 5%" class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @for ($i = 0; $i < count($blogs); $i++)
        @if ($i % 2 == '0') <div class="jumbotron jumbotron-fluid
        text-dark m-0" style="background: linear-gradient(to left, rgba(0, 0, 0, 0) 50%, rgb(0, 0, 0) 70%),
        url('{{ $blogs[$i]->thumbnail }}') no-repeat center; background-size: cover">
        <div class="container-fluid text-left">
        <h1 class="m-0">{{ $blogs[$i]->title }}</h1>
        </div>
        </div>
    @else
        <div class="jumbotron jumbotron-fluid
        text-dark m-0" style="background: linear-gradient(to right, rgba(0, 0, 0, 0) 50%, rgb(0, 0, 0) 70%),
        url('{{ $blogs[$i]->thumbnail }}') no-repeat center;  background-size: cover">
        <div class="container-fluid text-right">
        <h1 class="m-0">{{ $blogs[$i]->title }}</h1>
        </div>
        </div> @endif
    @endfor
    <div class="container-fluid">
        {{-- <div class="row justify-content-center">
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
    </div> --}}
        asd
    </div>
@endsection
