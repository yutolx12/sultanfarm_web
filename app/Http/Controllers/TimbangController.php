<?php

namespace App\Http\Controllers;

use App\Http\Requests\BobotRequest;
use App\Models\Domba;
use App\Models\Timbang;
use Illuminate\Http\Request;

class TimbangController extends Controller
{
    public function index()
    {
        return view('fitur_lainnya/timbang');
    }

    public function history()
    {
        $data = Domba::with('jenis')->get();

        return view('fitur_lainnya/history_timbang', compact('data'));
    }

    public function update(BobotRequest $request, $id)
    {
        $validator = $request->validated();
        $data = Domba::find($id);
        $data->update($validator);

        return redirect()->back()->with('success', '');
    }

    public function ajax(Request $request)
    {

        $kode = $request->kode_domba;
        $results = Domba::with('jenis')->where('kode_domba', 'like', '%'.$kode.'%')->where('status', '!=', 'Mati')->get();
        $c = count($results);
        if ($c == 0) {
            return '<p class="text-muted">Maaf, Data tidak ditemukan</p>';
        } else {
            return view('fitur_lainnya/ajaxpagetimbang')->with([
                'data' => $results,
            ]);
        }
    }

    public function ajaxhistory(Request $request)
    {

        $kode = $request->kode_domba;
        $results = Timbang::where('kode_domba', 'like', '%'.$kode.'%')->get();
        $c = count($results);
        if ($c == 0) {
            return '<p class="text-muted">Maaf, Data tidak ditemukan</p>';
        } else {
            return view('fitur_lainnya/ajax_riwayat_timbang')->with([
                'data' => $results,
            ]);
        }
    }

    public function read()
    {
        return 'Silahkan Melakukan Pencarian Data';
    }

    public function destroy(Request $request, $id)
    {
        //
    }
}
