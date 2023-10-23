<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('landing_pages')->insert([
            'judul_beranda' => 'CV SULTAN FARM JEMBER',
            'deskripsi_beranda' => 'TEMUKAN DOMBA SESUAI KEINGINAN ANDA DI SINI, Dapatkan berbagai macam pilihan domba sesuai dengan kriteria domba yang Anda cari',
            'deskripsi_tentangkami' => 'CV Sultan Farm Jember merupakan PUSAT PETERNAKAN DOMBA yang menyediakan domba dengan berbagai macam jenis domba yang diinginkan.',
            'deskripsi_footer' => 'CV Sultan Farm Jember merupakan PUSAT PETERNAKAN DOMBA TERBAIK. Dan tempat untuk membeli domba terpercaya',
            'nomor_telepon' => '6282231931510',
            'email' => 'cvsultanfarm4@gmail.com',
            'instagram' => 'https://www.instagram.com/sultanfarm2_/',
            'tiktok' => 'https://www.tiktok.com/@sultanfarm.plasma2',
        ]);
    }
}
