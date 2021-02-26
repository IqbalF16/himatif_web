@extends('admin.app')
@section('admin-content')
<h5 class="card-title border-bottom">Blog</h5>
<button class="btn btn-success w-100">Tambah Blog</button>
@for($i = 0; $i<=$count; $i++)
<div class="row my-2">
    <div class="col-9">
        <div class="card">
            <div class="card-body">
                Title {{ $i+1 }}
            </div>
        </div>
    </div>
    <div class="col align-self-center text-center">
        <button type="button" class="btn btn-success icon-control"><i class="fa fa-eye"></i></button>
        <button type="button" class="btn btn-primary icon-control"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger icon-control"><i class="fa fa-trash"></i></button>
    </div>
</div>
@endfor
@endsection