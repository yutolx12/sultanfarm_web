<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SetKamarAvailableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $kamarId;

    /**
     * Create a new job instance.
     */
    public function __construct($kamarId)
    {
        $this->kamarId = $kamarId;
    }


    /**
     * Execute the job.
     */
    public function handle()
    {
        // Ambil waktu sekarang
        $now = Carbon::now();

        // Ambil kamar berdasarkan ID
        $kamar = DB::table('kamars')->find($this->kamarId);

        if ($kamar && $kamar->waktu_kembali_tersedia && $now->gte($kamar->waktu_kembali_tersedia)) {
            // Jika waktu yang ditentukan telah berlalu, ubah status kamar menjadi "Tersedia"
            DB::table('kamars')->where('id', $this->kamarId)->update([
                'status' => 'Tersedia',
                'waktu_kembali_tersedia' => null,
            ]);
        }
    }
}
