@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach($blogs as $blog)
        <div class="card">
            <img class="card-img-top" src="{{ $blog->thumbnile }}" alt="Card image" style="width:100%">
            <div class="card-body">
                <h4 class="card-title">{{ $blog->title }}</h4>
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                <a href="#" class="btn btn-primary stretched-link">See Profile</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
