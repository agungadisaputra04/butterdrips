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
use App\tipe;
use App\pesanan;
use Carbon\Carbon;

class SablonController extends Controller
{

    
    public function index(){
        $sablons= sablon::orderBy('id', 'DESC')->paginate(4);  
      
        $dari = date('Y-m-d',strtotime('-1 days'));
        $sampai = date('Y-m-d');
       $id = sablon::getId();
        return view('sablon.index', compact('sablons','dari','sampai','id')); 
         
        
        }
        
        public function filter(Request $request)
        {
          $dari = date('Y-m-d',strtotime($request->dari));
          $sampai = date('Y-m-d',strtotime($request->sampai));

          $sablons = sablon::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->orderBy('id', 'DESC')->paginate(100);
          return view('sablon.index', compact('sablons','dari','sampai')); 
        }

       
        public function detail($id){
            $detail= sablon::find($id); 
            return view('detail.detail', compact('detail'));
        }
        public function ketambah(){
            
            return view('sablon.ketambah');
        }

       
       public function cari(){

        return view('sablon.cari');
         }
        //mengambil kode dari daftar pesanan di menu cari sablon
        public function getpesanan($kode){
            $dt = sablon::where('kode',$kode)->first();
            return response()->json([
                'data' => $dt
                
                        ]);
        //  $sablon = sablon::where('kode',$kode)->first();
        //  return response()->json([
        //    'data' => $sablon
        //    ]);
            
        }

        public function gettipe($id){
        $dt = tipe::where('id',$id)->first();
        return response()->json([
            'data' => $dt
        ]);
        }

        

        public function tambah(Request $request){
          
            $this->validate($request,[
           
                'nama'=>'required',
                'nohp'=>'required',
               
              //     'uang_dp' => 'required',
              //     'kurang' => 'required',
              //     'uang_dp' => 'required',
              //     'status' => 'required',
              //     'statuspes' => 'required',
              //     'dibayar'=>'required',
                  
               ],
              [
                  'nama.required' => 'Harus Diisi!',
                  'nohp.required' => 'Harus Diisi!',
              ]);
            //memanggil model tipe get
            $tipes_id=tipe::orderBy('id','DESC')->get();
            // $kode = rand();
            // $id = sablon::getId();
            // foreach ($id as  $value);
            // $idlm = $value->id;
            // $idbr = $idlm + 1;
            // $blt  = date('d','m','Y');
            // $nopesanan = 
            $a = DB::table('sablons')->whereDate('created_at',date('Y-m-d'))->get()->count();
            $b = $a + 1;
              $blt  = date('Ymd');

              $nomerpesanan = 'PO-'.$blt.'-'.$b;

             

            $nama = $_GET['nama'];
           
            $nohp = $_GET['nohp'];
          
            $statuspes = $_GET['statuspes'];
            // dd($nama,$disain,$nohp,$status,$statuspes);
            return view('sablon.tambah',compact('tipes_id','nomerpesanan','nama','nohp','statuspes'));
        }
    
        //untuk simpan data
    
