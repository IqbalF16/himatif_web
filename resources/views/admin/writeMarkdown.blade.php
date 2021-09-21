@extends('layouts.adminMarkdown')
@section('content')
    <div class="container">
        <label for="thumbnail">Thumbnail: </label>
        <input type="text" name="thumbnail" id="thumbnail" placeholder="Link to Image" required>
        <img src="{{ asset('storage/images/preview.png') }}" width="auto" height="50vh" id="thumbnail-preview" required>
        @if ($errors->has('thumbnail'))
            <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
        @endif
        <textarea class="form-control" name="markdown" id="markdown" rows="3"></textarea>
        @if ($errors->has('markdown'))
            <span class="text-danger">{{ $errors->first('markdown') }}</span>
        @endif
    </div>
    <script src="{{ asset('js/editor.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@endsection
