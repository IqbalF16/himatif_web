<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
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
                    Form:
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
            <div>
                @if (strpos(url()->current(), '/write'))
                    <button type="submit" class="btn btn-primary" name="write" id="write">Submit</button>
                @elseif (strpos(url()->current(), '/edit'))
                    <button type="submit" class="btn btn-primary" name="edit" id="edit">Submit</button>
                @endif
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div id="formbuilder" class="container"></div>
        <div class="container d-none">
            <input type="text" name="data" id="data" class="w-100" height="500px">
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
        <script src="{{ asset('js/form-editor.js') }}"></script>
    </main>
    </form>
    </div>
</body>

</html>
