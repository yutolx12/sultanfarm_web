<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonitoringDombaRequest;
use App\Http\Requests\UpdateMonitoringDombaRequest;
use App\Models\MonitoringDomba;

class MonitoringDombaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('monitoring/monitoring_domba');
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
    public function store(StoreMonitoringDombaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MonitoringDomba $monitoringDomba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonitoringDomba $monitoringDomba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMonitoringDombaRequest $request, MonitoringDomba $monitoringDomba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonitoringDomba $monitoringDomba)
    {
        //
    }
}
