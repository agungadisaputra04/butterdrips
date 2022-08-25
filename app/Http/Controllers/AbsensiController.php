<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\absensi;
use App\karyawan;
use App\jabatan;
use Carbon\Carbon;
use App\gaji;


class AbsensiController extends Controller
{
   
    public function index()
    {
        $jumlah_karyawan = karyawan::all()->count();          
        // $absensis= absensi::orderBy('id', 'DESC')->get();   
        $data = absensi::where('id')->count();  
        
        
        $absensis = absensi::where('tahun', Carbon::now()->year)
        ->where('bulan', Carbon::now()->month)
       
        ->get();
        // $karyawanns= absensi::orderBy('id', 'DESC')
        // ->whereYear('created_at', Carbon::now()->subYear()->year)
        // ->whereMonth('created_at', Carbon::now()->subMonth()->month)
       
        // ->get();
        return view('absensi.index',compact('absensis','jumlah_karyawan','data','absensis'));
    }

    public function cetakbulanabsensi($bulan,$tahun){
        $cetak = absensi::where('bulan','=',$bulan)
        ->where('tahun','=',$tahun)
        ->get();
        $waktu= date('d-m-Y');
       
        return view('absensi.cetak',compact('cetak','bulan','tahun','waktu'));
    }

    public function tambah($bulan,$tahun)
    {
        $absensi= absensi::orderBy('id', 'DESC')->get();   
        $karyawan= karyawan::orderBy('id', 'DESC')->get();
     
        return view('absensi.tambah',compact('absensi','karyawan','bulan','tahun'));
    }

        public function tahunkehadiran()
        {
            return view('absensi.laporantahun');
        }
        public function cetaklaporan(Request $request)
        {
            $this->validate($request,[
                'tahun'=>'required',
               ],
              [
                  'tahun.required' => ' Wajib Diisi!',
                
              ]);

            $tahun = $_POST['tahun'];
           $tahunn = $tahun;
            $laporan = absensi::where('tahun','=',$tahun)
            ->get();
            $waktu= date('d-m-Y');
           if($laporan->isEmpty()){
             return redirect()->back()->with('message','Data Kehadiran Tahun ini Tidak Ditemukan!');
           }
            return view('absensi.cetaklaporantahun',compact('tahunn','laporan','waktu'));
        }

    public function simpan(Request $request)
    {
 

      $this->validate($request,[
           
        'hadir.*'=>'required',
        'lembur.*'=>'required',      
       ],
      [
          'hadir.required' => ' Wajib Diisi!',
          'lembur.required' => ' Wajib Diisi!',
      ]);
      $data =$request->all();

    // $karyawan = implode(',',$request->karyawans_id);
    // $bulan = implode(',',$request->karyawans_id);
    // $hadir = implode(',',$request->hadie);
    // $lembur = implode(',',$request->lembur);
 
     $karyawan =$request->karyawans_id;
     $jabatan =$request->jabatan_id;
       $bulan = $request->bulan;
       $tahun = $request->tahun;
       $hadir = $request->hadir;
       $lembur = $request->lembur;
       
       for($i=0;$i<count($karyawan);$i++) 
       {
   $data = [
            'karyawans_id' => $karyawan[$i],
            'jabatan_id' => $jabatan[$i],
             'bulan' => $bulan[$i],
             'tahun' => $tahun[$i],
             'hadir' => $hadir[$i],
            'lembur' => $lembur[$i],
            // 'created_at' =>\Carbon\Carbon::now()->month($bulan),
           
       ];
       DB::table('absensis')->insert($data);
    // dd($data);
    }
    
    $karyawan =$request->karyawans_id;
        $jabatan =$request->jabatan_id;
        $intjabatan = array_map('intval', $jabatan);
      $bulan = $request->bulan;
      $tahun = $request->tahun;
      $hadir = $request->hadir ;
      $lembur = $request->lembur ;
      $intlembur = array_map('intval', $lembur);
      $inthadir = array_map('intval', $hadir);
  
     
      
  $jabatann=[];
  foreach($request->jabatan_id as $ses){
    $jabat = jabatan::find($ses);
    $jabatann[]=$jabat;
  }
    //mengambil gaji pokok dan uanglembur 
        $lemburst = array();
      foreach ($jabatann as $key) {
       array_push($lemburst,$key->lembur);
      }

      $pokokers = array();
      foreach ($jabatann as $v){
          array_push($pokokers,$v->gaji_pokok);
      }

    $result = array();
    foreach ($jabatann as $key => $value) {
        $id =$value['id'];
        $result[$id][]=$value['lembur'];
    
    
       $a= 1;
        $sumlembur = array();
        // $lemburs = array();
        foreach (array_keys($intlembur + $lemburst) as $key) {
              $sumlembur[$key]  = $intlembur[$key] * $lemburst[$key];  
        }
        $sumgaji = array();
        foreach (array_keys($pokokers + $inthadir ) as $key) {

              $sumgaji[$key]  = $pokokers[$key] / 30 * $inthadir[$key]  ;  
        }
        $sumtotal = array();
        foreach (array_keys($sumlembur + $sumgaji ) as $key) {

              $sumtotal[$key]  = $sumlembur[$key] + $sumgaji[$key]  ;  
        }   
        }

       
         $ids = count($karyawan);
            for($i=0;$i<$ids;$i++) 
            {
     $datagaji = [
            //  'karyawans_id' => implode("",$karyawan),
             'karyawans_id' => $karyawan[$i],
             'jabatan_id' => $jabatan[$i],
              'bulan' => $bulan[$i],
              'tahun' => $tahun[$i],
              'hadir' => $hadir[$i],
             'lembur' => $lembur[$i],
             'uang_lembur' => $sumlembur[$i],
              'uang_gaji' => $sumgaji[$i],
              'total' => $sumtotal[$i],
            
        ];
    //     $marge = array_merge($karyawan,$jabatan);
   DB::table('gaji')->insert($datagaji);
    //  dd($data,$datagaji,$karyawan);
    
    }
    return redirect()->route('absensi')->with('message','Data Kehadiran Berhasil Di Inputkan! Data Gaji Tersedia!');
       }
    
    
    

   

    public function getkaryawan($id){
        $absen = absensi::where('id',$id)->first();
        return response()->json([
            'data' => $absen
        ]);
        }

        public function absen()
        {
            $karyawan= absensi::orderBy('id', 'DESC')->get(); 
           return view('absensi.edit', compact('karyawan'));
        }

        public function update(Request $request, $id)
        {
            $this->validate($request,[
           
                'karyawans_id'=>'required',
             
                  
               ],
              [
                  'karyawans_id.required' => 'karyawan Tidak Ditemukan!',
              ]);
            $data = array(
                'karyawans_id'=>$request->post('karyawans_id'),
                'jumlah_ijin'=>$request->post('jumlah_ijin'),
                'total_ijin' =>$request->post('total_ijin'),
                'jumlah_lembur'=>$request->post('jumlah_lembur'),
                'total_lembur' =>$request->post('total_lembur'),
            );
            // dd($data);
            $simpan = DB::table('absensis')->where('id','=',$request->post('id'))->update($data);
            if($simpan){
                 
                session::get('message','data berhasol');
            } else{
                session::get('message','gagal');
            }
            return redirect()->route('absensi')->with('message','Pesanan Berhasil DiUpdate!');
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
               
            $jabatan= jabatan::orderBy('id', 'DESC')->get(); 
            $absensis = absensi::where('bulan','=',$bulan)
            ->where('tahun','=',$tahun)
            ->get();
           

           
        //    dd($absensis);
           return view('absensi.index',compact('absensis','jabatan'));
        }
}
