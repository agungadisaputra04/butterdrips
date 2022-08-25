@extends('layouts.master')
@section('title',' Data Kehadiran')
@section('content')



 
     <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <h4> Data Kehadiran </h4>
            {{-- @if (sizeof($jabatan)==5) --}}
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
                
            <div class="card mb-2">
                <div class="card-header bg-primary text-white">
                  Filter Data Kehadiran Karyawan
                </div>
                <div class="card-body">
                  <form action="{{ url('cari-absensi') }}" method="GET" class="form-inline">
                    @csrf
                    {{-- <div class="form-group mb-2">
                      <input type="hidden" class="form-control ml-3" name="tanggal" value="01">
                    
                    </div> --}}
                    <div class="form-group mb-2">
                      <label @error('bulan')
                      class="text-danger"
                  @enderror for="staticEmail2">Bulan @error('bulan')
                  {{ $message }}
              @enderror</label>
                      <select class="form-control ml-3" name="bulan">
                          <option value=""> Pilih Bulan </option>
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                      </select>
                    </div>
                    <div class="form-group mb-2 ml-5">
                      <label @error('tahun')
                      class="text-danger"
                  @enderror for="staticEmail2">Tahun @error('tahun')
                  {{ $message }}
              @enderror</label>
                      <select class="form-control ml-3" name="tahun">
                          <option value=""> Pilih Tahun </option>
                          <?php $tahun = date('Y');
                          for($i=2018;$i<$tahun+10;$i++) { ?>
                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php }?>
                      </select>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                   
                   
                    @if (count($absensis)==0)
                        
                     
           <?php
           if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
               $bulan = $_GET['bulan'];
               $tahun = $_GET['tahun'];
               $bulantahun = $tahun.$bulan;
           }else{
               $bulan = date('m');
               $tahun = date('Y');
               $bulantahun = $tahun.$bulan;
           }
              ?>
                  @if (Auth::user()->role == 1)
                    <a href="{{ url('tambah/'.$bulan.'/'.$tahun) }}" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran</a>
                    @endif
                    @endif
                    <?php
                    $a = count($absensis);
                    ?>  
                                
                    <?php
                    if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $bulantahun = $tahun.$bulan;
                    }else{
                        $bulan = date('m');
                        $tahun = date('Y');
                        $bulantahun = $tahun.$bulan;
                    }
                        ?>
                    @if(isset($absensis)==$a)

                    <a href="{{ url('cetakabsensi/'.$bulan.'/'.$tahun) }}" class="btn btn-warning mb-2 ml-3"><i class="fas fa-plus"></i> Export PDF</a>
                   
                   
                @endif 
                  </form>
                  </div>
                     </div>
                   </div>
                   
                  
              
                  
            @if ($absensis === 1)
                
            @else
                
           
           <?php
           if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
               $bulan = $_GET['bulan'];
               $tahun = $_GET['tahun'];
               $bulantahun = $tahun.$bulan;
           }else{
               $bulan = date('m');
               $tahun = date('Y');
               $bulantahun = $tahun.$bulan;
           }
              ?>   
            
                         <div class="alert alert-info">
                          <div class="col-md-12">
                             Menampilkan Data Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
                         </div>
                         </div>
                       
                     
                                        @if (isset($bulantahun)==1)
                                            
                                       
                                        <table class="table table-responsive martop-sm table-striped table-bordered">
                                          <thead>
                                              <br>
                                          <th>No</th>
                                          <th>Nama Karyawan</th>
                                          <th>Jabatan</th>
                                          <th>Jenis Kelamin</th>
                                          
                                        
                                          <th>Hadir</th>
                                          <th>Lembur</th> 
                                          </thead>
                                          <tbody>
                                          @php $i=1;@endphp
                                
                                          @foreach ($absensis as $data)
                                          <tr>
                                          <td>{{ $i++ }}</td>
                                          <td>{{ $data->karyawan['nama']}}</td>
                                          <td>{{ $data->karyawan->jabatan['nama_jabatan']}}</td>
                                          
                                          <td>{{ $data->karyawan['jenis_kelamin']}}</td>
                                        
                                      
                                          <td>{{ $data->hadir}} Hari</td>
                                          <td>{{ $data->lembur}} Hari</td>
                                
                                          </tr>
                                          @endforeach
                                          </tbody>
                                          </table> 
                                          @endif
                                          @endif
            @if (Auth::user()->role == 1)
            @if(count($absensis)==0)
            <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data Masih Kosong, Silakan Input Data Kehadiran Pada Bulan dan Tahun Yang Anda Pilih</span>
            @endif
            @endif
            @if (Auth::user()->role == 2)
            @if(count($absensis)==0)
            <span class="badge badge-danger"><i class="fas fa-info-circle"></i> DATA DIBULAN INI MASIH KOSONG ATAU ADMIN BELUM MENGINPUT DATA</span>
            @endif
            @endif
           
            </div>
        </div>
      
@endsection


