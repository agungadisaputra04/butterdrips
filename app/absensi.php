<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $table = 'absensis'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id','karyawans_id','jabatan_id','bulan','tahun','hadir','lembur','created_at','updated_at'];  

       public function gaji(){

        return $this->hasMany('App\gaji','absensi_id','id','total_ijin');
    }
    public function karyawan(){

        return $this->belongsTo('App\karyawan','karyawans_id','id','nama','jabatan_id');
    }
    public function jabatan(){

        return $this->belongsTo('App\jabatan','jabatan_id','id','nama_jabatan','gaji_pokok','lembur');
    }
  
    
}
