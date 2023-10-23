<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelahiranRequest;
use App\Http\Requests\UpdateDombaRequest;
use App\Models\Domba;
use App\Models\JenisDomba;
use App\Models\Kamar;

class KelahiranController extends Controller
{
    public function index()
    {
        $kamar = Kamar::with('plasma')->get();
        $data = Domba::with('jenis')->get();
        $jenisdomba = JenisDomba::all();
        $induklk = Domba::where('jenis_kelamin', 'Laki-Laki')->get();
        $indukpr = Domba::where('jenis_kelamin', 'Perempuan')->get();

        return view('fitur_lainnya/kelahiran', ['data' => $data, 'jenisdomba' => $jenisdomba, 'induklk' => $induklk, 'indukpr' => $indukpr, 'kamar' => $kamar]);
    }

    public function history()
    {
        return view('fitur_lainnya/history_kelahiran');
    }

    public function store(StoreKelahiranRequest $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('images'), $imageName);
        $validated['gambar'] = $imageName;
        // dd($validated);
        Domba::create($validated);

        return redirect()->back()->with('success', '');

    }

    public function update(UpdateDombaRequest $request)
    {

    }

    public function destroy(Domba $kelahiran)
    {

    }
}
