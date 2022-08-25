
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Input Data Kehadiran</title>

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
          <div class="section-header">
       
        
     
          </div>
        </section>

          <div class="row">
            <div class="col-md-12">
                <h4> Input Data Kehadiran Karyawan</h4>
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
                     
                    
                        <div class="alert alert-info">
                           Input Data Kehadiran Karyawan Pada Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
                        </div>
                        <div class="col-md-9">
                      <form action="{{ route('simpan-absensi') }}" method="POST"> 
                        @csrf
                      <button class="btn btn-success mb-3" type="submit" id="yes">Simpan</button>
                      <a href="{{ route('absensi') }}" class="btn btn-danger mb-3 ml-3"><i class="fas fa-back"></i> Batalkan</a>
                      <table class="table table-striped">
                          <tr>
                              <td class="text-center">No</td>
                              <td class="text-center">Nama</td>
                              <td class="text-center">jabatan</td>
                              <td class="text-center">jenis kelamin</td>
                              <td class="text-center" @error('hadir[]')
                              class="text-danger"
                              @enderror>Hadir @error('hadir')
                                {{ $message }}
                            @enderror</td>
                              <td class="text-center" >Lembur @error('lembur')
                                {{ $message }}
                            @enderror</td>
                          </tr>
                
                         
                           <?php $no=1; foreach($karyawan as $a) :?>
                              <tr>
                
                              
                      
                        <input type="hidden" name="karyawans_id[]" class="form-control" value="<?php echo $a->id?>">
                      
                        <input type="hidden" name="bulan[]" class="form-control" value="{{ $bulan }}">
                        <input type="hidden" name="tahun[]" class="form-control" value="{{ $tahun }}">
                        
                        <input type="hidden" name="jabatan_id[]" class="form-control" value="{{ $a->jabatan_id }}">
                        
                             
                                  <td><?php echo $no++?></td>
                                  <td><?php echo $a->nama?></td>
                                  <td><?php echo $a->jabatan['nama_jabatan']?></td>
                                  <td><?php echo $a->jenis_kelamin?></td>
                                 
                                  <td  ><input @error('hadir')
                                    class="text-danger"
                                    @enderror type="number" name="hadir[]"  class="form-control" placeholder="0" ></td>
                                  <td><input type="number" name="lembur[]" class="form-control" placeholder="0"></td>
                               
                          <?php endforeach; ?>
                      </table><br>
                      </form>
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



                   

     

