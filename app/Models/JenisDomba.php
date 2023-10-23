<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisDomba extends Model
{
    protected $table = 'jenis_dombas';

    protected $fillable = ['jenis_domba', 'kode', 'gambar', 'urutan'];
}
