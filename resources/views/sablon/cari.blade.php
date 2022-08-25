@extends('layouts.master')
@section('title','Cari Pesanan')
@section('content')
 
<div class="row">
    <div class="col-md-12">
        

        <h4> Cari Pesanan Sablon</h4>

        @if ($message = Session::get('message'))
        <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
        </div>
        @endif 
       
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('dashboard') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Kembali</a>
                </p>
            </div>
            <div class="box-body">

                <form action="{{ url('sablonupdate/{id}') }}" method="POST"> 
                    @csrf
                    
                   
                    <input type="hidden" name="uang_dp" id="uang_dp" value="0">
                    <input type="hidden" name="pelunasan" id="id" value="0">
                    <input type="hidden" name="kode" id="kode" value="0">
                    <input type="hidden" name="id" id="id" value="0">
                    <input type="hidden" name="total" id="total" value="0">
                    
                    <input type="hidden" name="kurang" id="kurang" value="0">
                    
               
               
                    <div class="box-body">
                        <div class="col-md-4">
                      <div class="form-group">
                        <label @error('kode')
                            class="text-danger"
                        @enderror>Nomer Pesanan @error('kode')
                      | {{ $message }}
                        @enderror</label>
                        <input type="text" placeholder="Masukan Nomer Pesanan" autocomplete="off" class="form-control" name="kode"  >
                      </div>
                   
                     
                    <!-- /.box-body -->
                 


            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-stripped tipee">
                    <thead>
                        <tr>
                         
                            <th>Nomer Pesanan</th>
                            <th>Nama Pemesan</th>
                            <th>Jumlah </th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th>Uang DP Dibayar</th>
                            <th>Total Biaya</th>
                            <th>Biaya Pelunasan</th>
                        </tr>
                    </thead>
                    <tbody class="getpesanan">

                    </tbody>

                </table>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped tipee">
                            <tbody>
                               
                               <tr>
                                   
                                    <th>Total Yang Harus Dibayar</th>
                                    <td> :</td>
                                    <td class="kurang"> 
                                    </td>
                                    <th>Update</th>
                                    <th>Status pembayaran</th>
                                    <td> : </td>
                                    <td> 
                                        <select name="status" class="form-control" id="status">
                                            <option value="0">Belum Lunas</option>
                                            <option value="1">Lunas</option>   
                                    </select>
                                    </td>
                                </tr>
                                
                                   
                                
                                <tr>
                                    <th> Pelunasan</th>
                                    <td> :</td>
                                    <td>
                                        <input type="number" class="form-control" name="dibayar" id="dibayar">
                                    </td>
                                    <th>Update</th>
                                    <th>Status Pesanan</th>
                                    <td> : </td>
                                    <td> 
                                        <select name="statuspes" class="form-control" id="statuspes">
                                            <option value="0">Belum Slesai</option>
                                            <option value="1">Slesai</option>   
                                    </select>
                                    
                                    </td>
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>
                </div>
           

            <button type="submit" id="submit" class="btn btn-info fa fa-check tipee" >Update Pesanan</button>
            </div>
        </form>
        </div>
    </div>
</div>
 
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@push('page-scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("input[name='kode']").focus();
       
        $(document).ready(function(){
            $('.tipee').hide();
    $("input[name='kode']").keyup(function(){
                $('.tipee').show();
               
        });
    });

    $('#submit').on('click',function(e,params){
          var localParams = params || {};
          if (!localParams.send){
           e.preventDefault();
         
            Swal.fire({
                title: 'Yakin Ubah Data? Pastikan Data Benar',
                showDenyButton: true,
                // showCancelButton: true,
                confirmButtonText: `Ya, Ubah `,
                denyButtonText: `Batalkan, Tinjau Lagi`,
                }).then((result) => {
                  
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Bersahsil Disimpan!', '', 'success')
                   $(e.currentTarget).trigger(e.type, {'send':true});
                // $("#submit").off("submit").submit();
                } else if (result.isDenied) {
                    Swal.fire('Data Belum Disimpan', '', 'info')

                }
                })
            }
        
        });

