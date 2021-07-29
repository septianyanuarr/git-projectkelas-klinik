<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$title; ?></title>
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
		<small>Jl. Pemuda Kec. Rawamangun Jawa Barat</small>
		<hr>
		<h4 class="text-center">LAPORAN DATA KUNJUNGAN</h4>
		<a class="btn btn-primary" href="<?php echo base_url('kunjungan/print')?>"><i class="fa fa-print"></i>Print</a>
		<a class="btn btn-danger" href="<?php echo base_url('kunjungan/pdf')?>"><i class="fa fa-file"></i>Export PDF</a>
		<a class="btn btn-warning" href="<?php echo base_url('kunjungan/excel')?>"><i class="fa fa-file"></i>EXCEL</a>
		<a href="<?= base_url('dashboard'); ?>" class="btn btn-warning btn-sm
                float-right">Kembali</a>
		
		<table class="table table-bordered table-sm">
		<tr>
		<th width="80px">No.</th>
		<th>Tgl. Kunjungan</th>
		<th>Nama Pasien</th>
		<th>L/P</th>
		<th>Umur</th>
		<th>Keluhan</th>
		<th>Diagnosa</th>
		<th>Penatalaksanaan</th> 
		</tr>
		<?php $no=1; foreach($kunjungan  as $r){ ?>
		<tr>
		<td class="text-center"><?= $no; ?></td>
		<td><?= $r['tgl_berobat']; ?></td>
		<td><?= $r['nama_pasien']; ?></td>
		<td><?= $r['jenis_kelamin']; ?></td>
		<td><?= $r['umur']; ?></td>
		<td><?= $r['keluhan_pasien']; ?></td>
		<td><?= $r['hasil_diagnosa']; ?></td>
		<td><?= $r['penatalaksanaan']; ?></td>
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
		<b>__________</b>
		</p> 
		</td>
		</tr>
		</table>
		</div>
		</body>
		</html>