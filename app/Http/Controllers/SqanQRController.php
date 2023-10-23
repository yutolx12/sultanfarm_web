<?php

namespace App\Http\Controllers;

use App\Models\SqanQR;
use Illuminate\Http\Request;

class SqanQRController extends Controller
{
    public function index()
    {
        return view('domba/scanQR');
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, SqanQR $sqanQR)
    {

    }

    public function destroy(SqanQR $sqanQR)
    {
        //
    }
}
