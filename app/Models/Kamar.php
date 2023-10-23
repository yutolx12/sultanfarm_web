<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    protected $fillable = [
        'no_kamar',
        'status',
        'id_plasma',
    ];

    public function plasma()
    {
        return $this->belongsTo(Plasma::class, 'id_plasma', 'id');
    }
}
