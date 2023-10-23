<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiBredingRequest;
use App\Http\Requests\UpdateTransaksiBredingRequest;
use App\Models\TransaksiBreding;

class TransaksiBredingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaksi/breeding');
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
    public function store(StoreTransaksiBredingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiBreding $transaksiBreding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiBreding $transaksiBreding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiBredingRequest $request, TransaksiBreding $transaksiBreding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiBreding $transaksiBreding)
    {
        //
    }
}
