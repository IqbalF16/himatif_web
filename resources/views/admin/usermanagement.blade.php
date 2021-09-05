@extends('admin.app')
@section('admin-content')
<h5 class="card-title border-bottom">Event</h5>
<a class="btn btn-success w-100" href="{{ route('writeEvent') }}">Tambah Event</a>
<table class="table table-sm table-bordered">
    <col style="width: 80%;">
    <col>
    <col>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td scope="row" class="align-middle">
                    <a href="{{ route('adminUserManagement', ['name' => $user->name]) }}" class="btn w-100 text-left">
                        {{ (Str::length($user->name) >= 75) ? substr($user->name,0, 75)."..." : substr($user->name,0, 75) }}
                    </a>
                </td>

                <td class="align-middle"><a name="edit" id="edit" class="btn btn-primary col h-100" href="{{ route('adminUserManagement', $user->name) }}"
                        role="button"><i class="fa fa-edit"></i></a></td>
                <td class="align-middle"><a name="delete" id="delete" class="btn btn-danger col" href="{{ route('adminUserManagement', $user->name) }}"
                        role="button"><i class="fa fa-trash"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
