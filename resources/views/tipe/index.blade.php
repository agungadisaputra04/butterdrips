@extends('layouts.master')
@section('title','Daftar Tipe Sablon')
@section('content')

 <div class="section-body">
     <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <h4> Daftar Tipe Sablon </h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Tipe Sablon</button>
        
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

            @stack('page-styles')
            <br>
            <table class="table table-responsive martop-sm table-striped table-bordered">
            <thead>
                <br>
            <th>No</th>
          
            <th>Tipe Sablon</th>
            <th>Harga /pcs</th>
            <th></th>
            <th>Edit</th>
           
            </thead>
            <tbody>
            @php $i=1;@endphp

            @foreach ($tipes as $p)
            <tr>
            <td>{{ $i++ }}</td>
           
            <td>{{ $p->tipe}}</td>
            <td>Rp. {{ number_format($p->harga) }}</td>
         
            
           
            <td><a href="{{ route('tipe', $p->id) }}">
            {{ $p->tipes }}</a>

           
            <form action="{{ route('tipedelete', $p->id) }}" id="delete{{ $p->id }}"
                method="post">
                {{csrf_field()}}
               {{ method_field('DELETE') }}
               
               <td> 
                <a href="#" data-id="{{ $p->id }}" class="badge badge-success btn-edit">Edit</a>
            </td>
           
                </form>
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
              <h5 class="modal-title">Tambah Tipe Sablon</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('tipesimpan') }}" method="POST"> 
                @csrf
             <div class="modal-body">
                <<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('tipe')
                            class="text-danger"
                            @enderror>Tipe sablon @error('tipe')
                              {{ $message }}  
                            @enderror</label>
                            <input type="text"name="tipe"  class="form-control" placeholder="nama tipe sablon">
                        </div>
                    </div>
             </div>

             <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label @error('harga')
                    class="text-danger"
                    @enderror>Harga @error('harga')
                        {{ $message }}
                    @enderror</label>
                    <input type="number" name="harga"  class="form-control" placeholder="harga per pcs">
                </div>
            </div>
     </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
         </form>
          </div>
        </div>
    </div>
   <div class="modal fade" tabindex="-1" role="dialog" id="editjabatan">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Tipe Sablon</h5>
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
          <button type="button" class="btn btn-primary btn-update">Save</button>
        </div>
     </form>
      </div>
 </div>
</div>
        @endsection
        @endsection
        @push('page-scripts')
        <script>
            $('.btn-edit').on('click', function(){
                console.log($(this).data('id'));
                let id=$(this).data('id')
                $.ajax({
                    url:`edit/${id}`,
                    method:"GET",
                    success:function(data){
                        console.log(data)
        
                        $('#editjabatan').find('.modal-body').html(data)
                        $('#editjabatan').modal('show')
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
                    url:`tipeupdate/${id}`,
                    method:"post",
                    data:formData,
                    success:function(data){
                        console.log(data)
        
                        $('#editjabatan').find('.modal-body').html(data)
                        $('#editjabatan').modal('hide')
                        window.location.assign('tipe')
                        Swal.fire(
                                        'Berhadil!',
                                        'Data Berhasil Di Ubah.',
                                        'success'
                                        )
                    },
                    error:function(error){
                        console.log(error)
                    }
                })
            })
        
            $(".btn-hapus").click(function(e){
                id = e.target.dataset.id;
                        Swal.fire({
                                    title: 'Yakin Hapus Data?',
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
      