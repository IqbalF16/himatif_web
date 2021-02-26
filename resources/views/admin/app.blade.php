@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <ul class="nav flex-column nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/summary') ? ' active' : '' }}" href="/admin/summary">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/blog') ? ' active' : '' }}" href="/admin/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/event') ? ' active' : '' }}" href="/admin/event">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/form') ? ' active' : '' }}" href="/admin/form">Form</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="adminTabContent">
                        @yield('admin-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection