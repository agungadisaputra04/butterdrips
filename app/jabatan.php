<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = 'jabatans'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id','nama_jabatan','gaji_pokok','lembur','created_at','updated_at	'];  

       public function gaji(){

        return $this->hasMany('App\gaji','jabatan_id','id','gaji_pokok','gaji_hari');
    }

    public function karyawan(){

        return $this->hasMany('App\karyawan','jabatan_id','id','nama_jabatan','gaji_pokok','gaji_hari');
    }
    public function absensi(){

        return $this->hasMany('App\absensi','jabatan_id','id','nama_jabatan','gaji_pokok','lembur');
    }
    
}
