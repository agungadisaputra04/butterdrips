@extends('layouts.master')
@section('title','Daftar Pesanan')
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4> Daftar Pesanan Sablon</h4>

        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible show fade">
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

                    <button class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i> Filter Tanggal</button>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                <table class="table table-stripped myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomer Pesanan</th>
                           
                            <th>Nama</th>
                            <th>Total Biaya</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th>Tanggal</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0;@endphp
                          @foreach ($sablons as $p)
                            <tr>
                                <td>{{ $sablons->firstItem()+$i++}}</td>
                                <td>{{ $p->kode }}</td>
                                
                                <td>{{ $p->nama }}</td>
                                <td>{{ number_format($p->grandtotal )}}</td>

                                <!--membuat kondisi satu baris dimana jika field status = 1 maka cetak sucses jika tidak maka cetak warnng-->
                                <td><span class="badge {{ ($p->status == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($p->status ==1) ? 'Lunas' : 'Belom Lunas' }}</span></td>
                                <td><span class="badge {{ ($p->statuspes == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($p->statuspes ==1) ? 'Slesai' : 'Belom Slesai' }}</span></td>
                                <td>{{date('d M Y',strtotime($p->tanggal)) }}</td>
                                
                                    <td><div style="width:60px">
                                        <a href="{{ route('sablondetail', $p->id) }}" class="btn btn-primary" 
                                            > <i class="fa fa-eye"></i>
                                           


                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $sablons->links() }}
               </div>
            </div>
        </div>
    </div>
</div>
 <!-- modal tanggal-->
 <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
      <div class="modal-content bg-gradient-danger">
   
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
   
        <div class="modal-body">
   
          <form role="form" method="GET" action="{{ url('sablon/filter') }}">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Dari Tanggal</label>
                <input class=" form-control"  id="dari" value="{{ $dari }}" name="dari" >
                  
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Sampai Tanggal</label>
                <input class=" form-control"   id="sampai" value="{{ $sampai }}" name="sampai" >
              </div>
            </div>
            <!-- /.box-body -->
   
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Cari Pesanan</button>
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
 
        //btn filter
        $('.btn-filter').click(function(e){
            e.preventDefault();
            $('#modal-filter').modal();
       
        })

        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('#dari').datepicker({
         startDate: '-60d'
            });
    
            $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('#sampai').datepicker({
         startDate: '-60d'
            });
    })
</script>
 
@endpush()