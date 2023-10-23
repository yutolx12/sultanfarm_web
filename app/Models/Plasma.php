<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plasma extends Model
{
    protected $fillable = [
        'alamat_plasma', 'nama_plasma'
    ];

    protected $table = 'plasmas';

    public function kamar()
    {
        return $this->hasMany(kamar::class, 'id_plasma', 'id');
    }
}
