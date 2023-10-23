<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaketBreedingRequest;
use App\Http\Requests\UpdatePaketBreedingRequest;
use App\Models\PaketBreeding;

class PaketBreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domba/paketbreading');
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
    public function store(StorePaketBreedingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketBreeding $paketBreeding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketBreeding $paketBreeding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaketBreedingRequest $request, PaketBreeding $paketBreeding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketBreeding $paketBreeding)
    {
        //
    }
}
