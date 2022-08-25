<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\sablon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanpesananController extends Controller
{
    public function index()
    {
       return view('laporanpesanan.index');
    }

    public function cari(Request $request)
    {
        $this->validate($request,[
            'daritanggal' => 'required',
            'sampaitanggal'=> 'required'
        ]);

        $dari  = date('Y-m-d',strtotime( $request->daritanggal));
        $sampai  = date('Y-m-d',strtotime( $request->sampaitanggal));

        $pesanan = DB::table('sablons as s')->whereBetween('tanggal',[$dari,$sampai])->get();
        $uangmasuk = DB::table('sablons as s')->whereBetween('tanggal',[$dari,$sampai])->sum('grandtotal');
       return view('laporanpesanan.index',compact('pesanan','uangmasuk','dari','sampai'));
    }
    public function export($dari, $sampai)
    {
        $pesanan = DB::table('sablons as s')->whereBetween('tanggal',[$dari,$sampai])->get();
        $uangmasuk = DB::table('sablons as s')->whereBetween('tanggal',[$dari,$sampai])->sum('grandtotal');

        $pdf = PDF::loadview('laporanpesanan.laporan_pesanan', compact('pesanan','uangmasuk','dari','sampai'))->setPaper('a4','landscape');
        return $pdf->stream();
        return redirect()->back();
    }
}
