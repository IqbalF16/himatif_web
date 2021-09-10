@extends('admin.app')
@section('admin-content')
    <h5 class="card-title border-bottom">User Management</h5>
    <form action="{{ route('saveUserManagement') }}" method="post" id="usermanagement" name="usermanagement">
        @csrf
        <button type="submit" class="btn btn-success w-100" id="save" disabled>Save</button>
        <table class="table table-sm table-bordered table-hover">
            <col style="width: 80%;">
            <col>
            <col>
            <thead class="thead-dark text-center">
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @php( $i = 0 )
                @foreach ($users as $user)
                    <tr>
                        {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                        <td scope="row" class="align-middle">
                            <a href="{{ route('adminUserManagement', ['name' => $user->name]) }}"
                                class="btn w-100 text-left">
                                {{ Str::length($user->name) >= 75 ? substr($user->name, 0, 75) . '...' : substr($user->name, 0, 75) }}
                            </a>
                        </td>
                        <td class="align-middle">
                            <select name="{{ $user->name }}" id="{{ $user->name }}">
                                <option value="admin" {{ $user->hasRole('admin') ? ' selected' : '' }}>admin</option>
                                <option value="user" {{ $user->hasRole('user') ? ' selected' : '' }}>user</option>
                            </select>
                        </td>
                        <td class="align-middle"><a name="delete" id="delete" class="btn btn-danger col"
                                href="{{ route('deleteUserManagement', $user->name) }}" role="button"><i
                                    class="fa fa-trash"></i></a></td>
                    </tr>
                    @php( $i++ )
                @endforeach
            </tbody>
        </table>
    </form>
@endsection
