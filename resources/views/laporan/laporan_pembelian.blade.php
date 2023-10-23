@extends('layouts.template')
@section('content')
    

<div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Laporan Pembelian</h4>
  
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Pembelian</li>
          </ol>
        </nav>
      </div>
    </div>
        
  </div>

    <div class="card">
        <div class="card-body">
            <h5 class="py-3 mb-4 fw-normal" style="color: #228896">Laporan Pembelian Domba</h5>
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #228896; color: white;">Mulai
                                    Tanggal</span>
                            </div>
                            <input type="date" class="form-control" style="border-color: #A2A9AA;">
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #228896; color: white;">Sampai
                                    Tanggal</span>
                            </div>
                            <input type="date" class="form-control" style="border-color: #A2A9AA;">
                        </div>
                    </fieldset>
                </div>
            </div>
            <button type="submit" class="btn mt-10" style="background-color: #228896; color: white;"><i
                    class="bi bi-printer"></i> Cetak</button>
        </div>
    </div>
@endsection
