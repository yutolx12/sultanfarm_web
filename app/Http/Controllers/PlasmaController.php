<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlasmaRequest;
use App\Models\Plasma;

class PlasmaController extends Controller
{
    public function index()
    {
        $data = Plasma::all();

        return view('monitoring/data_plasma', compact('data'));
    }

    public function store(StorePlasmaRequest $request)
    {
        $validator = $request->validated();
        Plasma::create($validator);

        return redirect()->back()->with('success', '');
    }

    public function update(StorePlasmaRequest $request, $id)
    {
        $validator = $request->validated();
        $data = Plasma::find($id);
        $data->update($validator);

        return redirect()->back()->with('successedit', '');
    }

    public function destroy(Plasma $plasma, $id)
    {
        $plasma->destroy($id);

        return redirect()->back()->with('successhapus', '');
    }
}
