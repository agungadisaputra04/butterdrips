<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\gaji;
use App\sablon;
use App\transaksi;
use App\laporan;

class LaporanController extends Controller
{
    //tampil data

    public function index(){
        $laporangaji=gaji::all();     
        $laporansablon=sablon::all(); 
        $laporantransaksi=transaksi::all();  
      
           return view('laporan.index', compact('laporangaji','laporansablon','laporantransaksi')); 
          
            
        }
    

        public function cetak(){
            $laporangaji=gaji::all();     
            $laporansablon=sablon::all(); 
            $laporantransaksi=transaksi::all();  
          
               return view('laporan.cetak', compact('laporangaji','laporansablon','laporantransaksi')); 
              
                
            }
        
        

}
