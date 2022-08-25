<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\karyawan;
use App\jabatan;



class KaryawanController extends Controller
{
    
    public function index(){
        $karyawans= karyawan::orderBy('id', 'DESC')->paginate(8);   
        $jabatan_id = jabatan::orderBy('id', 'DESC')->get();
        
        return view('karyawan.index', compact('karyawans','jabatan_id'));
        }   
        
    public function cetak(){
        $karyawans= karyawan::orderBy('id', 'DESC')->paginate(8);   
      
        return view('karyawan.cetak', compact('karyawans'));
        }   
       
        public function edit($id)
        {
        $jabatan_id = jabatan::orderBy('id', 'DESC')->get();
        $karyawans = karyawan::find($id);
        return view('karyawan.edit', ['karyawans'=>$karyawans, 'jabatan_id'=>$jabatan_id]);
        }

    //untuk simpan data

    public function simpan(Request $request){
        $this->validate($request,[
           
            'nama'=>'required',
            'jabatan_id'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'telepon'=>'required',
            'email'=>'required',
            'tanggal_masuk'=>'required',
          //     'uang_dp' => 'required',
          //     'kurang' => 'required',
          //     'uang_dp' => 'required',
          //     'status' => 'required',
          //     'statuspes' => 'required',
          //     'dibayar'=>'required',
              
           ],
          [
              'nama.required' => 'Harus Diisi!',
              'jabatan_id.required' => 'Harus Diisi!',
              'alamat.required' => 'Harus Diisi!',
              'telepon.required' => 'Harus Diisi!',
              'jenis_kelamin.required' => 'Harus Diisi!',
              'email.required' => 'Harus Diisi!',
              'tanggal_masuk.required' => 'Harus Diisi!',
          ]);
        {
            $karyawans=new karyawan;
            $karyawans->id=$request->id;
           
            $karyawans->nama=$request->nama;
            $karyawans->jabatan_id=$request->jabatan_id;
            $karyawans->alamat=$request->alamat;
            $karyawans->jenis_kelamin=$request->jenis_kelamin;
            $karyawans->telepon=$request->telepon;
           
            $karyawans->email=$request->email;
            $karyawans->tanggal_masuk=$request->tanggal_masuk;
        //    dd($karyawans);
            $karyawans->save();
            return redirect()->route('karyawan')
            ->with('sukses', 'Data Karyawan berhasil tambahkan!');    
       }
  
          }
  
          
     
    public function destroy($id)
        {
        $karyawans = karyawan::findOrFail($id);
        $karyawans->delete();
         return redirect()->route('karyawan')
       ->with('message', 'Data Karyawan berhasil dihapus!');
         }

        

  
    public function update(Request $request, $id){
        
            DB::table('karyawans')->where('id',$id)->update([
           
            'jabatan_id'=>$request->jabatan_id
           
            
             ])
                ;
       return redirect()->route('karyawan')->with('sukses', 'Data Karyawan berhasil diubah!');
    
}

}
