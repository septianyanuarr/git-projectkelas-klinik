<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		.table-data{width: 100%;
			border-collapse: collapse;
		}
		.table-data tr th,
		.table-data tr td{
			border:1px solid black;
			font-size: 11pt;
			padding: 10px 10px 10px 10px;
		}
	</style>
<h3><center>Laporan Data User Klinik Satuhati</center></h3>
<br/>
<table class="table-data">
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama Lengkap</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	foreach ($users as $u) {
	?>
	<tr>
		<th scope="row"><?= $no++; ?></th>
		<td><?= $u['username']; ?></td>
		<td><?= $u['nama_lengkap']; ?></td>
	</tr>
	<?php
}	
?>
</tbody>
</table>
</body>
</html>