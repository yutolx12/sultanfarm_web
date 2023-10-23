<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MobileUpdateCostumerController extends Controller
{
    public function updateCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'nama_customer' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $namaCustomer = $request->input('nama_customer');
        $alamat = $request->input('alamat');
        $noTelp = $request->input('no_telp');

        $customer = DB::table('customers')->where('email', $email)->first();

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        if (!Hash::check($password, $customer->password)) {
            // Password tidak cocok
            return response()->json(['error' => 'Password salah'], 400);
        }

        // Password cocok, lakukan pembaruan data
        DB::table('customers')->where('email', $email)->update([
            'nama_customer' => $namaCustomer,
            'alamat' => $alamat,
            'no_telp' => $noTelp,
        ]);

        $customer = customer::where('email', $request->email)->first();

        return response()->json([
            'id' => $customer->id,
            'nama_customer' => $customer->nama_customer,
            'no_telp' => $customer->no_telp,
            'alamat' => $customer->alamat,
            'email' => $customer->email,
            'jenis_kelamin' => $customer->jenis_kelamin,
        ]);
    }
}
