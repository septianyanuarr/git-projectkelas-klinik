<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
		<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
        
        <title>Klinik Satuhati</title>
        <link rel  ="shortcut icon" href="<?php echo base_url() ?>assets/img/med.png">
        
		<style>
		.table-bordered th,
		.table-bordered thead th,
		.table-bordered td{
		border: 1px solid #000;
		}
		</style>
		
		</head>
		<body>
		<div class="container">
		<h3 class="mb-0">KLINIK SATUHATI</h3>
		<small>Jl. Pemuda Kec. Rawamangun, Jawa Barat</small>
		<hr>
		<h4 class="text-center">LAPORAN DATA OBAT</h4>

		<table class="table table-bordered table-sm">
		<tr>
		<th width="80px">No.</th>
		<th>Nama Obat</th>
		</tr>
		<?php $no=1; foreach($obat  as $r){ ?>
		<tr>
		<td class="text-center"><?= $no; ?></td>
		<th><?= $r['nama_obat']; ?></th>
		</tr>
		<?php $no++;} ?>
		</table>
		<br>
		<table width="100%">
		<tr>
		<td></td>
		<td width="300px">
		<p>
		Rawamangun, <?= date('d-m-Y'); ?></p>
		<br>
		Administrator,
		<br><br><br><br>
		<b>____</b>
		</p> 
		</td>
		</tr>
		</table>
		</div>
		</body>
		</html>