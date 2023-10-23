<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\SupplierModel;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = SupplierModel::paginate(5);

        return view('supplier', compact('suppliers'));
    }

    public function store(StoreSupplierRequest $request)
    {
        $validated = $request->validated();
        SupplierModel::create($validated);

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(UpdateSupplierRequest $request, $id)
    {
        $validated = $request->validated();
        $suppliers = SupplierModel::findOrFail($id);
        $suppliers->update($validated);

        return redirect()->back()->with('successedit', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $suppliers = SupplierModel::findOrFail($id);
        $suppliers->delete();

        return back()->with('successhapus', 'Data Berhasil Dihapus');
    }
}
