@extends('layouts.master')
@section('title',' Laporan Gaji')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card mx-auto" style="width: 50%">
		<div class="card-header bg-primary text-white text-center">
			Laporan Kehadiran
		</div>
        @if ($message = Session::get('message'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>×</span>
              </button>
              <p>{{ $message }}</p>
            </div>
          </div>
        @endif 

		<form method="POST" action="{{ route('laporankehadiran') }}">
           @csrf


		<div class="card-body">
			

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
				<div class="col-sm-9">
					<select class="form-control" name="tahun">
					    <option value=""> Pilih Tahun </option>
					    <?php $tahun = date('Y');
					    for($i=2019;$i<$tahun+10;$i++) { ?>
					    <option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php }?>
					</select>
				</div>
			</div>

			
			
			<button style="width: 100%" type="submit" class="btn btn-primary"><i class="fas fa-print"></i>Cetak Laporan Kehadiran</button>
	</div>
	</form>
</div>
@endsection

<!-- /.container-fluid -->