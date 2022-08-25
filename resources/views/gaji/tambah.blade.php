@extends('layouts.master')
@section('title','Penggajian Karyawan')
@section('content')
 
<div class="row">
    <div class="col-md-12">
        

        <h4> Penggajian Karyawan</h4>

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

                <form action="{{ url('tambahgaji') }}" method="POST"> 
                    @csrf
                    @foreach ($karyawan as $item)
                        
                  
                    <input type="text" name="karyawans_id" id="karyawans_id" >
                    @foreach ($jabatan as $data)
                    
                        
                    <input type="text" name="jabatan_id" id="jabatan_id" value="{{ $data->nama_jabatan == $item->id }}">
                    @endforeach
                    @endforeach
                   
                    @foreach ($harikerja as $data)   
                    <input type="text" name="harikerjas_id" id="harikerjas_id" value="{{ $data->jumlah_harikerja }}" >
                    @endforeach
                  
                 

                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pilih Karyawan</label>
                                            <select name="absensi_id" class="form-control">
                                                @foreach ($absensi as $data)
                                                    <option value="{{ $data->id }}">{{ $data->karyawan['nama']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                           
                                                <input type="text" class="form-control" name="keteranagn" id="keterangan">
                                         
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Gajian</label>
                                            
                                                <input type="text" class="form-control" name="tanggal_gaji" id="tanggal_gaji">
                                                    
                                                    </div>
                                                </div>
                               
                                            </form>
                                            </div>
                                        </div>
                                                            
                        @if(isset($absensi))
                        <div class="row">
                        <div class="col-md-10">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>ID Karyawan </th>
                                        <th>Total ijin </th>
                                        <th>Total Lembur</th>
                                    
                                    </tr>
                                </thead>
                                <tbody class="getabsensi">

                                </tbody>

                            </table>           
                        <button type="submit" class="btn btn-primary  fa fa-check " >Save</button>
                        </div>
                        </div>
                        @endisset
                        @endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@push('page-scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("select[name='absensi_id']").focus();
       


//mengambil kode menggunakan ajax dari route
$("select[name='absensi_id']").keypress(function(e){
            if(e.which == 13){
               // e.preventDefault();
                var absensi = $(this).val();
                var url = "{{ url('getabsensi') }}"+'/'+absensi;
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
                            var karyawans_id  = parseInt($("input[name='karyawans_id']").val());  
                             total = data.data.karyawans_id  ;
                           $("input[name='karyawans_id']").val(total);
                        
                        //    $("input[name='jumlah_ijin']").keyup(function(){
                        //     var total = data.data.total_ijin;
                        //     var jumlah = parseInt($(this).val());
                        //     var hasilan =  total + jumlah;
                        //     $("input[name='total_ijin']").val(hasilan);
                        //     })

                        //     //lembur
                        //     var lembur  = parseInt($("input[name='total_lembur']").val());  
                        //     lembur = data.data.total_lembur  ;
                        //    $("input[name='total_lembur']").val(lembur);
                        
                        //    $("input[name='jumlah_lembur']").keyup(function(){
                        //     var ttllemburan = data.data.total_lembur;
                        //     var jml_lembur = parseInt($(this).val());
                        //     var hasil =  ttllemburan + jml_lembur;
                        //     $("input[name='total_lembur']").val(hasil);
                        //     })




                        //     var id  = parseInt($("input[name='karyawans_id']").val());  
                        //      id = data.data.karyawans_id;
                        //    $("input[name='karyawans_id']").val(id);

                        //    var ids  = parseInt($("input[name='id']").val());  
                        //      ids = data.data.id;
                        //    $("input[name='id']").val(ids);

                       

                       //menghitung 
                            //      $("input[name='jumlah_ijin']").keyup(function(e){
                            //     var total = data.data.total;
                            //     var ijin = parseInt($(this).val());
                            //     var hasil = total + ijin;
                            //     $("input[name='total_ijin']").val(hasil);
                            // })
                            

                            $('.getabsensi').append(nilai);
                    }
                })
               
            }
        })


      
        $("button[type='submit']").click(function(e){
        //    var kurangs = parseInt($("input[name='kurang']").val());
        
        //    if( kurangs < 0  ){
        //     e.preventDefault();
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Oops!',
        //         text: 'Uang melebihi biaya total. COBA LAGI!'
        // })   
        // }  
        })
      
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })

    $.fn.datepicker.defaults.format = "dd/mm/yyyy";
        $('#tanggal_gaji').datepicker({
         startDate: '-30d'
            });

</script>

@endpush