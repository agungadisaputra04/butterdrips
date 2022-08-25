<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Butterdrips</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <link rel="stylesheet" href="sweetalert2.min.css">
  @stack('page-styles')
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

          {{-- @if ($message = Session::get('message'))
          <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                <p>{{ $message }}</p>
              </div>
            </div>
          @endif  --}}

          <div class="section-header">
           
        
     <br>
     <br>
     
              <h5>Dashboard {{ Auth::user()->name }}</h5>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-10">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Daftar Karyawan</h4>
                     
                    </div>
                    <div class="card-body">
                    </thead>
                   {{ $beranda }} 
                    </div>
                  </div>
                </div>
              </div>
  
              
              @if (Auth::user()->role == 1)
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                     
                      <h4>Daftar Tipe Sablon</h4>
                    </div>
                    <div class="card-body">
                      {{ $tipe }} 
                    </div>
                  </div>
                </div>
              </div>
              @endif
              
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pendapatan Hari ini </h4>
                    </div>
                    <div class="card-body">
                      Rp. {{number_format($tot_pendapatan,0)}}
                    </div>
                  </div>
                </div>
              </div>


              
                <div class="col-lg-3 col-md-6 col-12 col-sm-12">
                  <div class="card card-statistic-1">
                  <div class="card">
                    <div class="card-header">
                      <h4></h4>
                    </div>
                    <div class="card-body">
                        Be Cool With ButterDrips!
                        
                    </div>
                  </div>
                </div>
                </div>
                @if (Auth::user()->role == 2)
                    
                
                <div class="col-lg-3 col-md-6 col-12 col-sm-12">
                  <div class="card card-statistic-1">
                  <div class="card">
                    <div class="card-header">
                      <h4></h4>
                    </div>
                    <div class="card-body">
                     You are Logged as {{ Auth::user()->name }}
                        
                    </div>
                  </div>
                </div>
                </div>
                @endif
              
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="card card-statistic-2 center">
                        <div class="card-stats center">
                          <div class="card-stats-title">PO Statistics - Bulan {{ $bulantahun->month }} Tahun {{ $bulantahun->year }}
                            
                          </div>
                          <div class="card-stats-items">
                            <div class="card-stats-item">
                              <div class="card-stats-item-count">{{ $pending }}</div>
                              <div class="card-stats-item-label"> Belum Lunas</div>
                            </div>
                          
                            <div class="card-stats-item">
                              <div class="card-stats-item-count">{{ $complated }}</div>
                              <div class="card-stats-item-label">Lunas</div>
                            </div>
                          </div>
                          <div class="card-stats-items">
                            <div class="card-stats-item">
                              <div class="card-stats-item-count">{{ $pend }}</div>
                              <div class="card-stats-item-label">Belum Slesai </div>
                            </div>
                          
                            <div class="card-stats-item">
                              <div class="card-stats-item-count">{{ $comp }}</div>
                              <div class="card-stats-item-label">Slesai</div>
                            </div>
                          </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                          <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Pesanan Bulan Ini</h4>
                          </div>
                          <div class="card-body">
                            {{ $sablon }} 
                          </div>
                        </div>
                      </div>
                    </div>
                   
             

              <div class="col-lg-6 col-md-10 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Butter Drips</h4>
                  </div>
                    <div class="card-body">
                     <img src="assets\img\2.jpg" alt="butterdrips1" height="450" width="500">
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
  {{-- @include('sweet::alert') --}}
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
 
</body>
</html>
@if ($message = Session::get('message'))
@stack('page-styles')
<script>
 
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 10000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Login Berhasil'
})

</script>

  @endif
            

     