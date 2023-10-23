<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domba extends Model
{
    protected $table = 'dombas';

    protected $fillable = ['id_kamar', 'status', 'kode_domba', 'jenis_kelamin', 'id_jenis', 'tgl_lahir', 'gambar', 'bobot', 'harga_jual', 'induk_jantan', 'induk_betina', 'tipe_domba', 'turunan', 'keterangan'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->kode_domba = $model->getRandomString();
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

    public function jenis()
    {
        return $this->belongsTo(JenisDomba::class, 'id_jenis', 'id');
    }

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_domba');
    }
}
