@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <ul class="nav flex-column nav-tabs" id="adminTab" role='tablist'>
                    <li class="nav-item">
                        <a class="nav-link active" id='summary-tab' data-toggle="tab" href="#summary" role="tab" aria-controls="summary" aria-selected="true">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='blog-tab' data-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="false">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='event-tab' data-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="false">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='form-tab' data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="false">Form</a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="adminTabContent">
                        @include('admin.summary')
                        @include('admin.blog')
                        @include('admin.event')
                        @include('admin.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection