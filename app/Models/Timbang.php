<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timbang extends Model
{
    protected $table = 'historytimbang';

    protected $fillable = ['kode_domba', 'bobot', 'created_at', 'updated_at'];
}
