<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jabatan;

class JabatanController extends Controller
{
    public function index(){
        $jabatan= jabatan::orderBy('id', 'DESC')->get();      
        return view('jabatan.index', compact('jabatan')); 
        }

        public function simpan(Request $request)
        {
          
           $jabatan  = new jabatan;
           $jabatan ->nama_jabatan = $request->nama_jabatan;
           $jabatan ->gaji_pokok = $request->gaji_pokok;
           $jabatan ->lembur = $request->lembur;

           $jabatan->save();

           return redirect()->back();
        }
        public function edit($id){
        $jabatan = jabatan::find($id);
         return view('jabatan.edit' ,['jabatan'=>$jabatan]);
        }

        public function update(Request $request, $id)
        {
           jabatan::where('id',$id)->update(['nama_jabatan' => $request->nama_jabatan, 'gaji_pokok' => $request->gaji_pokok, 'lembur'=>$request->lembur]);

           
        }
}
