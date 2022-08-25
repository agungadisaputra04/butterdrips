<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\karyawan;
use App\tipe;
use Carbon\Carbon;
use App\sablon;
use App\absensi;
use App\User;



class BerandaController extends Controller
{
    public function index(){
        $beranda=karyawan::all()->count();     
        $tipe=tipe::all()->count();     
        $complated = sablon::whereMonth('tanggal',date('m'))->where('status',1)->count();
        $pending = sablon::whereMonth('tanggal',date('m'))->where('status',0)->count();
        $comp = sablon::whereMonth('tanggal',date('m'))->where('statuspes',1)->count();
        $pend = sablon::whereMonth('tanggal',date('m'))->where('statuspes',0)->count();
        $absensi=absensi::all()->count(); 
        $sablon=sablon::whereMonth('tanggal',date('m'))->count(); 
        $bulantahun=Carbon::now(); 
      
        $tot_pendapatan = sablon::whereDate('tanggal',date('Y-m-d'))->sum('uang_dp');
           return view('beranda.dashboard', compact('beranda','bulantahun','sablon','tot_pendapatan','absensi','complated','pending','comp','pend','tipe')); 
}

    public function user(){
        $user = User::orderBy('id', 'DESC')->get(); 

        return view('user.index',compact('user'));
    }
}
