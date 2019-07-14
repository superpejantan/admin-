<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = "pesanan";
    
    
    public function psanan()
    {
       return $this->hasMany('App\pemesan');
    }

    public function barang()
    {
        return $this->belongTo('App\barang');
    }
}
