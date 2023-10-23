<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKamarRequest;
use App\Http\Requests\UpdateKamarRequest;
use App\Models\Kamar;
use App\Models\Plasma;

class KamarController extends Controller
{
    public function index()
    {
        $plasma = Plasma::all();
        $data = Plasma::with('kamar')->get();
        return view('monitoring/data_kamar', ['data' => $data, 'plasma' => $plasma]);
    }


    public function store(StoreKamarRequest $request)
    {
        $validator = $request->validated();
        Kamar::create($validator);
        return redirect()->back()->with('success', '');
    }

    public function update(UpdateKamarRequest $request, $id)
    {
        $validator = $request->validated();
        $data = Kamar::find($id);
        $data->update($validator);
        return redirect()->back()->with('successedit','');
    }

    public function destroy($id)
    {
    }
}
