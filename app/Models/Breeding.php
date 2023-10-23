<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeding extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga',
        'gambar',
        'keterangan',
    ];

    protected $table = 'breedings';
}
