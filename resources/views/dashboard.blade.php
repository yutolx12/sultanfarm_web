@extends('layouts.template')
@section('content')
<div class="page-content">
    @if (session('success'))
    <div class="alert alert-success" id="alert" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" id="alert" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <script>
        // Ambil elemen dengan ID 'alert'
    const alert = document.getElementById('alert');
    
    // Cek apakah elemen alert ada
    if (alert) {
        // Sembunyikan pesan error setelah 5 detik (5000 milidetik)
        setTimeout(() => {
            alert.style.display = 'none';
        }, 2000); // 5000 milidetik = 5 detik
    }
    
    </script>

    <h4 class="fw-bold py-3 "><span class="text-muted fw-light" style="text-decoration-color: #228896">Dashboard</span>
    </h4>
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon mb-2" style="background-color:#599FAA;">
                                        <i class="bi bi-clipboard-data d-flex justify-content-center mb-2"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Domba Tersedia </h6>
                                    <h6 class="font-extrabold mb-0">00 Ekor</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon mb-2" style="background-color:#7195F5;">
                                        <i class="bi bi-calculator d-flex justify-content-center mb-2"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pembelian Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0">00 Ekor</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon mb-2" style="background-color:#FEC100;">
                                        <i class="bi bi-calculator d-flex justify-content-center mb-2"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Penjualan Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0">00 Ekor</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi bi-clipboard-data d-flex justify-content-center mb-2"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelahiran Domba</h6>
                                    <h6 class="font-extrabold mb-0">00 Ekor</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Penjualan Bulanan (Tahun 2023)</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-muted font-semibold">Rata - Rata Penjualan Bulanan</h6>
                    <h6>00 Ekor</h6>
                    <h6 class="text-muted font-semibold">Penjualan Domba Jantan / Bulan</h6>
                    <h6>00 Ekor</h6>
                    <h6 class="text-muted font-semibold">Penjualan Domba Betina / Bulan</h6>
                    <h6>00 Ekor</h6>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection