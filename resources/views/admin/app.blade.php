@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <ul class="nav flex-column nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/summary">Summary</a>
                    </li>
                    <li class="nav-link" class="nav-item">
                        <a href="/admin/blog">Blog</a>
                    </li>
                    <li class="nav-link" class="nav-item">
                        <a href="/admin/event">Event</a>
                    </li>
                    <li class="nav-link" class="nav-item">
                        <a href="/admin/form">Form</a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="adminTabContent">
                    <h5 class="card-title border-bottom">Summary</h5>
                        @yield('admin-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection