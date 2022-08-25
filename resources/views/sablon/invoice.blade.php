@extends('layouts.master')
@section('title','Invoice Pemesanan')
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <br>
      <center>  <h3> Invoice Pemesanan</h3>  </center> 

        @if ($message = Session::get('message'))
        <div class="alert alert-warning alert-dismissible show fade">
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
                </p>
            </div>
            <div class="box-body">

                


               
                <form action="{{ route('sablon-simpan') }}" method="POST" enctype="multipart/form-data"> 
                 @csrf
                    
                 
                
                 <div class="box-body">
                   
                        
                         <div class="card-body">
                             
                             <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                                <center> <b> <h5 class="" for="nama" @error('nama')
                                  class="text-danger"
                              @enderror>Nomer Pesanan dan Nama Pemesan @error('nama')
                                  {{ $message }}
                              @enderror</h5></b></center>
                              <input type="hidden"  class="form-control" name="nama" value="{{ $nama }}" ><center><i><h5 class="text-primary">{{ $kode }}</h5></i></center><center><h5 class="text-primary">{{ $nama }}</h5></center>
                              <input type="hidden"  class="form-control" name="kode" value="{{ $kode }}" >
                            </div>
                        </div>
                        </div>
                  

                       
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center> <label for="nohp" @error('nohp')
                                  class="text-danger"
                              @enderror>Nomer Whatsapp @error('nohp')
                                  {{ $message }}
                              @enderror</label></center>
                              <input type="hidden"  class="form-control" name="nohp" value="{{ $nohp }}" > <center><h5 class="text-primary">{{ $nohp }}</h5></center>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1">
                           <div class="form-group">
                               <left> <label for="nama" @error('nama')
                                 class="text-danger"
                             @enderror>No @error('nama')
                                 {{ $message }}
                             @enderror</label></left>
                             <br>
                             <left>  
                               <a><b>
                              
                             @php
                             
                                 foreach ($tip as $key => $va ) {
                                    echo $key + 1, '<br>';
                                 }
                                 $j = count(array_keys($id_tipe))

                             @endphp
                           </b>  </a>
                             </left>
                           
                         
                          
                           </div>
                       </div>
                           
                         <div class="col-md-4">
                            <div class="form-group">
                                <left> <label for="nama" @error('nama')
                                  class="text-danger"
                              @enderror>Tipe Sablon @error('nama')
                                  {{ $message }}
                              @enderror</label></left>
                              <br>
                              <left>  
                                <a><b>
                              @php
                              
                                  foreach ($tip as $key ) {
                                  echo $key, '<br>';
                                  }
                                  $j = count(array_keys($id_tipe))
                              @endphp
                            </b>  </a>
                              </left>
                              @for ($i = 0; $i < $j; $i++)
                              <input type="hidden"  class="form-control" name="tipes_id[]" value="{{$id_tipe[$i]}}">
                              @endfor
                            </div>
                        </div>
                  
                      
                            <div class="col-md-3">
                               <div class="form-group">
                                   <center> <label for="nama" @error('nama')
                                     class="text-danger"
                                 @enderror>Harga  @error('nama')
                                     {{ $message }}
                                 @enderror</label></center>
                                
                                 <center>  
                                   <a><b>
                                 @php
                                 
                                     foreach ($satuan as $key ) {
                                     echo "Rp. ",number_format($key), '<br>';
                                     }
                                      $h = count(array_keys($satuan))
                                 @endphp
                                 </b></a>
                                 </center>
                                 @for ($i = 0; $i < $h; $i++)
                                 <input type="hidden"  class="form-control" name="satuan[]" value="{{$satuan[$i]}}" >
                                 @endfor
                               </div>
                           </div>
                       
                       
                        <div class="col-md-2">
                            <div class="form-group">
                               <right> <label for="nohp" @error('nohp')
                                  class="text-danger"
                              @enderror>Jumlah Pesanan @error('nohp')
                                  {{ $message }}
                              @enderror</label></right>
                              <br>
                             <right>
                                <a><b>
                              @php
                              
                                  foreach ($jumlah as $key ) {
                                  echo $key ,'.',  'Pcs','<br>';
                                  }
                                  $h = count(array_keys($jumlah))
                              @endphp
                              
                                </b> </a>
                             </right>
                              @for ($i = 0; $i < $h; $i++)
                              <input type="hidden"  class="form-control" name="jumlah[]" value="{{$jumlah[$i]}}" >
                              @endfor
                            </div>
                        </div>
                    
                         
                  

                       
                       
                        <div class="col-md-2">
                            <div class="form-group">
                                <div align="right"> <label for="nohp" @error('nohp')
                                  class="text-danger"
                              @enderror>Total  @error('nohp')
                                  {{ $message }}
                              @enderror</label>
                           <br>
                             
                                <a><b>
                              @php
                              
                                  foreach ($total as $key ) {
                                    echo "Rp. ",number_format($key), '<br>';
                                  }
                                  $j = count(array_keys($total))
                              @endphp
                              
                                </b> </a>
                            </div>
                              @for ($i = 0; $i < $j; $i++)
                              <input type="hidden"  class="form-control" name="total[]" value="{{$total[$i]}}" >
                              @endfor
                            </div>
                        </div>
                        </div>


                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div align="right " style="100px" > <label ><b>GrandTotal </b></label>
                           <br>
                            
                                <a><b>
                              @php
                              
                                
                                    echo "Rp. ",number_format($hasil), '<br>';
                                
                               
                              @endphp
                              
                                </b> </a>
                            </div>
                             
                              <input type="hidden"  class="form-control" name="grandtotal" value="{{$hasil}}" >
                           
                            </div>
                        </div>
                        </div>
                    
                         <div class="col-md-6" id="att">
                            <div class="form-group">
                              <label class="text-warning">ATTENTION !</label><br>
                              <label for="nohp">DP Minimal Harus 50% Dari Grandtotal !</label><br>
                              <label >50% Dari Grandtotal :
                                 
                              </label><br>
                              <label class="text-success" id="lima">
                                 
                              </label>
                              
                            </div>
                        </div>
                         <div class="col-md-6" id="lu">
                            <div class="form-group">
                              <label class="text-warning">ATTENTION !</label><br>
                              <label for="nohp">Tidak Perlu Mengisikan Pembayaran</label><br>
                              <label >Pembayaran    </label> <label class="text-success" > LUNAS </label> <label >Wajib Membayar Sesuai Grandtotal </label><br>
                              <label class="text-success" id="lima">
                                 
                              </label>
                              
                            </div>
                        </div>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="nohp">Status Pembayaran</label>
                              <select name="status" class="form-control "  id="status" >
                               
                                   
                                    <option value="3">-- Pilih Status --</option>
                                    <option value="0" class="dp">Belum Lunas</option>
                                    <option value="1">Lunas</option>
                               
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="disain">Sample Design</label>
                              <input type="file"  class="form-control" name="disain">
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-stripped tipee">
                                    <tbody>
                                        <tr id="dp">
                                            <th > Jumlah Dibayar/DP</th>
                                            <td> :</td>
                                            <td @error('uang_dp')
                                                {{ $message }}
                                            @enderror>
                                                <input type="number" class="form-control" name="uang_dp" id="uang"  >
                                                <input type="hidden" class="form-control" name="kurang"   >
                                                <input type="hidden" name="statuspes" value="0"  >
                                            </td>
                                        </tr>
    
        
                                        <tr id="dibayar">
                                            <th> Dibayar</th>
                                            <td> :</td>
                                            <td class="dibayar" name="dibayar" >
                                              
                                            </td>
                                        </tr>
                                        <tr id="kurang">
                                            <th> Biaya Pelunasan</th>
                                            <td> :</td>
                                            <td class="kurangs" name="kurangs" >
                                              
                                            </td>
                                        </tr>
        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                        
                    
                     
                    <!-- /.box-body -->
                  


            </div>
        </div>
     
                </table>

            
