@extends('admin.app')
@section('admin-content')
    <h5 class="card-title border-bottom">Blog</h5>
    <a class="btn btn-success w-100" href="{{ route('writeBlog') }}">Tambah Blog</a>
    <table class="table table-sm table-bordered">
        {{-- <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead> --}}
        <col style="width: 80%;">
        <col>
        <col>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td scope="row" class="align-middle">{{ (Str::length($blog->title) >= 75) ? substr($blog->title,0, 75)."..." : substr($blog->title,0, 75) }}</td>
                    <td class="align-middle"><a name="edit" id="edit" class="btn btn-primary col h-100" href="#"
                            role="button"><i class="fa fa-edit"></i></a></td>
                    <td class="align-middle"><a name="delete" id="delete" class="btn btn-danger col" href="#"
                            role="button"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
