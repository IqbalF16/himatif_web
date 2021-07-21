<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/editor.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @switch(Route::currentRouteName())
            @case('writeBlog')
                <form action="{{ route('addBlog') }}" method="post" name="write" id="write">
            @break
            @case('writeEvent')
                <form action="{{ route('addEvent') }}" method="post" name="write" id="write">
            @break
            @case('writeForm')
                <form action="{{ route('addForm') }}" method="post" name="write" id="write">
            @break
        @endswitch
        @csrf
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="title">
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="title"
                        placeholder="Blog Title" value="New Blog">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary" name="write">Submit</button>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        </form>
    </div>
</body>

</html>
