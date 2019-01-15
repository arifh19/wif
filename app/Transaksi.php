<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['pelanggan','tanggal','alamat'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function barangs()
    {
        return $this->belongsToMany('App\Barang', 'barang_transaksis')->withPivot('kuantitas');
    }
}
