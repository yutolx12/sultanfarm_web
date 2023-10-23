<?php

use App\Http\Controllers\Api\MobileCustomerController;
use App\Http\Controllers\Api\MobileDombaController;
use App\Http\Controllers\Api\MobileRiwayatController;
use App\Http\Controllers\Api\MobileTransaksiController;
use App\Http\Controllers\Api\UpdatePasswordController;
use App\Http\Controllers\Api\MobileUpdateCostumerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::patch('/update_customer/{id}', [CustomerController::class, 'update']);
    Route::patch('/update_customer/{email}', [MobileUpdateCostumerController::class, 'update']);
});

Route::post('/login_customer', [MobileCustomerController::class, 'login']);
Route::post('/register_customer', [MobileCustomerController::class, 'store']);
Route::post('/check_email', [MobileCustomerController::class, 'checkEmail']);

Route::post('/domba_breeding', [MobileDombaController::class, 'domba_breeding']);
Route::post('/domba_saya', [MobileDombaController::class, 'domba_saya']);
Route::get('/domba_trading_tersedia', [MobileDombaController::class, 'domba_trading_tersedia']);
Route::get('/domba_breeding_tersedia', [MobileDombaController::class, 'domba_breeding_tersedia']);
Route::get('/paket_breeding', [MobileDombaController::class, 'paket_breeding']);

Route::post('/kamar_transaksi', [MobileTransaksiController::class, 'kamar_transaksi']);
Route::post('/transaksi', [MobileTransaksiController::class, 'transaksi']);
Route::post('/update_kamar_tidak_tersedia', [MobileTransaksiController::class, 'update_kamar_tidak_tersedia']);
Route::post('/update_kamar_tersedia', [MobileTransaksiController::class, 'update_kamar_tersedia']);
Route::post('/update_kamar', [MobileTransaksiController::class, 'update_kamar ']);
Route::post('/updatePassword', [UpdatePasswordController::class, 'updatePassword']);

Route::post('/riwayat_diajukan', [MobileRiwayatController::class, 'riwayat_diajukan']);
Route::post('/riwayat_diproses', [MobileRiwayatController::class, 'riwayat_diproses']);
Route::post('/riwayat_selesai', [MobileRiwayatController::class, 'riwayat_selesai']);
Route::post('/riwayat_ditolak', [MobileRiwayatController::class, 'riwayat_ditolak']);

Route::post('/updateCustomer', [MobileUpdateCostumerController::class, 'updateCustomer']);
