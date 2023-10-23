<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BreedingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DataKameraController;
use App\Http\Controllers\DataPaketController;
use App\Http\Controllers\DombaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisDombaController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LogAktivitasController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MonitoringDombaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PlasmaController;
use App\Http\Controllers\TimbangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SqanQRController;

Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/detail_landing', 'detail');
    Route::get('/lihat_semua_domba', 'all');
});

Auth::routes();

Route::middleware(['auth'])->prefix('/home')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::controller(DombaController::class)->prefix('/domba')->group(function () {
        Route::get('', 'index')->name('admin.domba');
        Route::post('store', 'store')->name('admin.dombastore');
        Route::post('update/{id}', 'update');
        Route::post('updateimage/{id}', 'updateimage');
        Route::delete('delete/{id}', 'destroy');
    });

    Route::controller(CustomerController::class)->prefix('/customer')->group(function () {
        Route::get('', 'index')->name('admin.customer');
        Route::post('store', 'store')->name('admincustomer.store');
        Route::post('update/{id}', 'update');
        Route::get('destroy/{id}', 'destroy');
    });

    Route::controller(SupplierController::class)->prefix('/supplier')->group(function () {
        Route::get('', 'index')->name('admin.supplier');
        Route::post('store', 'store')->name('adminsupplier.store');
        Route::patch('/update/{id}', 'update');
        Route::get('delete', 'destroy');
    });

    Route::controller(SqanQRController::class)->prefix('/scanQr')->group(function () {
        Route::get('', 'index')->name('admin.scanqr');
    });

    Route::controller(PenjualanController::class)->prefix('/transaksi/penjualan')->group(function () {
        Route::get('', 'index')->name('admin.penjualan');
        Route::get('/report', 'index')->name('laporan_penjualan');
        Route::post('store', 'store');
        Route::get('history', 'history')->name('historypenjualan');
        Route::get('antrian', 'antrian')->name('antrian');
    });

    Route::controller(PembelianController::class)->prefix('/transaksi/pembelian')->group(function () {
        Route::get('', 'index')->name('admin.pembelian');
        Route::post('store', 'store');
        Route::get('report', 'report')->name('laporan_pembelian');
        Route::get('history', 'history')->name('historypembelian');
    });

    Route::controller(KelahiranController::class)->prefix('/kelahiran')->group(function () {
        Route::get('', 'index')->name('admin.kelahiran');
        Route::post('store', 'store')->name('kelahiran.store');
        Route::get('history', 'history')->name('historykelahiran');
    });

    Route::controller(KematianController::class)->prefix('/kematian')->group(function () {
        Route::get('', 'index')->name('admin.kematian');
        Route::get('/ajax', 'ajax');
        Route::get('/read', 'read');
        Route::post('/update/{id}', 'update');
        Route::get('history', 'history')->name('historykematian');
    });

    Route::controller(TimbangController::class)->prefix('/timbang')->group(function () {
        Route::get('', 'index')->name('admin.timbang');
        Route::get('/ajax', 'ajax');
        Route::get('/ajaxhistory', 'ajaxhistory');
        Route::get('/read', 'read');
        Route::post('/update/{id}', 'update');
        Route::get('history', 'history')->name('historytimbang');
    });

    Route::controller(LandingController::class)->prefix('/pengaturan')->group(function () {
        Route::get('/slider', 'slider')->name('admin.slider');
        Route::get('/galery', 'galery')->name('galery');
        Route::get('/landingpage', 'landingpage')->name('admin.landingpage');
        Route::get('/tentangkami', 'tentangkami')->name('admin.tentangkami');
        Route::get('/sosialmedia', 'sosialmedia')->name('admin.sosialmedia');
        Route::get('/footer', 'footer')->name('admin.footer');
        Route::post('/update/landingpage/{id}', 'UpdateLandingpage');
        Route::post('/update/tentangkami/{id}', 'Updatetentangkami');
        Route::post('/update/sosialmedia/{id}', 'Updatesosialmedia');
        Route::post('/update/footer/{id}', 'Updatefooter');
        Route::post('store', 'store')->name('galery.store');
        Route::post('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy')->name('galery.destroy');
    });
});

