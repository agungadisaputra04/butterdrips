@extends('layouts.master')
@section('content')

 <div class="section-body">
     <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
        
            <div class="card">

            <form action="{{ route('karyawansimpan') }}" method="POST"> 
                @csrf
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama"  class="form-control">
                                    
                                   </div>
                                </div>
                            </div>

             
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <select name="jabatan_id"  class="form-control">
                                        @foreach ($jabatan_id as $kr)
                                                <option value="{{ $kr->id }}">{{ $kr->id}}</option>
                                            @endforeach
                                </select>
                                </div>
                                </div>
         
             
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>alamat</label>
                        <input type="text"name="alamat"  class="form-control">
                        
                       </div>
                    </div>
                </div>
         
                
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                    
                             <label>jenis kelamin</label><br>
                                     <select name="jenis_kelamin"  class="form-control">
                       
                                        <option>--PILIH JENIS KELAMIN--</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                        
                                        </select>
                        </div>
                     </div>
     

                <div class="col-md-6">
                    <div class="form-group">
                        <label>telepon</label>
                        <input type="number"name="telepon" class="form-control">
                            </div>
                        </div>
                    </div>
                   
     
        
        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>email</label>
                                    <input type="email"name="email" class="form-control">
                                            </div>
                                    </div>
                   

                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                                    <input type="text"name="tanggal_masuk" id="tanggal_masuk" class="form-control">
                        </div>
                       </div>
                   </div>
                


            <div class="card-footer text-right">
                <button class="btn btn-primary mr-2" type="submit">Simpan</button>
                <button class="btn btn-warning " type="reset">reset</button>
            </div>
        </form>
            </div>
        </div>
     </div>
 </div>
@endsection

                  

@push('page-scripts')
<script type="text/javascript">
    $(document).ready(function(){

    
            $.fn.datepicker.defaults.format = "dd/mm/yyyy";
        $('#tanggal_masuk').datepicker({
         startDate: '-30d'
            });

    
})
</script>
@endpush()



