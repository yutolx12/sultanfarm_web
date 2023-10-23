@extends('layouts.template')
@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Kelahiran</h4>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History Kelahiran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kelahiran') }}">Kelahiran</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('historykelahiran') }}">History
            Kelahiran</a>
    </li>
</ul>
<div class="card">
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Data Kelahiran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <img src="{{ asset('landing/img/image3.png') }}" class="rounded float-left"
                            alt="Responsive image" width="150px">
                    </td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">D1EF2309090001</p>
                        <p class="text-lg-start" style="color: #3B484A">Taxel</p>
                        <p class="text-lg-start" style="color: #3B484A">Bobot 50 Kg <span class="fw-normal"
                                style="padding-left:2px; color: #3B484A">( Jantan )</span></p>
                        <p class="text-lg-start" style="color: #3B484A">Tanggal Lahir 09-09-2023</p>
                        <p class="text-lg-start" style="color: #3B484A">Umur 5 hari</p>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <img src="{{ asset('landing/img/image3.png') }}" class="rounded float-left"
                            alt="Responsive image" width="150px">
                    </td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">D1EF2309090001</p>
                        <p class="text-lg-start" style="color: #3B484A">Taxel</p>
                        <p class="text-lg-start" style="color: #3B484A">Bobot 50 Kg <span class="fw-normal"
                                style="padding-left:2px; color: #3B484A">( Jantan )</span></p>
                        <p class="text-lg-start" style="color: #3B484A">Tanggal Lahir 09-09-2023</p>
                        <p class="text-lg-start" style="color: #3B484A">Umur 5 hari</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection