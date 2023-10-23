<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataKameraRequest;
use App\Http\Requests\UpdateDataKameraRequest;
use App\Models\DataKamera;

class DataKameraController extends Controller
{
    public function index()
    {
        return view('monitoring/data_kamera');
    }

    public function store(StoreDataKameraRequest $request)
    {
        //
    }

    public function update(UpdateDataKameraRequest $request, DataKamera $dataKamera)
    {
        //
    }

    public function destroy(DataKamera $dataKamera)
    {
        //
    }
}
