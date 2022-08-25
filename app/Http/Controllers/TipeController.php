<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\tipe;

class TipeController extends Controller

{
    //
    public function index(){
        $tipes= tipe::orderBy('id', 'DESC')->paginate(8);      
        return view('tipe.index', compact('tipes')); 
    }

    public function tambah(){
        return view('tipe.tambah');
    }


    public function simpan(Request $request){
        $this->validate($request,[
           
            'tipe'=>'required',
            'harga'=>'required',
          //     'uang_dp' => 'required',
          //     'kurang' => 'required',
          //     'uang_dp' => 'required',
          //     'status' => 'required',
          //     'statuspes' => 'required',
          //     'dibayar'=>'required',
              
           ],
          [
              'tipe.required' => 'Harus Diisi!',
              'harga.required' => 'Harus Diisi!',
          ]);
             {
            $tipes=new tipe;
            $tipes->id=$request->id;
            $tipes->tipe=$request->tipe;
            $tipes->harga=$request->harga;

            $tipes->save();
            return redirect()->route('tipe')
            ->with('message', 'Data Tipe Berhasil ditambahkan!');    
             }
  
            }

          public function destroy($id)
             {
              $tipes = tipe::findOrFail($id);
              $tipes->delete();
           return redirect()->route('tipe')
             ->with('message', 'Data Tipe berhasil dihapus!');
            }

            public function edit($id){
                $tipe = tipe::find($id);
                 return view('tipe.edit' ,['tipe'=>$tipe]);
                }

    
            public function update(Request $request, $id){
        
            DB::table('tipes')->where('id',$id)->update([
           
            'tipe'=>$request->tipe,
            'harga'=>$request->harga,
            
            ]);
            return redirect()->route('tipe')
            ->with('message', 'Data Tipe berhasil di Ubah!');
            
        }
}
