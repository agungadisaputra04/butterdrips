<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    protected $table = 'laporans'; 
    protected $primaryKey = 'id'; 
       protected $fillable = ['id','lagaji_id','lasablon_id','latransaksi_id','tanggal'];  

       public function gajis(){

        return $this->belongsTo('App\gaji','lagaji_id','id','karyawans_id','total','uang_komisi','potongan_cuti','tanggal');
       }

       public function transaksis(){

        return $this->belongsTo('App\transaksi','latransaksi_id','id','barangs_id','jumlah','total','tanggal');
        }

        public function sablons(){

            return $this->belongsTo('App\sablon','lasablon_id','id','nama','tipes_id','status','jumlah','total','tanggal');
            }
}
