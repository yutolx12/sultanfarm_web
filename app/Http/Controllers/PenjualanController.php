<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\DetailPenjualan;
use App\Models\Domba;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $domba = Domba::with('jenis')->where('status', 'Tersedia')->get();
        $customer = customer::all();

        return view('transaksi/penjualan', ['domba' => $domba, 'customer' => $customer]);
    }

    public function store(Request $request)
    {
        $data = [
            'id_user' => $request->input('id_user'),
            'id_customer' => $request->input('id_customer'),
            'status' => 'selesai',
        ];

        Penjualan::create($data);

        $id_penjualan_terakshir = Penjualan::latest()->first();

        $listItem = json_decode($request->input('list_item'), true);
        foreach ($listItem as $item) {
            $simpanDetail = new DetailPenjualan();
            $simpanDetail->fill([
                $simpanDetail->id_penjualan = $id_penjualan_terakshir->id,
                $simpanDetail->id_domba = $item['id_domba'],
            ]);
            $simpanDetail->save();
        }

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function report()
    {
        return view('laporan/laporan_penjualan');
    }

    public function history()
    {
        return view('transaksi/history_penjualan');
    }

    public function antrian()
    {
        return view('transaksi/antrian');
    }
}
