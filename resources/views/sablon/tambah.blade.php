@extends('layouts.master')
@section('title','Tambah Pesanan')
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4> Tambah Pesanan Sablon</h4>

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
              
            </div>
            <div class="box-body">

                


               
                <form action="{{ route('invoice-pesanan') }}" method="POST" enctype="multipart/form-data" id="post"> 
                    @csrf
                  
                    <input type="hidden" name="total" value="0" id="total" >
                    {{-- <input type="text" name="tipes_id[]"  > --}}
                    <input type="hidden" name="kurang"  >
                    <input type="hidden" name="statuspes" value="{{ $statuspes }}"  >
                
                    <input type="hidden" name="nama" value="{{ $nama }}"  >
                    
                    <input type="hidden" name="nohp" value="{{ $nohp }}"  >

                
                 <div class="box-body">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>Nomer Pesanan</b></label>
                                        <input type="hidden" name="kode" value="{{ $nomerpesanan }}"> <h5 class="text-primary"> {{ $nomerpesanan }} </h5>
                                    </div>
                                </div>
                         </div>
                       
                             <table >
                                <thead>
               <tr>
                   
                <td width="15%"> <b> Nama Pemesan</b></td>
                <td width="5%"><b>:</b></td>
                <td><b>{{ $nama }}</b></td>
            
               </tr>
            
            <tr>
                <td><b>Nomer Whatsapp</b></td>
                <td><b>:</b></td>
                <td><b>{{ $nohp }}</b></td>
            </tr>
            {{-- <tr>
                <td><b>Status Pembayaran</b></td>
                <td><b>:</b></td>
                <td><b><span class="badge {{ ($status == 1) ? 'badge-success' : 'badge-warning' }}">{{ ($status ==1) ? 'Lunas' : 'Belom Lunas' }}</span></b></td>
            </tr> --}}
        </thead>

     
         </table>

                      
                        
                    
                     
                    <!-- /.box-body -->
                  


            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pilih Tipe Sablon</label>
                        <select name="tipes" class="form-control tipe" id="tipeee">
                            @foreach ($tipes_id as $br)
                                <option value="{{ $br->id }}">{{ $br->tipe}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
         

        <div class="row">
            <div class="col-md-12">
                <table class="table table-stripped tipee">
                    <thead>
                        <tr>
                            <th>ID Tipe Sablon</th>
                            <th>Tipe Sablon</th>
                            <th>Harga</th>
                            <th>Jumlah Pesanan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="gettipe">

                    </tbody>

                </table>

                {{-- <div class="row">
                    <div class="col-md-6">
                        <table class="table table-stripped tipee">
                            <tbody>

                               <tr>
                                    <th>Total</th>
                                    <td> :</td>
                                    <td class="totals" name="totals" value="0" >
                                       
                                    </td>
                                </tr>
                                <tr >
                                    <th > Jumlah Dibayar/DP</th>
                                    <td> :</td>
                                    <td @error('uang_dp')
                                        {{ $message }}
                                    @enderror>
                                        <input type="number" class="form-control" name="uang_dp" >
                                    </td>
                                </tr>

                                <tr>
                                    <th> Biaya Pelunasan</th>
                                    <td> :</td>
                                    <td class="kurangs" name="kurangs" >
                                      
                                    </td>
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <center>
              <button   type="submit"  class="btn btn-primary btn-lg  fa fa-check tipee" id="submit">Simpan Pesanan</button>
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
    $(document).ready(function(){
        $("select[name='tipes']").focus();
        $("input[name='satuan']").val(0);
        $("input[name='total']").val(0);

        //hide show tabel
        $(document).ready(function(){
            $('.tipee').hide();
    $("select[name='tipes']").keypress(function(){
                $('.tipee').show();
        });
    });

        $('#submit').on('click',function(e,params){
          var localParams = params || {};
          if (!localParams.send){
           e.preventDefault();
         
            Swal.fire({
                title: 'Pastikan Data Jumlah Benar !',
                showDenyButton: true,
                // showCancelButton: true,
                confirmButtonText: `Ya, Proses `,
                denyButtonText: `Batalkan`,
                }).then((result) => {
                  
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                 
                   $(e.currentTarget).trigger(e.type, {'send':true});
                // $("#submit").off("submit").submit();
                } else if (result.isDenied) {
                    Swal.fire('Data Belum Diproses', '', 'info')

                }
                })
            }
        
        });
       


//mengambil kode pesananan menggunakan jquery dari route
        $("select[name='tipes']").keypress(function(e){
            if(e.which == 13){
               // e.preventDefault();
                var tipe = $(this).val();
                var url = "{{ url('gettipe') }}"+'/'+tipe;
                var _this = $(this);

                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:url,
                    success : function(data){
                        console.log(data);
                        _this.val('');

                        var nilai = '';
                        
                        nilai +='<tr>';

                        nilai += '<td>';
                        nilai += data.data.id;
                        nilai += '<input type="hidden" class="form-control" name="tipes_id[]" value="'+data.data.id+'">';
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.tipe;
                        nilai += '<input type="hidden" class="form-control" name="tip[]" value="'+data.data.tipe+'">';
                        nilai += '</td>';

                        nilai += '<td class="harga">';
                        nilai += data.data.harga;
                        nilai += '<input type="hidden" class="form-control" name="satuan[]" value="'+data.data.harga+'">';
                        nilai += '</td>';

                        

                        nilai += '<td>';
                        nilai += '<input type="number" class="form-control" name="jumlah[]" value="5">';
                        nilai += '</td>';
                        
                        
                        nilai += '<td>';
                        nilai += '<button class="btn btn-xs btn-danger hapus"><i class="fa fa-trash"></i> </button>';
                        nilai += '</td>';


                        nilai += '</tr>';
                        

                            // var grandtotal = parseInt($("input[name='satuan']").val());
                            // grandtotal += data.data.harga;
                            // $("input[name='satuan']").val(grandtotal);

                            // var id = parseInt($("input[name='tipes_id']").val());
                            // id = data.data.id;
                            // $("input[name='tipes_id']").val(id);

                           
                           

                            $('.gettipe').append(nilai);
                    }
                })
               
            }
        })

        $('table').on('click','.hapus', function(e){
            e.preventDefault();
            $(this).closest('tr','#total').remove();
         
            // $('.preloader').fadeIn();
            // location.reload();
        })

        $("button[type='submit']").click(function(e){
            var kurangs = parseInt($("input[name='kurang']").val());
        
        if( kurangs < 0  ){
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Uang melebihi biaya total. COBA LAGI!'
        })
          
           
        }
        }
        )
        

       
            
        //menghitung jumlah
        $("input[name='uang_dp']").keyup(function(e){
            var total = parseInt($("input[name='satuan[]']").val());
            var jumlah = parseInt($("input[name='jumlah[]']").val());
            var uang_dp = parseInt($(this).val());
            var hasil = total * jumlah;
             var finis = hasil - uang_dp;
            $("input[name='total']").val(hasil);
            $(".totals").text(hasil);
            $("input[name='kurang']").val(finis);
            $(".kurangs").text(finis);
           
        })
       
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>

@endpush