<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLog_aktivitasRequest;
use App\Http\Requests\UpdateLog_aktivitasRequest;
use App\Models\Log_aktivitas;

class LogAktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('log_aktivitas');
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
    public function store(StoreLog_aktivitasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Log_aktivitas $log_aktivitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log_aktivitas $log_aktivitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLog_aktivitasRequest $request, Log_aktivitas $log_aktivitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log_aktivitas $log_aktivitas)
    {
        //
    }
}
