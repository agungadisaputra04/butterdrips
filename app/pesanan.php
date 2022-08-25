<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pesanan extends Model
{
    protected $table = 'pesanan'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id','tipe_id','pelanggan_id','jumlah','satuan','total'];  

       public function sablon(){

        return $this->belongsTo('App\sablon','id','pelanggan_id','tipe_id','jumlah','satuan','total');
    }
       public function tiper(){

        return $this->belongsTo('App\tipe','tipe_id');
    }
}
