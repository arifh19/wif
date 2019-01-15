<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangTransaksi extends Model
{
    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi');
    }
}
