@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-columns">
            @foreach ($events as $event)
                <div class="card">
                    <div class="card-img-top thumbnail" src="" alt="Card image"
                        style="background-image: url({{ $event->thumbnail }})"></div>
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ Str::length($event->title) >= 75 ? substr($event->title, 0, 75) . '...' : substr($event->title, 0, 30) }}
                        </h4>
                        <a href="{{ route('viewEvent', ['route_title' => $event->title_route]) }}"
                            class="btn btn-primary stretched-link" data-toggle="tooltip" title="{{ $event->title }}">See
                            Profile</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
