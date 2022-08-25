<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kehadiran Bulanan</title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	<center>
		<h1>CETAK DATA GAJI BULANAN</h1>
		<h2>BUTTERDRIPS</h2>
	</center>


	
	<table align="center">
		<tr>
			<th>Bulan</th>
			<th>:</th>
			<th>{{ $bulan }}</th>
		</tr>
		<tr>
			<th>Tahun</th>
			<th>:</th>
			<th>{{ $tahun }}</th>
		</tr>
	</table>
<br>
	<table class="table table-bordered" border="1" align="center" width="800px" >
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
         
			<tr>
                @php $i=1;@endphp
                <?php foreach($cetak as $ps) : ?>
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
                            
                        <th>  ...................</th>
                 
                    </tr>
                </div>
            </div>
        </table>

</body>
</html>

<script type="text/javascript">
	window.print();
</script>