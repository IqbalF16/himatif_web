@extends('admin.app')
@section('admin-content')
    <h5 class="card-title border-bottom">Form</h5>
    <a class="btn btn-success w-100" href="{{ route('writeForm') }}">Tambah Form</a>
    <table class="table table-sm table-bordered">
        <col style="width: 70%;">
        <col>
        <col>
        <col>
        <tbody>
            @foreach ($forms as $form)
                <tr>
                    <td scope="row" class="align-middle">
                        <a href="{{ $request->server('HTTP_HOST').'/'.$form->link }}"
                            class="btn w-100 text-left">
                            {{ Str::length($form->title) >= 75 ? substr($form->title, 0, 75) . '...' : substr($form->title, 0, 75) }}
                        </a>
                    </td>
                    <td class="align-middle"><button name="copy" id="copy" onclick="myFunction('{{ $request->server('SERVER_NAME').'/'.$form->link }}')" class="btn btn-light col h-100" role="button"><i
                                class="fa fa-clipboard" aria-hidden="true" onclick="copy({{ $request->server('SERVER_NAME').'/'.$form->link }})"></i></button></td>
                    <td class="align-middle"><a name="edit" id="edit" class="btn btn-primary col h-100"
                            href="{{ route('editBlog', $form->title_route) }}" role="button"><i
                                class="fa fa-edit"></i></a></td>
                    <td class="align-middle"><a name="delete" id="delete" class="btn btn-danger col"
                            href="{{ route('deleteBlog', $form->title_route) }}" role="button"><i
                                class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="{{ asset('js/common.js') }}"></script>
@endsection
