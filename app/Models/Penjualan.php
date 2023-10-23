<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';

    protected $fillable = ['id_customer', 'status', 'id_user', 'bukti_pembayaran', 'id_paket', 'id_kamar', 'akad', 'total'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->kode_penjualan = $model->getRandomString();
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

        return $randomString . '' . date('YmdHis');
    }

    public function getRandomString()
    {
        $str = $this->generateRandomString();

        return $str;
    }
}
