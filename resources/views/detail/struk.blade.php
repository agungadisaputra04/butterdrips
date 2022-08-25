<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Pesanan</title>
    <style>
        .container {
            width: 300px;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }
        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }
        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 30px;">
            <h2>Sablon ButterDrips</h2>
            <small>Jl. Harjuno No.32 Manisreo Sembego. Rt:003 Rw::039 Maguwoharjo, Depok Sleman, Yogyakarta
            </small>
        </div>
        <hr>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No Pesanan </li>
                    <li>Status Pesanan </li>
                    <li>Status Bayar </li>
                    <li>Tanggal Pesan </li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    
                 
                    <li> {{ $struk->kode }} </li>
                    <li>{{ $struk->statuspes == 1 ? 'Slesai' : 'Belum Slesai' }}</li>
                    <li>{{ $struk->status == 1 ? 'Lunas' : 'Belum Lunas' }}</li>
                    <li> {{ date('d M Y',strtotime($struk->tanggal)) }} </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:left;">
            <div style="text-align: center;">Nama Pemesan</div>
           
          
        </div>
        <div class="flex-container" style="text-align: center; margin-top: 10px;">
          
            <div>{{ $struk->nama }} </div>
            
         
         
        </div>
       
        
       
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:left;">
            <div style="text-align: center;">Tipe Salon</div>
           
          
        </div>
        <div class="flex-container" style="text-align: center; margin-top: 1px;">
        @foreach ($struk->pesannih as $apa)
            
        <div>{{ $apa->tiper->tipe }} </div>
        @endforeach
            
         
         
        </div>
        <hr>
      
        <div class="flex-container" style="text-align: center; margin-top: 1px;">
        @foreach ($struk->pesannih as $ya)
            
        <div>{{ $ya->jumlah }} pcs</div>
        @endforeach
            
         
         
        </div>
        <hr>
        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div></div>
            <div>
                <ul>
                    <li>Bayar/Dp</li>
                    <li>Total</li>
                    <li>Pelunasan</li>
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                    <li>Rp {{ number_format($struk->uang_dp,0) }} </li> 
                     <li>Rp {{ number_format($struk->grandtotal,0) }}</li>
                    <li>Rp {{ number_format($struk->kurang,0) }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="header" style="margin-top: 10px;">
            <h3>Terimakasih</h3>
            <p>Sudah percayakan kami</p>
            <small>Butterdrips</small>
            <p>More Info: 085881232195</p>
        </div>
    </div>
    </div>
    
</body>
</html>
{{-- <script type="text/javascript">
	window.print();
</script> --}}