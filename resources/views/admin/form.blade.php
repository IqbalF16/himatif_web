@extends('admin.app')
@section('admin-content')
    <h5 class="card-title border-bottom">Form</h5>
    {{-- <div class="row">
        <a id="add-form" href="https://docs.google.com/forms" class="btn btn-primary w-100 col" data-toggle="modal"
            data-target="#addFormModal">Tambah Form <img src="https://img.icons8.com/material-rounded/24/000000/google-logo.png"/></a>
            <a id="add-form" href="admin.typeform.com" class="btn btn-secondary w-100 col" data-toggle="modal"
            data-target="#addFormModal">Tambah Form <img src="https://clipground.com/images/typeform-logo-1.png" alt="" title="" height="24px"></a>
    </div> --}}
    <a class="btn btn-success w-100 col" data-toggle="modal" data-target="#addFormModal">Tambah Form <img
            src="https://img.icons8.com/material-rounded/24/000000/google-logo.png" /></a>
    <table class="table table-sm table-bordered">
        <col style="width: 70%;">
        <col>
        <col>
        <col>
        <tbody>
            @foreach ($forms as $form)
                <tr id="form{{ $form->id }}">
                    <td scope="row" class="align-middle">
                        <a href="{{ '../form/' . $form->link }}" target="_blank" class="btn w-100 text-left">
                            {{ Str::length($form->title) >= 75 ? substr($form->title, 0, 75) . '...' : substr($form->title, 0, 75) }}
                        </a>
                    </td>
                    <td class="align-middle"><button name="copy" id="copy"
                            data-clipboard-text="{{ $request->server('HTTP_HOST') . '/form/' . $form->link }}"
                            class="btn btn-light col h-100 copy" role="button"><i class="fa fa-clipboard" aria-hidden="true"
                                onclick="copy({{ $request->server('HTTP_HOST') . '/form/' . $form->link }})"></i></button>
                    </td>
                    <td class="align-middle"><a name="edit" id="edit" class="btn btn-primary col h-100"
                            href="{{ route('editForm', $form->id) }}" role="button" data-toggle="modal"
                            data-target="#editFormModal{{ $form->id }}"><i class="fa fa-edit"></i></a></td>
                    <td class="align-middle"><a name="delete" id="delete" class="btn btn-danger col"
                            href="{{ route('deleteForm', $form->id) }}" role="button"><i class="fa fa-trash"></i></a></td>
                </tr>

                <!-- Edit Form Modal -->
                <div class="modal fade" id="editFormModal{{ $form->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="editFormModalTitle" aria-hidden="true">
                    <form id="edit-form" name="edit-form" action="{{ route('editForm', $form->id) }}" method="POST">
                        @csrf
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Form</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title_edit">Title</label>
                                        <input type="text" class="form-control" name="title_edit" id="title_edit"
                                            aria-describedby="helpId" placeholder="..." value="{{ $form->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="link_edit">Link</label>
                                        <input type="text" class="form-control" name="link_edit" id="link_edit"
                                            aria-describedby="helpId" placeholder="..." value="{{ $form->link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="iframe_edit">Form Embed HTML: </label>
                                        <input type="text" class="form-control" name="iframe_edit"
                                            id="iframe_edit_{{ $form->id }}" placeholder="..."
                                            value="{{ $form->iframe }}">
                                    </div>
                                    <div id="preview_edit_{{ $form->id }}">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-submit-edit"
                                        name="edit-form">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Add Form Modal -->
    <div class="modal fade" id="addFormModal" tabindex="-1" role="dialog" aria-labelledby="addFormModalTitle"
        aria-hidden="true">
        <form id="new-form" name="new-form" action="{{ route('addForm') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                                <a href="https://docs.google.com/forms" class="btn btn-light border shadow-lg col-md">Google</a>
                                <a href="admin.typeform.com" class="btn btn-light border shadow-lg col-md">Typeform</a>
                        </div>
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
                        <div class="form-group">
                            <label for="iframe">Form Embed HTML: </label>
                            <input type="text" class="form-control" name="iframe" id="iframe" placeholder="...">
                        </div>
                        <div id="preview">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-submit" id="new-form">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="{{ asset('js/form.js') }}"></script>
@endsection
