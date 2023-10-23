<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdatePasswordController extends Controller
{
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'old_password' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $email = $request->input('email');
        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('password');

        $customer = DB::table('customers')->where('email', $email)->first();

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        if (Hash::check($oldPassword, $customer->password)) {
            // Password lama cocok
            $hashedPassword = Hash::make($newPassword);

            DB::table('customers')->where('email', $email)->update([
                'password' => $hashedPassword,
            ]);

            return response()->json(['message' => 'update password sukses']);
        } else {
            // Password lama tidak cocok
            return response()->json(['error' => 'password lama tidak cocok'], 400);
        }
    }
}
