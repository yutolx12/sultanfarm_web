<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\User;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = User::paginate(5);

        return view('pegawai/pegawai', compact('data'));
    }

    public function input()
    {
        return view('pegawai/input-pegawai');
    }

    public function store(StorePegawaiRequest $request)
    {
        $validator = $request->validated();
        User::create($validator);

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(UpdatePegawaiRequest $request, $id)
    {
        $validated = $request->validated();
        $data = User::find($id);
        $data->update($validated);

        return redirect()->back()->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
