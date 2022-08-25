@extends('layouts.master')
@section('title','Input Data Pemesan')
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4> Input Data Pemesan</h4>

        @if ($message = Session::get('message'))
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>×</span>
              </button>
              <p>{{ $message }}</p>
            </div>
          </div>
        @endif 

        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">

                


               
                <form action="{{ route('sablontambah') }}" method="GET" enctype="multipart/form-data"> 
                 
                    
                    <input type="hidden" name="statuspes" value="0">

                
                 <div class="box-body">
                   
                        
                         <div class="card-body">
                             <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="nama" @error('nama')
                                  class="text-danger"
                              @enderror>Nama Pemesan @error('nama')
                                  {{ $message }}
                              @enderror</label>
                              <input type="text"  class="form-control" name="nama" placeholder="Nama Pemesan" >
                            </div>
                        </div>

                       

                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="nohp" @error('nohp')
                                  class="text-danger"
                              @enderror>Nomer Whatsapp @error('nohp')
                                  {{ $message }}
                              @enderror</label>
                              <input type="text"  class="form-control" name="nohp" placeholder="Nomer Whatsapp" >
                            </div>
                        </div>

                      
                      
                        
                    
                     
                    <!-- /.box-body -->
                  


            </div>
        </div>
     
                </table>

            
                <center>
              <button type="submit" class="btn btn-primary btn-lg  fa fa-check">Proses Pesanan</button>
                </center>
            </div>
        </form>
        </div>
    </div>
</div>
 
@endsection
 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@push('page-scripts')
<script type="text/javascript">
   $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
</script>
@endpush