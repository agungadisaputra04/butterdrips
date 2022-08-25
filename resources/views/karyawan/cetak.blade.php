
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Karyawan</title>
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
		<h2>Cetak Data Karyawan</h2>
		<hr style="width: 50%; border-width: 5px; color: black">
	</center>

		

	

		
         
@php $i=1;@endphp
	<?php foreach($karyawans as $ps) : ?>
	<table class="apa-table">
		<tr>
			<td width="20%" > <b> KARYAWAN </b></td>
			
			<td> <b> BUTTERDRIPS </b></td>
		</tr>
		
	
		
	</table>

	<table class="table zebra-table table-bordered mt-3">
		<tr>
			<th class="text-center" width="5%">No</th>
			<th class="text-center" >Nama</th>
			<th class="text-center" >Jabatan</th>
			<th class="text-center" >Alamat</th>
			<th class="text-center" >Jenis Kelamin</th>
			<th class="text-center" >Telepon</th>
			<th class="text-center" >Email</th>
			<th class="text-center" >Tanggal Masuk</th>
		</tr>
		<tr>
			<td>{{ $i++ }}</td>
            <td>{{ $ps->nama }}</td>
            <td>{{ $ps->jabatan['nama_jabatan'] }}</td>
            <td>{{ $ps->alamat }}</td>
            <td>{{ $ps->jenis_kelamin }}</td>
            <td>{{ $ps->telepon }}</td>
            <td>{{ $ps->email }}</td>
            <td>{{ $ps->tanggal_masuk }}</td>
		</tr>
     
	</table>
    <hr style="width: 100%; border-width: 3px; color: black">
	

	<?php endforeach ;?>

</body>
</html>

<script type="text/javascript">
	window.print();
</script>