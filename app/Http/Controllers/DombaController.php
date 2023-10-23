<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDombaRequest;
use App\Http\Requests\UpdateDombaRequest;
use App\Models\Domba;
use App\Models\JenisDomba;
use App\Models\Kamar;
use Illuminate\Http\Request;

class DombaController extends Controller
{
    public function index()
    {
        $kamar = Kamar::with('plasma')->get();
        $data = Domba::with('jenis')->get();
        $jenisdomba = JenisDomba::all();
        $list = Domba::paginate(1);

        return view('domba/datadomba', ['data' => $data, 'jenisdomba' => $jenisdomba, 'list' => $list, 'kamar' => $kamar]);
    }

    public function store(StoreDombaRequest $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('images'), $imageName);
        $validated['gambar'] = $imageName;
        Domba::create($validated);

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(UpdateDombaRequest $request, Domba $domba, $id)
    {
        $validate = $request->validated();
        $data = Domba::fid($id);
        $data->update($validate);

        return redirect()->back()->with('success', 'Data Berhasil Update');
    }

    public function updateimage(Request $request, $id)
    {
        try {
            request()->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->gambar->getClientOriginalExtension();
            request()->gambar->move(public_path('images'), $imageName);
            $data = Domba::find($id);
            $data->update([
                'gambar' => $imageName,
            ]);

            return redirect()->back()->with('success', 'Gambar Berhasil di Update');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal ditambahkan');
        }
    }

    public function destroy(Domba $domba, $id)
    {
        Domba::destroy($id);

        return redirect()->back()->with('successhapus', 'Data Berhasil Dihapus');
    }
}
