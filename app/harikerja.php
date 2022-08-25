<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class harikerja extends Model
{
    protected $table = 'harikerjas'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id','jumlah_harikerja'];  

       public function gaji(){

        return $this->hasMany('App\gaji','id','harikerjas_id','jumlah_harikerja');
    }
    
}
