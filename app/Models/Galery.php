<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'caption',
        'deskripsi',
    ];
    protected $table = 'galerys';
}
