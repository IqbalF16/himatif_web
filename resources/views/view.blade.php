@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($posts as $post)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{ $post->title }}</h1>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <textarea name="raw" id="raw" hidden>{{ $post->markdown }}</textarea>

                            <div id="editor_container" style="display: none;">
                                <textarea id="editable"></textarea>
                            </div>
                            <div id="html_container"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
