@extends('layouts.adminWrite')
@section('content')
    <div class="container">
        <div class="tab text-center d-flex">
            {{-- <a id="showwrite" class="py-2 text-decoration-none bg-success float-left w-50 text-dark rounded-top" onclick="" href="">Write</a>
            <a id="showpreview" class="py-2 text-decoration-none bg-info float-right w-50 text-dark rounded-top" onclick="" href="">Preview</a> --}}
            <div class="list-group list-group-horizontal w-100" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-primary list-group-item-action active" id="list-write-list" data-toggle="list"
                    href="#list-write" role="tab" aria-controls="write">write</a>
                <a class="list-group-item list-group-item-secondary list-group-item-action" id="list-preview-list" data-toggle="list"
                    href="#list-preview" role="tab" aria-controls="preview">preview</a>
            </div>
        </div>
        <div id="text-field" class="bg-white p-3 border h-100 rounded-bottom">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-write" role="tabpanel" aria-labelledby="list-write-list">
                    <div class="md-input">
                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-preview" role="tabpanel" aria-labelledby="list-preview-list">
                    <P>ASDASDADADSDA</P>
                </div>
            </div>
        </div>
    </div>
@endsection
