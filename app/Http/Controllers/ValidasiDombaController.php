<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValidasiDombaRequest;
use App\Http\Requests\UpdateValidasiDombaRequest;
use App\Models\ValidasiDomba;

class ValidasiDombaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domba/validasi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreValidasiDombaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ValidasiDomba $validasiDomba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ValidasiDomba $validasiDomba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateValidasiDombaRequest $request, ValidasiDomba $validasiDomba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ValidasiDomba $validasiDomba)
    {
        //
    }
}
