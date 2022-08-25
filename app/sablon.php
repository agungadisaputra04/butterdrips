<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sablon extends Model
{
        protected $table = 'sablons'; 
        protected $primaryKey = 'id'; 
           protected $fillable = ['id','kode','nama','disain','nohp','uang_dp','grandtotal','kurang','status','statuspes','tanggal','updated_at'];  
    
           public function tipes(){
    
            return $this->belongsTo('App\tipe','tipes_id','id','tipe','harga');
        }
        public function pesannih(){
    
            return $this->hasMany('App\pesanan','pelanggan_id');
        }

        public function sablons(){

                return $this->hasMany('App\laporan','lasablon_id','id','nama','tipes_id','status','jumlah','total','tanggal');
            }
        public static function getId(){

            return  $id = DB::table('sablons')->orderBy('id','DESC')->take(1)->get();
             
            }

            
           
}
