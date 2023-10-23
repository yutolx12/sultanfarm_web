<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domba;
use App\Models\Kamar;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileDombaController extends Controller
{




    public function domba_trading_tersedia(Request $request)
    {
        // Mengambil nilai 'id' dari permintaan
        // $id = $request->input('id');

        // Filter berdasarkan status dan tipe domba
        $dombas = Domba::select('dombas.*')
            // Menggunakan 'status dari permintaan untuk mencari domba yang tersedia
            ->join('jenis_dombas as jenis', 'dombas.id_jenis', '=', 'jenis.id')
            ->where('status', 'Tersedia')
            ->where('tipe_domba', 'Trading')
            ->get();

        return response()->json($dombas);
    }

    public function domba_breeding_tersedia(Request $request)
    {
        // Mengambil nilai 'id' dari permintaan
        // $id = $request->input('id');

        // Filter berdasarkan status dan tipe domba
        $dombas = Domba::select('dombas.*')
            // Menggunakan 'status dari permintaan untuk mencari domba yang tersedia
            ->join('jenis_dombas as jenis', 'dombas.id_jenis', '=', 'jenis.id')
            ->where('status', 'Tersedia')
            ->where('tipe_domba', 'Breeding')
            ->get();

        return response()->json($dombas);
    }

    public function paket_breeding(Request $request)
    {

        $pakets = DB::table('pakets')
            ->select('pakets.*')
            ->get();

        return response()->json($pakets);
    }

    public function domba_breeding(Request $request)
    {
        // Mengambil nilai 'id' dari permintaan
        $id = $request->input('id');

        // Menggunakan metode join untuk menggabungkan tabel
        $dombas = Domba::select('dombas.*')
            ->get();

        return response()->json($dombas);
    }

    public function domba_saya(Request $request)
    {
        // Mengambil nilai 'id' dari permintaan
        $id_customer = $request->input('id_customer');
        // Menggunakan metode join untuk menggabungkan tabel
        $dombas = Domba::select(
            'dombas.id',
            'dombas.kode_domba',
            'dombas.nama_domba',
            'dombas.jenis_kelamin',
            'dombas.bobot',
            'dombas.induk_jantan',
            'dombas.induk_betina',
            'dombas.turunan',
            'dombas.gambar',
            'dombas.keterangan',
            'dombas.harga_beli',
            'dombas.harga_jual',
            'dombas.status',
            'dombas.tgl_lahir',
            'jenis_dombas.jenis_domba',
            'jenis_dombas.kode',
            'jenis_dombas.urutan',
            'kamars.id_plasma',
            'kamars.no_kamar',
            'penjualans.id_customer',
            'penjualans.total',
        )
            ->join('jenis_dombas', 'jenis_dombas.id', '=', 'dombas.id_jenis')
            ->join('kamars', 'kamars.id', '=', 'dombas.id_kamar')
            ->join('penjualans', 'penjualans.id_kamar', '=', 'kamars.id')
            ->join('customers', 'customers.id', '=', 'penjualans.id_customer')
            ->where('dombas.tipe_domba', 'Breeding')
            ->where('dombas.status', 'Terjual')
            ->where('penjualans.id_customer', $id_customer)
            ->get();

        return response()->json($dombas);
    }
}
