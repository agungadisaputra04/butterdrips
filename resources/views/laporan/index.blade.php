@extends('layouts.master')
@section('title','Riwayat ')
@section('content')

 <div class="section-body">
     <div class="row">
        <div class="col-11 col-md-11 col-lg-11">
            <br>
            <h4> -------------------------------------RIWAYAT DATA------------------------------------------</h4>
           
            <a href="{{ route('laporancetak') }}" class="btn btn-success"><i class="fas fa-print"></i>Cetak </a>
            @if ($message = Session::get('message'))
            <div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
            </div>
            @endif 
            <br>
            <br>
            <br>


            <h5> Data Riwayat Gaji Karyawan</h5>
            <table class="table table-responsive martop-sm table-striped table-bordered">
            <thead>
                <br>
            <th>No</th>
            <th>ID Karyawan</th>
            <th>Uang Komisi</th>
            <th>Uang Potongan</th>
            <th>Total</th>
            <th>Tanggal</th>
            
            
            </thead>
            <tbody>
            @php $i=1;@endphp
            @foreach ($laporangaji as $p)
            <tr>
            <td>{{ $i++ }}</td> 
            <td>{{ $p->karyawans_id}}</td>
            <td>Rp.{{ number_format($p->uang_komisi,0)}}</td>
            <td>Rp. {{number_format ($p->potongan_cuti,0)}}</td>
            <td>Rp.{{number_format ($p->total,0)}}</td>
            <td>{{ date('d M Y',strtotime($p->tanggal))}}</td>
           
            
            
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>

            <br>
            <br>
            
                
            <h5> Data Riwayat Sablon</h5>
            <table class="table table-responsive martop-sm table-striped table-bordered">
                <thead>
                    <br>
                <th>No</th>
                 <th>ID Tipe Sablon</th>
                 <th>Nama Pemesan</th>
                <th>Status Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                </thead>
                <tbody>
                @php $i=1;@endphp
                @foreach ($laporansablon as $p)
                <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $p->tipes_id}}</td>
                <td>{{ $p->nama}}</td>
                
                <td><span class="badge {{ ($p->status == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($p->status ==1) ? 'Complated' : 'Pending' }}</span></td>
                   <td><span class="badge {{ ($p->statuspes == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($p->statuspes ==1) ? 'Complated' : 'Pending' }}</span></td>
                
                <td>{{ $p->jumlah}} Pcs</td>
                <td>Rp.{{number_format( $p->total,0)}}</td>
                <td>{{ date('d M Y',strtotime($p->tanggal))}}</td>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>

        </div>
        </div>
     </div>
 
        @endsection

      