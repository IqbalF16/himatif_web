@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-columns">
            @foreach ($blogs as $blog)
                <div class="card">
                    <div class="card-img-top thumbnail" src="" alt="Card image"
                        style="background-image: url({{ $blog->thumbnail }})"></div>
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ Str::length($blog->title) >= 75 ? substr($blog->title, 0, 75) . '...' : substr($blog->title, 0, 30) }}
                        </h4>
                        <a href="#" class="btn btn-primary stretched-link" data-toggle="tooltip"
                            title="{{ $blog->title }}">See Profile</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
