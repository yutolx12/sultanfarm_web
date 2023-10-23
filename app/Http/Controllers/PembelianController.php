<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
use App\Models\Domba;
use App\Models\JenisDomba;
use App\Models\Pembelian;
use App\Models\SupplierModel;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {

        $supplier = SupplierModel::all();
        $jenisdomba = JenisDomba::all();

        return view('transaksi/pembelian', ['supplier' => $supplier, 'jenisdomba' => $jenisdomba]);
    }

    public function store(Request $request)
    {
        $totalHargaBeli = 0;
        $listItem = json_decode($request->input('list_item'), true);
        foreach ($listItem as $item) {
            $domba = new Domba();
            $domba->gambar = $item['gambar'];
            $domba->id_jenis = $item['id_jenis'];
            $domba->tipe_domba = $item['tipe_domba'];
            $domba->jenis_kelamin = $item['jenis_kelamin'];
            $domba->tgl_lahir = $item['tgl_lahir'];
            $domba->bobot = $item['bobot'];
            $domba->harga_beli = $item['harga_beli'];
            $domba->harga_jual = $item['harga_jual'];
            $domba->keterangan = $item['keterangan'];
            $domba->save();

            $totalHargaBeli += $item['harga_beli'];
        }
        $panjangListItem = count($listItem);
        $parseValue = intval($totalHargaBeli);

        $DataDomba = Domba::latest()->limit($panjangListItem)->get();
        $pembelian = new Pembelian();
        $pembelian->fill([
            'id_user' => $request->get('id_user'),
            'id_supplier' => $request->get('id_supplier'),
            'tgl_pembelian' => $request->get('tgl_pembelian'),
            'total' => $parseValue,
        ]);
        $pembelian->save();

        $id_pembelian_terakshir = Pembelian::latest()->first();

        foreach ($DataDomba as $data) {
            $simpanDetail = new DetailPembelian();
            $simpanDetail->id_pembelian = $id_pembelian_terakshir->id;
            $simpanDetail->id_domba = $data->id;
            $simpanDetail->save();
        }

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function report()
    {
        return view('laporan/laporan_pembelian');
    }

    public function history()
    {
        $data = Pembelian::with('detailPembelians', 'dombas')->get();

        return view('transaksi/history_pembelian', compact('data'));
    }
}