Route::middleware(['auth', 'is_admin'])->prefix('/admin/home')->group(function () {

    Route::get('', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::controller(JenisDombaController::class)->prefix('/jenisdomba')->group(function () {
        Route::get('', 'index')->name('jenisdomba');
        Route::post('store', 'store')->name('jenisdomba.store');
        Route::post('/update/{id}', 'update');
        Route::patch('/updateimage/{id}', 'updateimage');
        Route::delete('delete', 'destroy')->name('jenisdomba.delete');
    });

    Route::controller(DombaController::class)->prefix('/domba')->group(function () {
        Route::get('', 'index')->name('domba');
        Route::post('store', 'store')->name('domba.store');
        Route::post('update/{id}', 'update');
        Route::post('updateimage/{id}', 'updateimage');
        Route::delete('delete/{id}', 'destroy');
    });

    Route::controller(CustomerController::class)->prefix('/customer')->group(function () {
        Route::get('', 'index')->name('customer');
        Route::post('store', 'store')->name('customer.store');
        Route::post('update/{id}', 'update');
        Route::get('destroy/{id}', 'destroy');
    });

    Route::controller(PegawaiController::class)->prefix('/pegawai')->group(function () {
        Route::get('', 'index')->name('pegawai');
        Route::get('input', 'input')->name('pegawai.input');
        Route::post('store', 'store')->name('pegawai.store');
        Route::post('/update/{id}', 'update');
        Route::get('delete/{id}', 'destroy');
    });

    Route::controller(SupplierController::class)->prefix('/supplier')->group(function () {
        Route::get('', 'index')->name('supplier');
        Route::post('store', 'store')->name('supplier.store');
        Route::post('/update/{id}', 'update');
        Route::get('/delete/{id}', 'destroy');
    });

    Route::controller(ValidasiDombaController::class)->prefix('/validasi')->group(function () {
        Route::get('', 'index')->name('validasi');
    });

    Route::controller(BreedingController::class)->prefix('/breeding')->group(function () {
        Route::get('', 'index')->name('paketbreading');
        Route::post('store', 'store');
        Route::post('/update/{id}', 'update');
        Route::post('updateimage/{id}', 'updateimage');
        Route::get('/delete/{id}', 'destroy');
    });

    Route::controller(DataPaketController::class)->prefix('/data_paket')->group(function () {
        Route::get('', 'index')->name('data_paket');
        Route::post('store', 'store')->name('paket.store');
        Route::post('/update/{id}', 'update');
        Route::get('/delete/{id}', 'destroy');
    });

    Route::controller(SqanQRController::class)->prefix('/scanQr')->group(function () {
        Route::get('', 'index')->name('scanqr');
    });

    Route::controller(DataKameraController::class)->prefix('/data_kamera')->group(function () {
        Route::get('', 'index')->name('data_kamera');
    });

    Route::controller(PlasmaController::class)->prefix('/data_plasma')->group(function () {
        Route::get('', 'index')->name('data_plasma');
        Route::post('store', 'store');
        Route::post('/update/{id}', 'update');
        Route::get('/delete/{id}', 'destroy');
    });

    Route::controller(KamarController::class)->prefix('/data_kamar')->group(function () {
        Route::get('', 'index')->name('data_kamar');
        Route::post('store', 'store')->name('kamar.store');
        Route::post('update/{id}', 'update');
        Route::delete('delete', 'destroy');
    });

    Route::controller(MonitoringDombaController::class)->prefix('/monitoring')->group(function () {
        Route::get('', 'index')->name('monitoring_domba');
    });

    Route::controller(MonitorController::class)->prefix('/monitor')->group(function () {
        Route::get('', 'index')->name('monitor');
    });

    Route::controller(PenjualanController::class)->prefix('/transaksi/penjualan')->group(function () {
        Route::get('', 'index')->name('penjualan');
        Route::get('/report', 'index')->name('laporan_penjualan');
        Route::post('store', 'store');
        Route::get('history', 'history')->name('historypenjualan');
        Route::get('antrian', 'antrian')->name('antrian');
    });

    Route::controller(PembelianController::class)->prefix('/transaksi/pembelian')->group(function () {
        Route::get('', 'index')->name('pembelian');
        Route::post('store', 'store');
        Route::get('report', 'report')->name('laporan_pembelian');
        Route::get('history', 'history')->name('historypembelian');
    });

    Route::controller(TransaksiBredingController::class)->prefix('/transaksi/breeding')->group(function () {
        Route::get('', 'index')->name('breeding');
    });

    Route::controller(KelahiranController::class)->prefix('/kelahiran')->group(function () {
        Route::get('', 'index')->name('kelahiran');
        Route::post('store', 'store')->name('kelahiran.store');
        Route::get('history', 'history')->name('historykelahiran');
    });

    Route::controller(KematianController::class)->prefix('/kematian')->group(function () {
        Route::get('', 'index')->name('kematian');
        Route::get('/ajax', 'ajax');
        Route::get('/read', 'read');
        Route::post('/update/{id}', 'update');
        Route::get('history', 'history')->name('historykematian');
    });

    Route::controller(TimbangController::class)->prefix('/timbang')->group(function () {
        Route::get('', 'index')->name('timbang');
        Route::get('/ajax', 'ajax');
        Route::get('/ajaxhistory', 'ajaxhistory');
        Route::get('/read', 'read');
        Route::post('/update/{id}', 'update');
        Route::get('history', 'history')->name('historytimbang');
    });

    Route::controller(LogAktivitasController::class)->prefix('/log_aktivitas')->group(function () {
        Route::get('', 'index')->name('log_aktivitas');
    });

    Route::controller(LandingController::class)->prefix('/pengaturan')->group(function () {
        Route::get('/slider', 'slider')->name('slider');
        Route::get('/landingpage', 'landingpage')->name('landingpage');
        Route::get('/tentangkami', 'tentangkami')->name('tentangkami');
        Route::get('/sosialmedia', 'sosialmedia')->name('sosialmedia');
        Route::get('/footer', 'footer')->name('footer');
        Route::post('/update/landingpage/{id}', 'UpdateLandingpage');
        Route::post('/update/tentangkami/{id}', 'Updatetentangkami');
        Route::post('/update/sosialmedia/{id}', 'Updatesosialmedia');
        Route::post('/update/footer/{id}', 'Updatefooter');
        Route::post('/updateimage/{id}', 'updateimage');
        Route::post('/update/{id}', 'update');
    });
});
