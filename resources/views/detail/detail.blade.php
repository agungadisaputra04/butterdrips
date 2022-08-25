
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Detail Pesanan</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      
      @include('layouts.header')
      @include('layouts.sidebar')

      

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
       
        
     
          </div>
        </section>

          <div class="row">
            <div class="col-md-12">
                <h4> Detail Pesanan Sablon</h4>
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
                        <a href="{{ url('sablon') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Kembali</a>
                        <a href="{{ url('dashboard') }}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-rocket"></i>Dashboard</a>
                        <a href="{{ route('struk',$detail->id) }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-print"></i>Cetak</a>
                        </p>
                      
                    </div>
                    <div class="box-body">
                        
                       <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                               
                                    
                                 <tr>     
                                    <th>Nama Pemesan</th>
                                    <td>:</td>
                                    <td>{{ $detail->nama }}</td>

                                  
                               <tr>   
                                     <th>Nomer Pesanan</th>
                                    <td>:</td>
                                    <td>{{ $detail->kode }}</td> 

                                    <th>Nomer Telphone</th>
                                    <td>:</td>
                                    <td>{{ $detail->nohp }}</td>
                                </tr> 

                                

                                <tr>   
                                    <th>Jumlah Bayar/Uang DP</th>
                                   <td>:</td>
                                   <td>Rp.{{ number_format($detail->uang_dp,0) }}</td> 

                                   <th>Biaya Pelunasan</th>
                                   <td>:</td>
                                   <td>Rp. {{ number_format($detail->kurang,0 )}}</td>
                               </tr> 

                               <tr>   
                                <th>Total Biaya </th>
                               <td>:</td>
                               <td>Rp.{{ number_format($detail->grandtotal,0) }}</td> 

                               <th>Tanggal Pesanan</th>
                               <td>:</td>
                               <td> {{ ($detail->tanggal )}}</td>
                           </tr> 

                           

                           <tr>
                            <th>Status Pembayaran</th>
                            <td>:</td>
                            <td><span class="badge {{ ($detail->status == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($detail->status ==1) ? 'Lunas' : 'Belom lunas' }}</span></td>
                                

                           <th>Status Pesanan</th>
                               <td>:</td>
                               <td><span class="badge {{ ($detail->statuspes == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($detail->statuspes ==1) ? 'Lunas' : 'Belom lunas' }}</span></td>
                        </tr>

                        <tr>

                        <th>Sample Design</th>
                               <td>:</td>
                               <td> 
                                   <a href="{{asset('img/'. $detail->disain ) }}" target="_blank" rel="noopener noreferrer">Lihat Design</a>
                               </td>
                           </tr> 

                        

                            </thead>
                            <tbody>
                                <tr>
                                    <th>

                                    </th>
                                </tr>
                            </tbody>
                        </table>
                       </div>
                       <div class="table-responsive">
                        <table class="table ">
                            <thead>
                               
                                  <tr>  
                                    
                                   <th>Tipe Sablon</th>
                                   <th>Harga</th>
                                   <th>Jumlah Pesanan</th>
                                   <th>Total </th>
                                  </tr>
                        

                            </thead>
                            <tbody>
                              @foreach($detail->pesannih as $detail )
                                <tr>
                                    <td> {{ $detail->tiper->tipe }}</td>
                                    <td> {{number_format($detail->satuan) }}</td>
                                    <td> {{ $detail->jumlah }} pcs</td>
                                    <td> {{ number_format($detail->total) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
         
        
         
       

        </section>
      </div>
      
                  
                   <!-- FOOTER -->

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> est 2016 <a href="">Butterdrips</a>
        </div>
        <div class="footer-right">
         
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
 <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
 
  
</body>
</html>


  

                   

     
 