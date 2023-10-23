<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;
use App\Models\customer;
use Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = customer::paginate(5);

        return view('customer', compact('customers'));
    }

    public function store(StorecustomerRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        Customer::create($validated);

        return redirect()->back()->with('success', '');
    }

    public function update(UpdatecustomerRequest $request, $id)
    {
        $validated = $request->validated();
        $customers = Customer::find($id);
        $validated['password'] = Hash::make($validated['password']);
        $customers->update($validated);

        return redirect()->back()->with('successedit', '');
    }

    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();

        return back()->with('successhapus', 'Data Berhasil Dihapus');
    }
}
