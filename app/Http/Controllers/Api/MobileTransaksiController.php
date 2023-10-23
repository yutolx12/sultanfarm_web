<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kamar;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Jobs\SetKamarAvailableJob;
use App\Rules\CheckTersedia;
use Illuminate\Support\Str;

class MobileTransaksiController extends Controller
{

    public function kamar_transaksi(Request $request)
    {

        // Mengambil nilai 'id' dari permintaan
        $id_plasma = $request->input('id_plasma');


        // Filter berdasarkan status dan tipe domba
        $kamars = Kamar::select('kamars.id', 'kamars.id_plasma', 'plasmas.nama_plasma', 'plasmas.nama_plasma', 'plasmas.alamat_plasma', 'kamars.no_kamar', 'kamars.status')
            // Menggunakan 'status dari permintaan untuk mencari domba yang tersedia
            ->join('plasmas', 'kamars.id_plasma', '=', 'plasmas.id')
            ->where('id_plasma', $id_plasma)
            ->get();

        return response()->json($kamars);
    }

    public function update_kamar_tidak_tersedia(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'id' => ['required|exists:kamars,id'.new CheckTersedia()],
        // ]);

        $validator = Validator::make($request->all(), [
            'kamar_id' => 'required|exists:kamars,id', // Memastikan ID kamar ada di tabel kamar
            'status'   => 'required|in:Tersedia,Tidak Tersedia', // Gantilah status1, status2, dan status3 dengan status yang sesuai
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Jika validasi berhasil, lanjutkan dengan tindakan yang sesuai
        $kamarId = $request->input('kamar_id');
        $status = $request->input('status');

        // Lakukan tindakan sesuai dengan keperluan Anda
        // Contoh: Ambil data kamar dari database dan lakukan sesuatu dengan statusnya
        $kamar = Kamar::find($kamarId);
        if ($kamar) {
            if ($kamar->status == $status) {
                return response()->json(['message' => 'Status Kamar sudah tidak tersedia.'], 400);
            } else {
                DB::table('kamars')->where('id', $kamarId)->update([
                    'status' => 'Tidak tersedia',
                ]);
                return response()->json(['message' => 'Status Kamar berhasil dirubah menjadi tidak tersedia.'], 200);
            }
        } else {
            return response()->json(['message' => 'Kamar tidak ditemukan.'], 404);
        }

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'ID kamar tidak ditemukan atau status sudah tidak tersedia.'
        //     ], 400);
        // }

        // $id = $request->input('id');

        // DB::table('kamars')->where('id', $id)->update([
        //     'status' => 'Tidak tersedia',
        // ]);

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'data Kamar berhasil updated menjadi tidak tersedia'
        // ], 200);
    }

    public function update_kamar_tersedia(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:kamars,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'ID kamar tidak valid atau tidak ditemukan.'
            ], 400);
        }

        $id = $request->input('id');

        DB::table('kamars')->where('id', $id)->update([
            'status' => 'Tersedia',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'data Kamar berhasil updated menjadi tersedia'
        ], 200);
    }

    public function transaksi(Request $request)
    {
        // Validate the request
        $request->validate([
            'akad' => 'required|mimes:mp3,mp4,mp4a,mpeg',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_paket' => 'required',
            'total' => 'required',
            'id_customer' => 'required',
            'id_kamar' => 'required',
        ]);

        $imageName = time() . '.' . $request->bukti_pembayaran->getClientOriginalExtension();
        $request->bukti_pembayaran->move(public_path('images'), $imageName);

        $audioName = time() . '.' . $request->akad->getClientOriginalExtension();
        $request->akad->move(public_path('audios'), $audioName);

        // $buktiPembayaran = $request->file('bukti_pembayaran');


        // $bukti_pembayaran = "img_" . Str::random(10) . time() . '.' . $buktiPembayaran->getClientOriginalExtension();


        // $buktiPembayaran->move(public_path('images/', $bukti_pembayaran));

        // Insert the data into the database
        $data = Penjualan::create([
            'akad' => $audioName,
            'bukti_pembayaran' => $imageName,
            'status' => 'Diajukan',
            'id_paket' => $request->input('id_paket'),
            'total' => $request->input('total'),
            'id_user' => '1',
            'id_kamar' => $request->input('id_kamar'),
            'id_customer' => $request->input('id_customer'),
        ]);

        return response()->json([
            'status' => 'success',
            'nama_image' => $imageName,
            'nama_audio' => $audioName,
        ], 200);
    }
}
