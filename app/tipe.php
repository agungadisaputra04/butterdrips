<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipe extends Model
{
    protected $table = 'tipes'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id', 'tipe','harga'];  

public function sablons(){

    return $this->hasMany('App\sablon','tipes_id','id','tipe','harga');
}
public function pesanan(){

    return $this->hasMany('App\pesanan','id');
}
}
