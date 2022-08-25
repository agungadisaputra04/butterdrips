<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\gaji;
use App\karyawan;
use App\absensi;
use App\jabatan;
use Carbon\Carbon;




class GajiController extends Controller
{
    //tampil data

    public function index(){
        $jumlah = gaji::all()->count();   
        $gaji = gaji::where('tahun', Carbon::now()->year)
        ->where('bulan', Carbon::now()->month)
        ->get();      
        $data = gaji::orderBy('id', 'DESC')->get();
       
         
           return view('gaji.index', compact('gaji','jumlah')); 
        }
    
        public function tambah(){
            //memanggil data dimodel karyawan
            $absensi=absensi::orderBy('id','DESC')->get();
            $karyawan=karyawan::orderBy('id','DESC')->get();
            $jabatan=jabatan::orderBy('id','DESC')->get();
            $harikerja=harikerja::orderBy('id','DESC')->get();
            return view('gaji.tambah',compact('absensi','karyawan','jabatan','harikerja'));
        }
    
        public function getabsensi($id){
            $absensi = absensi::where('id',$id)->first();
            return response()->json([
                'data' => $absensi
            ]);
            }

        public function tahungaji()
        {
           return view ('laporangaji.laporantahun');
        }

        public function laporangajipcetak(Request $request)
        {
            $this->validate($request,[
                'tahun'=>'required',
               ],
              [
                  'tahun.required' => ' Wajib Diisi!',
                
              ]);
              $waktu= date('d-m-Y');
            $tahun = $_POST['tahun'];
           $tahunn = $tahun;
            $laporan = gaji::where('tahun','=',$tahun)
            ->get();
           if($laporan->isEmpty()){
             return redirect()->back()->with('message','Data Gaji Tahun ini Tidak Ditemukan!');
           }
            
            return view('laporangaji.laporangajicetak',compact('laporan','tahunn','waktu'));
        }
        



    public function cari(Request $request)
        {
            $this->validate($request,[
           
                'tahun'=>'required',
                'bulan'=>'required',      
               ],
              [
                  'tahun.required' => ' Wajib Diisi!',
                  'bulan.required' => ' Wajib Diisi!',
              ]);
   
         
            $tahun = $_GET['tahun'];
            $bulan = $_GET['bulan'];
            $tanggal = $tahun.$bulan;
            $jumlah = gaji::all()->count();   
            $jabatan= jabatan::orderBy('id', 'DESC')->get(); 
            $gaji = gaji::where('bulan','=',$bulan)
            ->where('tahun','=',$tahun)
            ->get();
            $apa = gaji::where('bulan','=',$bulan)
            ->where('tahun','=',$tahun)
            ->get();

        //    dd($absensis);
           return view('gaji.index',compact('gaji','jabatan','jumlah','apa'));
        }

        public function cetakbulangaji($bulan,$tahun){
            $cetak = gaji::where('bulan','=',$bulan)
            ->where('tahun','=',$tahun)
            ->get();
            $waktu= date('d-m-Y');
            $jumlah = gaji::where('bulan','=',$bulan)
            ->where('tahun','=',$tahun)
            ->sum('total');
            return view('gaji.cetak',compact('cetak','bulan','tahun','waktu','jumlah'));
        }
    
        public function slip(){
            $pegawai = karyawan::orderBy('id', 'DESC')->get(); 

            return view('gaji.slipgaji',compact('pegawai'));
        }
        public function apa(Request $request){
            $this->validate($request,[
           
                'id'   =>'required', 
                'tahun'=>'required',
                'bulan'=>'required',      
               ],
              [
                  'id.required'    => ' Wajib Diisi!',
                  'tahun.required' => ' Wajib Diisi!',
                  'bulan.required' => ' Wajib Diisi!',
              ]);

            $tahun = $_POST['tahun'];
            $bulan = $_POST['bulan'];
            $id = $_POST['id'];
            $slip = gaji::where('bulan','=',$bulan)
            ->where('tahun','=',$tahun)
            ->where('karyawans_id','=',$id)
            ->get();
           if($slip->isEmpty()){
             return redirect()->back()->with('message','Data Gaji Tidak Ditemukan!');
           }
            
            return view('gaji.slipcetak',compact('slip'));
        }

        public function simpan(Request $request){
            
                $this->validate($request,[
                    'karyawans_id'=>'required',
                    'uang_komisi'=>'required',
                    'potongan_cuti' => 'required'

                   
                ]);
    
                $data['id'] = $request->id;
                $data['karyawans_id'] = $request->karyawans_id;
                $data['uang_komisi'] = $request->uang_komisi;
                $data['potongan_cuti'] = $request->potongan_cuti;
                $data['tanggal'] = $request->tanggal;
    
                //menjumlahkan total menggunakan orm
                //gaji pokok + komisi - potongan=total
                            //10000   15000 per1
                $gj = karyawan::find($request->karyawans_id);
                $gaji_pk = $gj->gaji_pokok;
                $komisi = $request->uang_komisi;
                $potongan = $request->potongan_cuti;
                $total = $gaji_pk + $komisi - $potongan;

                $data ['total'] = $total;
    
    
                    gaji::insert($data);
                    
                return redirect()->route('gaji')
                ->with('message', 'Data Barang Berhasil ditambahkan!');    
                    
           }

    public function edit($id) {
        $gaji = gaji::findOrFail($id);
        return view('gaji.edit', compact('gaji'));
            }


            
    public function update(Request $request, $id){
    DB::table('gaji')->where('id',$id)->update([
    'id'=>$request->id,
    'uang_komisi'=>$request->uang_komisi,
    'potongan_cuti'=>$request->potongan_cuti,
        ]);

       
       return redirect()->route('gaji')
       ->with('message', 'Data gaji berhasil dirubah!');
    
}

public function destroy($id)
{
    $gaji = gaji::findOrFail($id);
    $gaji->delete();
 return redirect()->route('gaji')
   ->with('message', 'Data Gaji berhasil dihapus!');
}
}


