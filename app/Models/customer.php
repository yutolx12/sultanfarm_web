<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class customer extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nama_customer',
        'alamat',
        'no_telp',
        'email',
        'password',
    ];

    protected $table = 'customers';
}
