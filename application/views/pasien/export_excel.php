<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
    <style>
		.table-bordered th,
		.table-bordered thead th,
		.table-bordered td{
		border: 1px solid #000;
		}
		</style>
		
		</head><body>
		<div class="container">
		<h3 class="mb-0">KLINIK SATUHATI</h3>
		<small>Jl. Pemuda Kec. Rawamangun, Jawa Barat</small>
		<hr>
        <style type="text/css">
    .table-data{
    width: 100%;
    border-collapse: collapse;
    }
    .table-data tr th,
    .table-data tr td{
    border:1px solid black;100
    font-size: 11pt;
    font-family:Verdana;
    padding: 10px 10px 10px 10px;
    }
    .table-data th{
    background-color:grey;
    }
    h3{
    font-family:Verdana;
    }
    </style>
    <h3><center>LAPORAN DATA PASIEN</center></h3>
    <br/>
    <table class="table-data" border=1>
    <thead>
    <tr>
    <th>No</th>
    <th>Nama Pasien</th>
    <th>Jenis Kelamin</th>
    <th>Umur</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($laporan as $l){
    ?>
    <tr>
    <td scope="row"><?= $no++; ?></td> 
    <td><?= $l['nama_pasien']; ?></td>
    <td><?= $l['jenis_kelamin']; ?></td>
	<td><?= $l['umur']; ?></td>
    </tr>
    <?php
    }101
    ?>
    </table>
    </tbody>