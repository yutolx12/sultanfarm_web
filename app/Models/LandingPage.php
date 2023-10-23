<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_beranda',
        'deskripsi_beranda',
        'deskripsi_tentangkami',
        'gbr1',
        'gbr2',
        'gbr3',
        'gbr4',
        'deskripsi_footer',
        'nomor_telepon',
        'email',
        'instagram',
        'tiktok',
    ];

    protected $table = 'landing_pages';
}
