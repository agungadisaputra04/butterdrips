<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
            /* CSS for Zebra Table in index.html */
            .zebra-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 3px 1px rgb(143, 194, 218))));
            overflow: hidden;
            border:10px solid #fff;
            }
            .zebra-table th,.zebra-table td{
            vertical-align: top;
            padding:12px 20px;
            text-align: center;
            margin:2px;
            }
            .zebra-table tbody tr:nth-child(odd) { /* Make table like zebra */
            background:rgb(61, 152, 175);
            
            }
            .apa-table{
                text-align: right;
                width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 3px 1px rgb(143, 194, 218))));
            overflow: hidden;
            border:5px solid #fff;
            }
            .apa-table th,.apa-table td{
            vertical-align: top;
            padding:5px 50px;
            text-align: right;
            margin:0px;
            }/* End CSS for Zebra Table in index.html */
</style>
<body>
    <div class="row">
        <div class="col-xs-12">
            <h2>
                <center>
                    <b><i>Butterdrips</i></b>
                </center>
            </h2>
            <h3>
                <center>
                    <b><i>Laporan Pesanan Sablon </i></b>
                </center>
            </h3>
            <h5>
                <center>
                    <b><i>Jl. Harjuno No.32 Manisreo Sembego. Rt:003 Rw::039 Maguwoharjo, Depok Sleman, Yogyakarta</i></b>
                </center>
            </h5>
        </div>
    </div>
    <hr />
  
        <div class="row">
            <div class="col-xs-12">
            <table class="table ">
                <tbody>
                    <tr>
                        <th>PERIODE</th>
                        <td>:</td>
                        <td>{{ date('d M Y',strtotime($dari)) }} Sampai {{ date('d M Y',strtotime($sampai)) }}</td>
                    </tr>

                </tbody>
            </table>
            </div>
        </div>
                <hr>
                
                <table class=”zebra-table“>
                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Nomer Pesanan</th>
                   
                    <th>Nama Pemesan</th>
                    <th>Status Pesanan</th>
                    <th>Tanggal Pesan</th>
                     <th>Jumlah</th>       
                     <th>Pemasukan</th>
                   
                    </tr>
                    </thead>
                    <tbody class="zebra-table">
                        @foreach ($pesanan as $e=> $pes)
                       <tr>
                        <td>{{ $e+1 }}</td>
                        <td>{{ $pes->kode }}</td>
                       
                        <td>{{ $pes->nama }}</td>
                        <td><span class="badge {{ ($pes->statuspes == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($pes->statuspes ==1) ? 'Slesai' : 'Belum Slesai' }}</span></td>
                        
                        <td> {{ date('d M Y',strtotime($pes->tanggal)) }}</td>
                        <td> {{ $pes->jumlah }} Pcs</td>
                        
                        <td>Rp. {{ number_format($pes->grandtotal )}}</td>
                        @endforeach
                    
                    </tr>
                    </tbody>
                    <hr>
                   
                    </table>
                    <table class="apa-table">
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5" text-align="right"><b><i>Total Pendapatan</i></b></td>
                            <td><b><i>:</i></b></td>
                            <td><b><i>Rp.{{number_format($uangmasuk)}}</i></b></td>
                        </tr>
                    </tfoot>
                    <hr>
                </table>
                <br>
                <div class="row">
                    <div class="col-xs-4">
                        <right>
                            <p>Admin</p>
                            <br>
                            <br>
                        ...................
                        </right>
                    </div>
                </div>

</body>
</html>