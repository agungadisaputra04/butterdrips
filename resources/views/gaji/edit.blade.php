@extends('layouts.master')
@section('content')

 <div class="section-body">
     <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
        
            <div class="card">

                <form action="{{ route('gajiupdate',$gaji->id) }}" method="POST"> 
                @csrf
                    <div class="card-body">

                          
            
             

                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Uang Komisi</label>
                            <input type="number"name="uang_komisi" value="{{ $gaji->uang_komisi }}" class="form-control">
                         </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Uang Potongan</label>
                                <input type="number"name="potongan_cuti" value="{{ $gaji->potongan_cuti }}" class="form-control">
                            </div>
                        </div>
                </div>
            </div>
<div class="card-footer text-right">
    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
    <button class="btn btn-primary " type="reset">reset</button>
</div>
</form>
            
        </div>
     </div>
 </div>
@endsection



