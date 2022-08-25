@extends('layouts.master')
@section('title','Daftar Karyawan')
@section('content')



 <div class="section-body">
     <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <h4> Daftar Karyawan </h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Karyawan</button>
        
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

            <br>
            <table class="table table-responsive martop-sm table-striped table-bordered">
            <thead>
                <br>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan </th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>   
            <th>Tanggal Masuk</th>
            <th>Action</th>
            </thead>
            <tbody>
            @php $i=1;@endphp

            @foreach ($karyawans as $data)
            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->id }}</td>
            <td>{{ $data->nama}}</td>
            <td>{{ $data->jabatan['nama_jabatan']}}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->telepon }}</td>
            <td>{{ $data->tanggal_masuk }}</td>       
            <td>                 
            <a href="#" data-id="{{ $data->id }}" class="badge badge-success btn-edit">Edit</a>
            <a href="#" data-id="{{ $data->id }}" class="badge badge-danger btn-hapus">
                <form action="{{ url('karyawandelete',$data->id) }}" id="delete{{ $data->id }}" class="d-inline " method="POST" >
                @method('delete')  
                @csrf
                  </form>    
                  Hapus       
            </a>
        </td>
            </tr>
            @endforeach
            </tbody>
            </table>

        </div>
        </div>
     </div>
 @section('modal')
     <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Karyawan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('karyawansimpan') }}" method="POST">
                @csrf
             <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                           
                           
                           </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama"  class="form-control" placeholder="nama">
                            
                           </div>
                        </div>
                    </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan_id"  class="form-control">
                                @foreach ($jabatan_id as $kr)
                                        <option value="{{ $kr->id }}">{{ $kr->nama_jabatan}}</option>
                                    @endforeach
                        </select>
                        </div>
                        </div>
            <div class="col-md-6">
            <div class="form-group">
                <label>alamat</label>
                <input type="text"name="alamat"  class="form-control" placeholder="tempat tinggal sekarang">
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                     <label>jenis kelamin</label><br>
                             <select name="jenis_kelamin"  class="form-control">
               
                                <option>--PILIH JENIS KELAMIN--</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                                </select>
                </div>
             </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>telepon</label>
                <input type="number"name="telepon" class="form-control" placeholder="Nomer Aktif">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>email</label>
                            <input type="email"name="email" class="form-control" placeholder="Email Aktif">
                                    </div>
                            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                            <input type="text"name="tanggal_masuk" id="tanggal_masuk" class="form-control">
                </div>
               </div>
           </div>
            </div>

            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" id="submit" class="btn btn-primary">Save Karyawan</button>
            </div>
         </form>
          </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Karyawan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    
            <form action="#" method="POST" id="form-edit">
                @csrf
            <div class="modal-body">

                
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn-update ">Save Perubahan</button>
            </div>
             </form>
          </div>
     </div>
    </div>
@endsection
 
@endsection

@stack('page-styles')
@push('page-scripts')
@stack('before-scripts')
<script>
$('.btn-edit').on('click', function(){
                console.log($(this).data('id'));
                let id=$(this).data('id')
                $.ajax({
                    url:`karyawanedit/${id}`,
                    method:"GET",
                    success:function(data){
                        console.log(data)
                         $('#edit').find('.modal-body').html(data)
                        $('#edit').modal('show')
                    },
                    error:function(error){
                        console.log(error)
                    }
                })
            })
        
            $('.btn-update').on('click', function(){
                // console.log($(this).data('id'));
                let id=$('#form-edit').find('#id_data').val()
                let formData = $('#form-edit').serialize()
              
                console.log(formData)
                $.ajax({
                    url:`karyawanupdate/${id}`,
                    method:"post",
                    data:formData,
                    success:function(data){
                        console.log(data)
        
                        $('#editkaryawan').find('.modal-body').html(data)
                        $('#editkaryawan').modal('hide')
                        window.location.assign('karyawan')

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 20000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })

                            Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil dirubah'
                            })
                      
                    },
                    error:function(error){
                        console.log(error)
                    }
                })
            })

            
        $.fn.datepicker.defaults.format = "dd/mm/yyyy";
        $('#tanggal_masuk').datepicker({
         startDate: '-30d'
            });
        

 $(".btn-hapus").click(function(e){
                id = e.target.dataset.id;
                        Swal.fire({
                                    title: 'Yakin Hapus Data?'+id,
                                    text: "Data tidak bisa dipulihkan!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, Hapus!',
                                    buttons:true
                                 }).then((willDelete) => {
                                    if (willDelete.isConfirmed) {
                                        Swal.fire(
                                        'Dihapus!',
                                        'Data Berhasil Dihapus.',
                                        'success'
                                        )
                                        $(`#delete${id}`).submit();
                                        }                      
                                    })

                            })



              

</script>
            
@endpush
      