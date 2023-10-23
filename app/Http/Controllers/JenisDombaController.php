<?php

namespace App\Http\Controllers;

use App\Http\Requests\GambarRequest;
use App\Http\Requests\StoreJenisDombaRequest;
use App\Http\Requests\UpdateJenisDombaRequest;
use App\Models\JenisDomba;
use Illuminate\Http\Request;

class JenisDombaController extends Controller
{
    public function index()
    {
        $data = JenisDomba::paginate(5);

        return view('/domba/jenis-domba', compact('data'));
    }

    public function store(StoreJenisDombaRequest $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('images'), $imageName);
        $validated['gambar'] = $imageName;
        JenisDomba::create($validated);

        return redirect()->route('jenisdomba')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(UpdateJenisDombaRequest $request, $id)
    {
        $validated = $request->safe()->except('gambar');
        $data = JenisDomba::find($id);
        $data->update($validated);

        return redirect()->route('jenisdomba')->with('success', 'Data Berhasil di Update');
    }

    public function updateimage(GambarRequest $request, $id)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('images'), $imageName);
        $validated['gambar'] = $imageName;
        $data = JenisDomba::find($id);
        $data->update($validated);

        return redirect()->back()->with('successedit', '');
    }

    public function destroy(Request $id)
    {
        JenisDomba::destroy($id->id);

        return redirect()->back()->with('successhapus', 'Data Berhasil Dihapus');
    }
}
