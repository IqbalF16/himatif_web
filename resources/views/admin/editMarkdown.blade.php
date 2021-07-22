@extends('layouts.adminMarkdown')
@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <script>
                document.getElementById('title').value = "<?php print $post->title; ?>";
            </script>
            <label for="thumbnail">Thumbnail: </label>
            <input type="text" name="thumbnail" id="thumbnail" placeholder="Link to Image" value="{{ $post->thumbnail }}"
                required>
            <img src="{{ asset('storage/images/preview.png') }}" width="auto" height="50vh" id="thumbnail-preview"
                required>
            @if ($errors->has('thumbnail'))
                <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
            @endif
            <textarea class="form-control" name="markdown" id="markdown" rows="3">{{ $post->markdown }}</textarea>
            @if ($errors->has('markdown'))
                <span class="text-danger">{{ $errors->first('markdown') }}</span>
            @endif
        @endforeach
    </div>
@endsection