        public function simpan(Request $request){
            // $this->validate($request,[
           
            //     'jumlah'=>'required',
            //     'tipes_id'=>'required',
            //     'uang_dp'=>'required',
            //   //     'uang_dp' => 'required',
            //   //     'kurang' => 'required',
            //   //     'uang_dp' => 'required',
            //   //     'status' => 'required',
            //   //     'statuspes' => 'required',
            //   //     'dibayar'=>'required',
                  
            //    ],
            //   [
            //       'jumlah.required' => 'Harus Diisi!',
            //       'uang_dp.required' => 'Harus Diisi!',
            //   ]);
              
    
    {
       
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];
        $id_tipe = $_POST['tipes_id'];
        $tip = $_POST['tip'];
        $jumlah = $_POST['jumlah'];
        $satuan = $_POST['satuan'];
        // $bulan = $_POST['status'];
        $stp = $_POST['statuspes'];

        foreach($id_tipe as $e => $v){
            $total[$e] = (int)$jumlah[$e] * (int)$satuan[$e];
            
        }
      
        
        // foreach($total as $v => $e){
        // $hasil2 = array($v);
      $hasil =  array_sum(array_filter($total));
        
        return view('sablon.invoice',compact('kode','nama','id_tipe','tip','nohp','jumlah','satuan','stp','total','hasil'));
        // $bulan = $_POST['bulan'];
            // $sablon=new sablon;
            // $sablon->id=$request->id;
            // $sablon->tipes_id=$request->tipes_id;
            // $sablon->kode=$request->kode;
            // $sablon->nama=$request->nama;
            // $sablon->nohp=$request->nohp;
            // $sablon->jumlah=$request->jumlah;
            // $sablon->satuan=$request->satuan;
            // // $sablon->uang_dp=$request->uang_dp;
            // $sablon->status=$request->status;
            // $sablon->statuspes=$request->statuspes;
            // $sablon->total=$request->total;
            // $sablon->kurang=$request->kurang;
            // $sablon->created_at=$request->tanggal;
            // $imgName = $request->disain->getClientOriginalName() . '-' . time() . ' .' .$request->disain->extension();
            //         $request->disain->move(public_path('img'),$imgName);
                 
            // $sablon->disain=$imgName;
           
            // $sablon->save();
                dd($kode,$nama,$id_tipe,$jumlah,$satuan,$total,$hasil);
                // return redirect()->route('sablondetail',$data->id)->with('message','Pesanan Berhasil DiUpdate!');
            //   return redirect()->route('sablondetail',$sablon->id)->with('message','Pesanan Berhasil Ditambahkan!');  
           
    }
        }
       
          
         public function store(Request $request)
        {
            //    dd($request ->all());
          
                $kode = $request->kode;
                $nama = $request->nama;
                $nohp = $request->nohp;
                $grandtotal = $request->grandtotal;
                $status = $request->status;
                $statuspes = $request->statuspes;
                $kurang = $request->kurang;
                $uang_dp = $request->uang_dp;
             $imgName = $request->disain->getClientOriginalName() . '-' . time() . ' .' .$request->disain->extension();
                   $request->disain->move(public_path('img'),$imgName);

                $tipe = $request->tipes_id;
                $satuan = $request->satuan;
                $jumlah = $request->jumlah;
                $total = $request->total;
              

                // \DB::transaction(function ()use($tipe,$satuan,$jumlah,$total,$kode,$nama,$nohp,$grandtotal,$status,$statuspes,$kurang,$uang_dp,$imgName) {
                    $id = sablon::insertGetId([
                            'kode' =>$kode,
                            'nama' =>$nama,
                            'nohp' =>$nohp,
                            'grandtotal' =>$grandtotal,
                            'status' =>$status,
                            'statuspes' =>$statuspes,
                            'kurang' =>$kurang,
                            'uang_dp' =>$uang_dp,
                            'disain' =>$imgName,

                    ]);

                   foreach ($tipe as $i => $v) {
                     
                   
                    
                     pesanan::insert([
                         'tipe_id' => $tipe[$i],
                         'pelanggan_id' => $id,
                         'satuan' => $satuan[$i],
                         'jumlah' => $jumlah[$i],
                         'total' => $total[$i],

                     ]);
                    }
                    // dd($header);
                // });
                // $data = DB::table('sablons')->lastInsertId();
                return redirect()->route('sablondetail',$id)->with('message','Pesanan Berhasil Ditambahkan!');  
        //   dd($id);
        }

    public function update(Request $request, $id){

        $this->validate($request,[
           
            'kode'=>'required',
          //     'uang_dp' => 'required',
          //     'kurang' => 'required',
          //     'uang_dp' => 'required',
          //     'status' => 'required',
          //     'statuspes' => 'required',
          //     'dibayar'=>'required',
              
           ],
          [
              'kode.required' => 'Pesanan Tidak Ditemukan!',
          ]);
  
         
              $data = array(
                 
              'kode'=>$request->post('kode'),
              'uang_dp' =>$request->post('uang_dp'),
              'kurang' => $request->post('kurang'),
              'uang_dp' => $request->post('uang_dp'),
              'status' => $request->post('status'),
              'statuspes' => $request->post('statuspes'),
              'dibayar'=>$request->post('dibayar'),
              
              );
              $simpan = DB::table('sablons')->where('id','=',$request->post('id'))->update($data);
              
              if($simpan){
                 
                  session::get('message','data berhasol');
              } else{
                  session::get('message','gagal');
              }
              $data = sablon::find($request->get('id'));
  
            
              return redirect()->route('sablondetail',$data->id)->with('message','Pesanan Berhasil DiUpdate!');
      //  dd($request ->all());
       
    
}

        public function struk($id)
        {
            $struk = sablon::with('tipes')->where('id',$id)->first();
            // dd($struk);
            return view('detail.struk',compact('struk'));
        }

        public function laporanpesanan()
        {
            # code...
        }
  
}
