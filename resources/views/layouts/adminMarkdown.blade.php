<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="https://himatifumg.com/storage/images/himatif.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    @if (strpos(url()->current(), '/blog/write') || strpos(url()->current(), '/event/write'))
        <script src="{{ asset('js/editor.js') }}" defer></script>
    @endif
    @if (strpos(url()->current(), '/form/write'))
        <script src="{{ asset('js/form-editor.js') }}"></script>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @if (strpos(url()->current(), '/write'))
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
        @elseif (strpos(url()->current(), '/edit'))
            @switch(Route::currentRouteName())
                @case('editBlog')
                    <form action="{{ route('updateBlog') }}" method="post" name="edit" id="edit">
                @break
                @case('editEvent')
                    <form action="{{ route('updateEvent') }}" method="post" name="edit" id="edit">
                @break
                @case('editForm')
                    <form action="{{ route('updateForm') }}" method="post" name="edit" id="edit">
                @break
            @endswitch
            <input type="hidden" name="title_route" id="title_route" value="{{ $posts[0]->title_route }}">
        @endif

        @csrf
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="title row">
                    <label for="title" class="col-3 m-0 align-self-center">
                        {{ strpos(url()->current(), '/blog') ? 'Blog: ' : '' }}
                        {{ strpos(url()->current(), '/event') ? 'Event: ' : '' }}
                        {{ strpos(url()->current(), '/form') ? 'Form: ' : '' }}
                    </label>
                    @if (strpos(url()->current(), '/edit'))
                        <input type="text" class="form-control col" name="title" id="title" aria-describedby="title"
                            placeholder="Post Title" required>
                    @else
                        <input type="text" class="form-control col" name="title" id="title" aria-describedby="title"
                            placeholder="Post Title" value="New Post" required>
                    @endif
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                @if (strpos(url()->current(), '/write'))
                    <button type="submit" class="btn btn-primary" name="write">Submit</button>
                @elseif (strpos(url()->current(), '/edit'))
                    <button type="submit" class="btn btn-primary" name="edit">Submit</button>
                @endif
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        </form>
    </div>
</body>

</html>
