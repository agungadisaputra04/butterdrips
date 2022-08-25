<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = 'karyawans'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id','nama','jabatan_id','alamat','jenis_kelamin','telepon','email','tanggal_masuk','created_at','updated_at'];  

       public function gaji(){

        return $this->hasMany('App\gaji','karyawans_id','id');
    }
       public function absensi(){

        return $this->hasMany('App\absensi','karyawans_id','id','nama','jabatan_id');
    }
    public function jabatan(){

        return $this->belongsTo('App\jabatan','jabatan_id','id','nama_jabatan');
    }
    
    }