<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBreedingRequest;
use App\Http\Requests\UpdateBreedingRequest;
use App\Models\Breeding;
use Illuminate\Http\Request;

class BreedingController extends Controller
{
    public function index()
    {
        $data = Breeding::all();

        return view('domba/paketbreading', compact('data'));
    }

    public function store(StoreBreedingRequest $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('breeding'), $imageName);
        $validated['gambar'] = $imageName;
        Breeding::create($validated);

        return redirect()->back()->with('success', '');

    }

    public function update(UpdateBreedingRequest $request, $id)
    {
        $validate = $request->validated();
        $data = Breeding::find($id);
        $data->update($validate);

        return redirect()->back()->with('successedit', '');
    }

    public function updateimage(Request $request, $id)
    {
        request()->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->gambar->getClientOriginalExtension();
        request()->gambar->move(public_path('breeding'), $imageName);
        $data = Breeding::find($id);
        $data->update([
            'gambar' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Gambar Berhasil di Update');
    }

    public function destroy(Request $breeding, $id)
    {
        $data = Breeding::destroy($id);

        return redirect()->back()->with('successhapus', '');
    }
}
