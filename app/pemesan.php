<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesan extends Model
{
    protected $table ="pesanan_barang";
    

    public function barang()
    {
        return $this->belongsTo('App\barang');
    }
}
