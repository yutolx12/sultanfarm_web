@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="script.js"></script>


<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Landing Page</h4>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Landing Page</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" aria-current="page"
            href="@if (Auth::user()->role == 'pemilik') {{ route('landingpage') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.landingpage') }} @endif">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active"
            href="@if (Auth::user()->role == 'pemilik') {{ route('tentangkami') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.tentangkami') }} @endif">Tentang
            Kami</a>
    </li>
    <li class="nav-item">
        <a class="nav-link"
            href="@if (Auth::user()->role == 'pemilik') {{ route('sosialmedia') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.sosialmedia') }} @endif">Sosial
            Media</a>
    </li>
    <li class="nav-item">
        <a class="nav-link "
            href="@if (Auth::user()->role == 'pemilik') {{ route('slider') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.slider') }} @endif">Footer</a>
    </li>
    <li class="nav-item">
        <a class="nav-link "
            href="@if (Auth::user()->role == 'pemilik') {{ route('footer') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.footer') }} @endif">Footer</a>
    </li>
</ul>
@foreach ($landingpage as $value)
<form action="{{ url('admin/home/pengaturan/update/tentangkami/' . $value->id) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Tentang Kami</p>
            <hr class="hr hr-blurry" />
            <div class="container">
                <div class="col">
                    <p class="text-lg-start" style="color: #4E5B5C">Deskripsi Tentang Kami</p>
                    <input name='deskripsi_tentangkami' type="text" class="form-control"
                        value="{{ $value->deskripsi_tentangkami }}" placeholder="Isi Deskripsi Tentang Kami"
                        id="example-text-input">
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn"
                            style="background-color: #228896; color: white;">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection