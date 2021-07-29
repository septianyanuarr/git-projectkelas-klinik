<!doctype html>
    <html lang="en"> <head>
	<title></title>
	</head><body>
	<h3 style="text-align: center">DATA PASIEN</h3>
	
	
	<div class="table-responsive">
	<table border=1

	<tr>
			<th>No.</th>
			<th>Nama Pasien</th>
			<th>L/P</th>
			<th>Umur</th>
			</tr>
			
		<?php $no=1; foreach($pasien  as $r){ ?>
		<tr>
		<td class="text-center"><?= $no; ?></td>
		<td><?= $r->nama_pasien; ?></td>
		<td><?= $r->jenis_kelamin; ?></td>
		<td><?= $r->umur; ?></td>
		</tr>
		<?php $no++;} ?>

		</table>
		</div>
		</body></html>