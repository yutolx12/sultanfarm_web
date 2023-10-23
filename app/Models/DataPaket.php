<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPaket extends Model
{
    protected $table = 'pakets';

    protected $fillable = [
        'nama_paket',
        'keterangan',
    ];
}
