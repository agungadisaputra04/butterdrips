<!DOCTYPE html>
<html>
<head>
	<title>Cetak Slip Gaji</title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	<center>
		<h1>SABLON BUTTERDRIPS</h1>
		<h2>Slip Gaji Karyawan</h2>
		<hr style="width: 50%; border-width: 5px; color: black">
	</center>

		

	<?php foreach($slip as $ps) : ?>



	<table style="width: 100%">
		<tr>
			<td width="20%">Nama Karyawan</td>
			<td width="2%">:</td>
			<td><?php echo $ps->karyawan['nama']?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td><?php echo $ps->jabatan['nama_jabatan']?></td>
		</tr>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo($ps->bulan) ?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo ($ps->tahun) ?></td>
		</tr>
	</table>

	<table class="table table-striped table-bordered mt-3" border="1" widht="600px">
		<tr>
			<th class="text-center" width="5%">No</th>
			<th class="text-center" >Keterangan</th>
			<th class="text-center" >Jumlah</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Hadir</td>
			<td><?php echo ($ps->hadir) ?>  Hari</td>
		</tr>

		<tr>
			<td>2</td>
			<td>Lembur</td>
			<td> <?php echo ($ps->lembur) ?>  Hari</td>
		</tr>
		<tr>
			<td>3</td>
			<td>Gaji</td>
			<td>Rp. <?php echo number_format($ps->uang_gaji) ?></td>
		</tr>

		<tr>
			<td>4</td>
			<td>Uang Lembur</td>
			<td>Rp. <?php echo number_format($ps->uang_lembur) ?></td>
		</tr>

		

		

		<tr>
			<th colspan="2" style="text-align: right;">Total Gaji : </th>
			<th>Rp. <?php echo number_format($ps->total) ?></th>
		</tr>
	</table>

	<table width="100%">
		<tr>
			<td></td>
			<td>
				<p>Karyawan</p>
				<br>
				<br>
				<p class="font-weight-bold"><?php echo $ps->karyawan['nama']?></p>
			</td>

			<td width="200px">
				<p>Yogyakarta, <?php echo date("d M Y")?> <br> {{ Auth::user()->name }},</p>
				<br>
				<br>
				<p>___________________</p>
			</td>
		</tr>
	</table>

	<?php endforeach ;?>

</body>
</html>

<script type="text/javascript">
	window.print();
</script>