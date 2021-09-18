@extends('admin.app')
@section('admin-content')
    <h5 class="card-title border-bottom">Presensi</h5>
    <a class="btn btn-success w-100 col" data-toggle="modal" data-target="#addPresensiModal">Tambah Presensi</a>
    <table class="table table-sm table-bordered">
        <col style="width: 60%;">
        <col>
        <col>
        <col>
        <tbody>
            @foreach ($presensi as $id => $p )
                <tr id="presensi{{ $p->id }}">
                    <td scope="row" class="align-middle">
                        <a href="{{ route('viewPresensi', $p->link) }}" target="_blank" class="btn w-100 text-left">
                            {{ Str::length($p->title) >= 75 ? substr($p->title, 0, 75) . '...' : substr($p->title, 0, 75) }}
                        </a>
                    </td>
                    <td class="align-middle">
                        {{ $datetime[$id] }}
                    </td>
                    <td class="align-middle"><button name="copy" id="copy"
                            data-clipboard-text="{{ $request->server('HTTP_HOST') . '/presensi/' . $p->link }}"
                            class="btn btn-light col h-100 copy" role="button"><i class="fa fa-clipboard" aria-hidden="true"
                                onclick="copy({{ $request->server('HTTP_HOST') . '/presensi/' . $p->link }})"></i></button>
                    </td>
                    <td class="align-middle"><a name="delete" id="delete" class="btn btn-danger col"
                            href="{{ route('deletePresensi', $p->link) }}" role="button"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Presensi Modal -->
    <div class="modal fade" id="addPresensiModal" tabindex="-1" role="dialog" aria-labelledby="addPresensiModalTitle"
        aria-hidden="true">
        <form id="new-presensi" name="new-presensi" action="{{ route('addPresensi') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Presensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                                placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId"
                                placeholder="...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-submit" id="new-form">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="{{ asset('js/presensi.js') }}"></script>
@endsection
