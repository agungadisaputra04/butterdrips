<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    protected $table = 'gaji'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id','karyawans_id','absensi_id','harikerjas_id','jabatan_id','keterangan','tanggal_gaji','total','tanggal'];  

       public function karyawan(){

        return $this->belongsTo('App\karyawan','karyawans_id','id','nama','jabatan_id');
    }

        public function absensis(){

            return $this->belongsTo('App\absensi','absensi_id','id');
        }
        public function harikerjas(){

            return $this->belongsTo('App\harikerja','harikerjas_id','id','jumlah_harikerja');
        }
        public function jabatan(){

            return $this->belongsTo('App\jabatan','jabatan_id','id','nama_jabatan','gaji_pokok','lembur');
        }




    public function gajis(){

        return $this->hasMany('App\laporan','lagaji_id','id','karyawans_id','total','uang_komisi','potongan_cuti','tanggal');
    }
    
    }



