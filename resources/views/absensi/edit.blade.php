@extends('layouts.master')
@section('title','Absensi Karyawan')
@section('content')
 
<div class="row">
    <div class="col-md-12">
        

        <h4> Absensi Karyawan</h4>

        @if ($message = Session::get('message'))
        <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
        </div>
        @endif 
       
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                  
                </p>
            </div>
            <div class="box-body">

                <form action="{{ url('updateabsensi/{id}') }}" method="POST"> 
                    @csrf

                    <input type="hidden" name="total_ijin" id="total_ijin" >
                    <input type="hidden" name="total_lembur" id="total_lembur" >
                    <input type="hidden" name="karyawans_id" id="karyawans_id" >
                    <input type="hidden" name="id" id="id" >
                 

                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pilih Karyawan</label>
                                            <select name="karyawans_id" class="form-control">
                                                @foreach ($karyawan as $data)
                                                    <option value="{{ $data->id }}">{{ $data->karyawan['nama']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                   
                     
                    <!-- /.box-body -->
                 


            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>ID karyawan </th>
                            <th>Total ijin </th>
                            <th>Total Lembur</th>
                          
                        </tr>
                    </thead>
                    <tbody class="getkaryawan">

                    </tbody>

                </table>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped">
                            <tbody>
                             
                                   
                                
                                <tr>
                                    <th> Tambah Izin</th>
                                    <td> :</td>
                                    <td>
                                        <input type="number" class="form-control" name="jumlah_ijin" id="jumlah_ijin" value="0">
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <th> Tambah Lembur</th>
                                    <td> :</td>
                                    <td>
                                        <input type="number" class="form-control" name="jumlah_lembur" id="jumlah_lembur" value="0">
                                    </td>
                                   
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>
                </div>
           

            <button type="submit" class="btn btn-primary  fa fa-check " >Save</button>
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
        $("select[name='karyawans_id']").focus();
       


//mengambil kode menggunakan ajax dari route
$("select[name='karyawans_id']").keypress(function(e){
            if(e.which == 13){
               // e.preventDefault();
                var karyawan = $(this).val();
                var url = "{{ url('getkaryawan') }}"+'/'+karyawan;
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
                        nilai += data.data.karyawans_id;
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.total_ijin;
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.data.total_lembur;
                        nilai += '</td>';


                        nilai += '</tr>';

                       //jumlah = total + jumlah = total
                          // ijin
                            var total  = parseInt($("input[name='total_ijin']").val());  
                             total = data.data.total_ijin  ;
                           $("input[name='total_ijin']").val(total);
                        
                           $("input[name='jumlah_ijin']").keyup(function(){
                            var total = data.data.total_ijin;
                            var jumlah = parseInt($(this).val());
                            var hasilan =  total + jumlah;
                            $("input[name='total_ijin']").val(hasilan);
                            })

                            //lembur
                            var lembur  = parseInt($("input[name='total_lembur']").val());  
                            lembur = data.data.total_lembur  ;
                           $("input[name='total_lembur']").val(lembur);
                        
                           $("input[name='jumlah_lembur']").keyup(function(){
                            var ttllemburan = data.data.total_lembur;
                            var jml_lembur = parseInt($(this).val());
                            var hasil =  ttllemburan + jml_lembur;
                            $("input[name='total_lembur']").val(hasil);
                            })




                            var id  = parseInt($("input[name='karyawans_id']").val());  
                             id = data.data.karyawans_id;
                           $("input[name='karyawans_id']").val(id);

                           var ids  = parseInt($("input[name='id']").val());  
                             ids = data.data.id;
                           $("input[name='id']").val(ids);

                       

                       //menghitung 
                            //      $("input[name='jumlah_ijin']").keyup(function(e){
                            //     var total = data.data.total;
                            //     var ijin = parseInt($(this).val());
                            //     var hasil = total + ijin;
                            //     $("input[name='total_ijin']").val(hasil);
                            // })
                            

                            $('.getkaryawan').append(nilai);
                    }
                })
               
            }
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