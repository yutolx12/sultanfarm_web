<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TipeDombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Batur',
            'kode' => 'A',
            'urutan' => '1',
            'gambar' => '1694026269.jfif',
        ]);
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Taxel',
            'kode' => 'B',
            'urutan' => '2',
            'gambar' => '1694026324.jfif',
        ]);
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Sopas',
            'kode' => 'C',
            'urutan' => '3',
            'gambar' => '1694026435.jfif',
        ]);
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Merino',
            'kode' => 'D',
            'urutan' => '4',
            'gambar' => '1694026269.jfif',
        ]);
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Dormas Super',
            'kode' => 'E',
            'urutan' => '5',
            'gambar' => '1694026269.jfif',
        ]);
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Crossing Dormas',
            'kode' => 'F',
            'urutan' => '6',
            'gambar' => '1694026269.jfif',
        ]);
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Lokal',
            'kode' => 'G',
            'urutan' => '7',
            'gambar' => '1694026269.jfif',
        ]);
        DB::table('jenis_dombas')->insert([
            'jenis_domba' => 'Crossing Lokal',
            'kode' => 'H',
            'urutan' => '8',
            'gambar' => '1694026269.jfif',
        ]);

    }
}
