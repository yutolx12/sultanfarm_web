<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataPaketRequest;
use App\Http\Requests\UpdateDataPaketRequest;
use App\Models\DataPaket;

class DataPaketController extends Controller
{
    public function index()
    {
        $data = DataPaket::all();

        return view('domba/data_paket', compact('data'));
    }

    public function store(StoreDataPaketRequest $request)
    {
        $validator = $request->validated();
        DataPaket::create($validator);
        return redirect()->back()->with('success', '');
    }

    public function update(StoreDataPaketRequest $request, $id)
    {
        $validator = $request->validated();
        $data = DataPaket::find($id);
        $data->update($validator);
        return redirect()->back()->with('successupdate', '');
    }

    public function destroy($id)
    {
        DataPaket::destroy($id);
        return redirect()->back()->with('successhapus','');
    }
}
