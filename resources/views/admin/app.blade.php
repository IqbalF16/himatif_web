@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <ul class="nav flex-column nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/dashboard') ? ' active' : '' }}" href="/admin/dashboard">Dasboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/berita') ? ' active' : '' }}" href="/admin/berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/programkerja') ? ' active' : '' }}" href="/admin/programkerja">Program Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/form') ? ' active' : '' }}" href="/admin/form">Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/presensi') ? ' active' : '' }}" href="/admin/presensi">Presensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ strpos(url()->current(), '/admin/usermanagement') ? ' active' : '' }}" href="/admin/usermanagement">User Management</a>
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
