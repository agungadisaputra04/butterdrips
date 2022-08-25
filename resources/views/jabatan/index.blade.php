@extends('layouts.master')
@section('title','Daftar Jabatan')
@section('content')

 <div class="section-body">
     <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <h4> Daftar Jabatan </h4>
            {{-- @if (sizeof($jabatan)==5) --}}
                
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Jabatan!</button>
            {{-- @endif --}}
       
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
           
            <th>Nama Jabatan</th>
            <th>Gaji Pokok </th>
            <th>Uang Lembur</th>
            <th>Action</th>
            </thead>
            <tbody>
            @php $i=1;@endphp

            @foreach ($jabatan as $data)
            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->nama_jabatan}}</td>
            <td>Rp. {{number_format($data->gaji_pokok,0) }}</td>
            <td>Rp. {{number_format($data->lembur,0) }}</td>
           
          <td> 
              <a href="#" data-id="{{ $data->id }}" class="badge badge-success btn-edit">Edit</a>
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
          <h5 class="modal-title">Tamabah Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tambahjabatan') }}" method="POST">
            @csrf
         <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" placeholder="nama jabatan" class="form-control">
                       </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Gaji Pokok</label>
                        <input type="number" name="gaji_pokok" placeholder="gaji pokok"  class="form-control">
                        
                       </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Uang Lembur</label>
                        <input type="number" name="lembur" placeholder="uang lembur" class="form-control">
                        
                       </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Jabatan</button>
        </div>
     </form>
      </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="editjabatan">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Jabatan</h5>
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
          <button type="button" class="btn btn-primary btn-update">Save Jabatan</button>
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
            url:`editjabatan/${id}`,
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
            url:`updatejabatan/${id}`,
            method:"post",
            data:formData,
            success:function(data){
                console.log(data)

                $('#editjabatan').find('.modal-body').html(data)
                $('#editjabatan').modal('hide')
                window.location.assign('jabatan')
            },
            error:function(error){
                console.log(error)
            }
        })
    })

</script>
    
@endpush
      