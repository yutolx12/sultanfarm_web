<?php

namespace App\Http\Controllers;

use App\Models\Domba;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    public function index()
    {

        return view('fitur_lainnya/kematian');

    }

    public function history()
    {
        $data = Domba::with('jenis')->where('dombas.status', 'Mati')->get();

        return view('fitur_lainnya/history_kematian', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required',
        ]);
        $data = Domba::find($id);
        $status = 'Mati';
        $data->update(['keterangan' => $request->keterangan, 'status' => $status]);

        return redirect()->back()->with('success', '');
    }

    public function destroy(Kematian $kematian)
    {

    }

    public function ajax(Request $request)
    {

        $kode = $request->kode_domba;
        $results = Domba::where('kode_domba', 'like', '%'.$kode.'%')->get();
        $c = count($results);
        if ($c == 0) {
            return '<p class="text-muted">Maaf, Data tidak ditemukan</p>';
        } else {
            return view('fitur_lainnya/ajaxpage')->with([
                'data' => $results,
            ]);
        }
    }

    public function read()
    {
        return 'Silahkan Melakukan Pencarian Data';
    }
}
