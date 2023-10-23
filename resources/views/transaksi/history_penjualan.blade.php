@extends('layouts.template')
@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Penjualan</h4>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route ('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History Penjualan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penjualan') }}">Penjualan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('antrian') }}">Antrian</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('historypenjualan') }}">History Penjualan</a>
    </li>

</ul>

<!--Table-->
<div class="card">
    <div class="card-body">
        <button class="btn float-start" data-bs-toggle="modal" data-bs-target="#modalCetak"
            style="background-color: #228896; color: white"><i class="bi bi-printer"></i> Laporan Penjulan</button>
    </div>
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Data Penjualan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>

                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>

                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>

                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>

                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>

                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">Nama Customer</p>
                        <p class="text-lg-start" style="color: #3B484A">B20230721000001 <span class="fw-normal"
                                style="padding-left:9px; color: #228896"> 21-07-2023 14:46:31</span></p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Pembelian 1 Domba <span
                                class="fw-normal" style="padding-left:5px; color: #228896; weight: 700"> Rp.
                                2.000.000</span></p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="background-color: #228896; color: white"
                            href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- modal cetak --}}
<div class="modal fade" id="modalCetak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Cetak Laporan Penjualan</h5>
            </div>
            <form id="formCetak" method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <div class="col">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Mulai Tanggal</label>
                                <fieldset>
                                    <div class="input">
                                        <input type="date" class="form-control" style="border-color: #E6E1E5;">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Sampai Tanggal</label>
                                <fieldset>
                                    <div class="input">
                                        <input type="date" class="form-control" style="border-color: #E6E1E5;">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #228896; color: white;">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection