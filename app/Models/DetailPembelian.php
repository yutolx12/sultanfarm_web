<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $table = 'detail_pembelians';

    protected $fillable = ['id_pembelian', 'id_domba'];
}
