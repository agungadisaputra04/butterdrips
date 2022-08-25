
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Kehadiran</title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
       
            /* CSS for Zebra Table in index.html */
            .zebra-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 3px 1px rgb(143, 194, 218))));
            overflow: hidden;
            border:10px solid #fff;
            }
            .zebra-table th,.zebra-table td{
            vertical-align: top;
            padding:12px 20px;
            text-align: center;
            margin:2px;
            }
            .zebra-table tbody tr:nth-child(odd) { /* Make table like zebra */
            background:rgb(61, 152, 175);
            
            }
            .apa-table{
                text-align: right;
                width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 3px 1px rgb(143, 194, 218))));
            overflow: hidden;
            border:5px solid #fff;
            }
            .apa-table th,.apa-table td{
            vertical-align: top;
            padding:5px 50px;
            text-align: right;
            margin:0px;
            }/* End CSS for Zebra Table in index.html */

	</style>
</head>
<body>
	<center>
		<h1>SABLON BUTTERDRIPS</h1>
		<h2>Laporan Kehadiran Karyawan</h2>
		<hr style="width: 50%; border-width: 5px; color: black">
	</center>

		

	<center>
  <h2><b>Tahun {{ $tahunn }}</b> </h2> 
            </center>

		
         

	<table class="table table-bordered center" border="1" align="center" width="900px">
		<tr>
			<th class="text-center"width="400px">No</th>
			<th class="text-center"width="400px">Nama Karayawan</th>
			<th class="text-center"width="400px">Jabatan</th>
			<th class="text-center"width="400px">Jenis Kelamin</th>
			<th class="text-center" width="400px">Hadir</th>
			<th class="text-center" width="400px">Lembur</th>
			<th class="text-center" width="400px">Bulan</th>
			<th class="text-center" width="400px">Uang Lembur</th>
			<th class="text-center" width="400px">Uang Gaji</th>
			<th class="text-center" width="400px">Total Gaji</th>

			
		</tr>
		
		<tr >
			@php $i=1;@endphp
	<?php foreach($laporan as $ps) : ?>
			<td width="500px" height="50px"><center>{{ $i++ }}</center></td>
			<td width="500px"height="50px"><center>{{ $ps->karyawan['nama']}}</center></td>
			<td width="500px"height="50px"><center>{{ $ps->karyawan->jabatan['nama_jabatan']}}</center></td>
			<td width="500px"height="50px"><center>{{ $ps->karyawan['jenis_kelamin']}}</td>
			<td width="500px"height="50px"><center>{{ $ps->hadir}} Hari</center></td>
			<td width="500px"height="50px"><center>{{ $ps->lembur}} Hari</center></td>
			<td width="500px"height="50px"><center>{{ $ps->bulan}} </center> </td>
			<td width="500px"height="50px"><center>{{ number_format($ps->uang_lembur)}} </center> </td>
			<td width="500px"height="50px"><center>{{ number_format($ps->uang_gaji)}} </center> </td>
			<td width="500px"height="50px"><center>{{ number_format($ps->total)}} </center> </td>
		</tr>
		<?php endforeach ;?>
	</table>
<br>
<br>
<table align="center" class="col-md-3">
	<div >
		<div >
			<tr>
				<th >Yogyakarta,  {{ $waktu }}</th><br>
			
			</tr>
		</div>
	</div>
</table>

<table align="center" class="col-md-3">
	<div >
		<div >
			<tr>
					
				<td class="ml-5"> Admin</td>
				<br>
				<br>
		 
			</tr>
		</div>
	</div>
</table>
<br>
<br>
<table align="center" class="col-md-3">
	<div >
		<div >
			<tr>
					
				<th>.......................</th>
		 
			</tr>
		</div>
	</div>
</table>
	

</body>
</html>

<script type="text/javascript">
	window.print();
</script>