//mengambil kode menggunakan ajax dari route
        $("input[name='kode']").keypress(function(e){
            if(e.which == 13){
                e.preventDefault();
                var kode = $(this).val();
                var url = "{{ url('getpesanan') }}"+'/'+kode;
                var _this = $(this);

                $.ajax({
                    type:'get',
                    data: { kode : kode},
                    dataType:'json',
                    url:url,
                    success : function(data){
                        console.log(data);
                        _this.val('');

                        var nilai = '';
                        
                        nilai +='<tr>';

                      

                        nilai += '<td>';
                        nilai += data.data.kode;
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.nama;
                        nilai += '</td>';
                        
                        nilai += '<td>';
                        nilai += data.data.jumlah;
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.status ==1 ? 'Lunas' : 'Belum Lunas';
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.statuspes ==1 ? 'Slesai' : 'Belum Slesai';
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.uang_dp;
                        
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.total;
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.kurang;
                        nilai += '</td>';



                        nilai += '</tr>';

                            //menampilkan biaya pelunasan
                        $(".kurang").text(data.data.kurang);
                        

                            var hasilkurang = parseInt($("input[name='kurang']").val());
                            hasilkurang = data.data.kurang ;
                            $("input[name='kurang']").val(hasilkurang);
                            
                            var total = parseInt($("input[name='pelunasan']").val());
                            total = data.data.kurang;
                            $("input[name='pelunasan']").val(total);

                            var total = parseInt($("input[name='total']").val());
                            total = data.data.total;
                            $("input[name='total']").val(total);

                            //menghitung tambah dp
                            $("input[name='dibayar']").keyup(function(e){
                            var kurangan = data.data.uang_dp;
                            var dibayar = parseInt($(this).val());
                            var hasilan =  kurangan + dibayar;
                            $("input[name='uang_dp']").val(hasilan);
                            })
                            //menghitung biaya pelunasan
                                $("input[name='dibayar']").keyup(function(e){
                                var kurang = data.data.kurang;
                                var bayar = parseInt($(this).val());
                                var hasil = kurang - bayar;
                                $("input[name='kurang']").val(hasil);
                            })




                            //default kode
                            var id = parseInt($("input[name='kode']").val());
                            id = data.data.kode;
                            $("input[name='kode']").val(id);

                            //ambil id 
                            var ids = parseInt($("input[name='id']").val());
                            ids = data.data.id;
                            $("input[name='id']").val(ids);
                            
                            //mengisi status pembayaran  dengan value data 
                            var status = parseInt($("select[name='status']").val());
                            status = data.data.status;
                            $("select[name='status']").val(status);
                            //mengisi status pesanan dangan default value data
                            var pembayaran = parseInt($("select[name='statuspes']").val());
                            pembayaran = data.data.statuspes;
                            $("select[name='statuspes']").val(pembayaran);

                            var bayar = parseInt($("input[name='uang_dp']").val());
                            bayar = data.data.uang_dp;
                            $("input[name='uang_dp']").val(bayar);

                        $('.getpesanan').append(nilai);
                    }
                })
               
            }
        })


      
        $("button[type='submit']").click(function(e){
        //    var bayar = parseInt($("input[name='dibayar']").val());
        //    var kurang = parseInt($("input[name='pelunasan']").val());

        //    if(kurang < bayar){
        //        e.preventDefault();
        //        alert('Uang Melebihi Maximum pelunasan')
        //    }

           var kurangs = parseInt($("input[name='kurang']").val());
        
           if( kurangs < 0  ){
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Uang melebihi biaya total. COBA LAGI!'
        })
          
           
        }
        })
            // var grandtotal = $("input[name='grandtotal']").val();
            // alert(grandtotal);
            
        

    //    $.ajax({
    //        url : '{{ url('getpesanan') }}',
    //        data: {id : id},
    //        method: 'post',
    //        dataType: 'json',
    //        success: function(data){
    //            $('#kode').val(data.kode);
    //            $('#uang_dp').val(data.uang_dp);
    //            $('#kurang').val(data.kurang);
    //            $('#status').val(data.status);
    //            $('#statuspes').val(data.statuspes);
    //        }
    //    })

      
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>

@endpush