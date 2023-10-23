<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelians';

    public function detailPembelians()
    {
        return $this->hasMany(DetailPembelian::class, 'id_pembelian', 'id');
    }

    public function dombas()
    {
        return $this->hasManyThrough(Domba::class, DetailPembelian::class, 'id_pembelian', 'id', 'id', 'id_domba');
    }

    protected $fillable = ['id_pembelian', 'tgl_pembelian', 'total', 'id_user', 'id_supplier'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->kode_pembelian = $model->getRandomString();
        });
    }

    public function generateRandomString($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString.''.date('YmdHis');
    }

    public function getRandomString()
    {
        $str = $this->generateRandomString();

        return $str;
    }

    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'id_pembelian');
    }
}
