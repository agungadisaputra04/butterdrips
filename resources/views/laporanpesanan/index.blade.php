@extends('layouts.master')
@section('title','Laporan Pesanan')
@section('content')
 
<div class="section-body">
    <div class="row">
       <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
                
               <form action="{{ url('cari-laporan') }}" method="GET"> 
                    @csrf
                    
                   <div class="card-body">     
                    <h4>Cari Pesanan Bedasarkan Tanggal</h4>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dari Tanggal</label>
                                    <input name="daritanggal" id="daritanggal"  placeholder="Masukan dari Tanggal"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input name="sampaitanggal"  placeholder="Masukan Sampai Tanggal" id="sampaitanggal" class="form-control">
                            </div>
                        </div>
                    </div>
                  
                    <div class="card-footer text-left ">
                    <button class="btn btn-primary mr-1" type="submit">Cari pesanan</button>
                      </div>
                    </form>
                    </div>
                    
                    </div>
                    @if(isset($pesanan))
                        <div class="row">
                         
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <h5 class="card-header"> Hasil Pencarian: dari   {{ $dari }}  sampai  {{ $sampai }}</h5>
                                     <div class="card-footer text-left ">
                                    <a href="{{ url('export/'.$dari.'/'.$sampai) }}" class="btn btn-success col-md-2 "><i class="fa fa-download"></i> Export PDF</a>
                                <table class="table table-stripped">
                                   
                                    <thead class="thead-light">
                                     
                                        <tr>

                                            <th>#</th>
                                            <th>No pesanan</th>
                                            
                                            <th>Nama</th>
                                            <th>Status Pesanan</th>
                                         
                                        
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesanan as $e=> $pes)
                                        <tr>
                                            <td>{{ $e+1 }}</td>
                                            <td>{{ $pes->kode }}</td>
                                         
                                            <td>{{ $pes->nama }}</td>
                                            <td><span class="badge {{ ($pes->statuspes == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($pes->statuspes ==1) ? 'Slesai' : 'Belum Slesai' }}</span></td>
                                           
                                            
                                            <td>Rp. {{ number_format($pes->grandtotal )}}</td>
                                           </tr>

                                        @endforeach
                                       
                                        <tr>
                                            <hr />
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b><i>Total Pendapatan</i></b></td>
                                            <td > <b><i>Rp. {{number_format( $uangmasuk) }}</i></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    @endisset
                    @endsection
                    

@push('page-scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('#daritanggal').datepicker({
         startDate: '-90d'
            });
    
            $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('#sampaitanggal').datepicker({
         startDate: '-90d'
            });

    
})
</script>
@endpush()