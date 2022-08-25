@extends('layouts.master')
@section('title','Tambah Tipe Sablon')
@section('content')

 <div class="section-body">
     <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            
        <h4> Tambah Data Tipe Sablon</h4>
        
            <div class="card">

                 <form action="{{ route('tipesimpan') }}" method="POST"> 
                @csrf
                    <div class="card-body">

                        

            
                      <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('tipe')
                                    class="text-danger"
                                    @enderror>Tipe sablon @error('tipe')
                                      {{ $message }}  
                                    @enderror</label>
                                    <input type="text"name="tipe"  class="form-control" placeholder="nama tipe sablon">
                                </div>
                            </div>
                     </div>

                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('harga')
                            class="text-danger"
                            @enderror>Harga @error('harga')
                                {{ $message }}
                            @enderror</label>
                            <input type="number" name="harga"  class="form-control" placeholder="harga per pcs">
                        </div>
                    </div>
             </div>

           

</div>
<div class="card-footer text-right">
    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
    <button class="btn btn-warning " type="reset">Reset Kolom</button>
</div>
</form>
            
        </div>
     </div>
 </div>
@endsection
@endsection



