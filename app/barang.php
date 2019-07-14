<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = "pesanan_barang"; 

    public function nama_brg()
    {
        return $this->belongsTo('App\barang','id_barang','id_barang');
    }
}
