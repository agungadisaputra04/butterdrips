<!DOCTYPE html>
<HTml lang="en">

<head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UAcompatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
                table.static{
                    position: relative;
                    border: 2px solid #543535;
                }
                </style>
                <title> CETAK LAPORAN</title>


</head>

<body>
    <div class="form-group">
        <p align="center"><h2 align="center">Riwayat Semua Pesanan Sablon Dan Gaji </h2></p>
        <table class="static" align="center" rules="all" border="2px" style="width: 95%;">
        </table>
    <p >ButterDrips</p>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="form-group">
        <p align="center"><b>Riwayat Gaji Pegawai</b></p>
        <table class="static" align="center" rules="all" border="50px" style="width: 95%;">
           
            
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
    </div>
    
            
            
            
              
            <br>
            <br>
            <div class="form-group">
                <p align="center"><b>Riwayat Pesanan Sablon</b></p>
                <table class="static" align="center" rules="all" border="50px" style="width: 95%;">
                <th>No</th>
                 <th>ID Tipe Sablon</th>
                 <th>Nama Pemesan</th>
                <th>Status Pembayaran</th>
                <th>Status Pesanan</th>
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
            
   
</body>

<!-- untuk langsung print -->
<script type="text/javascript">
    window.print();
    </script>
</HTml>