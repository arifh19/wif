<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['kode', 'nama', 'satuan','stok','ukuran_id','harga'];

    public function ukuran()
    {
        return $this->belongsTo('App\Ukuran');
    }
}