<center>
              <button type="submit" id="pr" class="btn btn-primary btn-lg  fa fa-check">Simpan</button>
</center>
            </div>
        </form>
        </div>
    </div>
</div>
 
@endsection
 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@push('page-scripts')
<script type="text/javascript">
   $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })


        $(document).ready(function(){
            $("select[name='status']").focus();
    });
          $(document).ready(function(){
            $("#dibayar").hide();
            $("#kurang").hide();
            $("#att").hide();
            $("#lu").hide();
            $("#dp").hide();
            $("#pr").hide();
           
                
            var total = parseInt($("input[name='grandtotal']").val());
          
             var kr = total / 2;
            
             $("#lima").text(kr);
            
             $("#status").change(function(){
            var total = parseInt($("input[name='grandtotal']").val());
            var val = $(this).val();
            if (val == "1") {
                $("input[name='uang_dp']").val(total);
                $("#dibayar").show();
                $("#kurang").hide();
                $("#dp").hide();
                $(".dibayar").text(total);
                $("input[name='kurang']").val(0);
                $("#att").hide();
                $("#lu").show();
                $("#pr").show();
            } else{
             
                $("input[name='uang_dp']").val(0);
                $("#lu").hide();
                $("#att").show();
                $("#kurang").show();
                $("#dibayar").hide();
                $("#dp").show();
               
                $("#pr").show();
              
                $("input[name='uang_dp']").keyup(function(){
            var total = parseInt($("input[name='grandtotal']").val());
            var uang_dp = parseInt($(this).val());
             var finis = total - uang_dp;
             var kr = total / 2;
             $(".kurangs").text(finis);
             $("#lima").text(kr);
            $("input[name='kurang']").val(finis);
          
           
           
        })
            }
        })
        });  

        $(document).ready(function(){
            $("#status").change(function(){
                var val = $(this).val();
                if (val == "3") {
                    $(".btn-lg").hide();   
                }
            })

        })

        $("button[type='submit']").click(function(e){
            var kurangs = parseInt($("input[name='kurang']").val());
            var gr = parseInt($("input[name='grandtotal']").val());
            var di = parseInt($("input[name='uang_dp']").val());
            var lima = gr / 2;
        
        if( kurangs < 0  ){
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Uang melebihi biaya total !'
        }) 
        }
        if( di < lima ){
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Pembayaran minimal 50% !'
        }) 
        }

        }
        )
         
       
</script>
@endpush