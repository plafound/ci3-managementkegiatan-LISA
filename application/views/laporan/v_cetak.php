<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<style>
		body {
			font-family: sans-serif;
			font-size: 12px;
		}

		#table {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#table td,
		#table th {
			/* border: px solid #ddd; */
			padding: 3px;
		}

		#table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#table tr:hover {
			background-color: #ddd;
		}

		#table th {
			padding-top: 10px;
			padding-bottom: 10px;
			text-align: center;
			background-color: #D9E2F3;
			color: #000;
		}

		#table_lpj {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#table_lpj td,
		#table_lpj th{
			border: 1px solid #000;
			padding: 3px;
		}

		#table_lpj tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#table_lpj tr:hover {
			background-color: #ddd;
		}

		#table_lpj th {
			padding-top: 10px;
			padding-bottom: 10px;
			text-align: center;
			background-color: #D9E2F3;
			color: #000;
		}
		

	</style>
</head>

<body>
	<img src="<?=base_url('assets/img/kop.png')?>" style="padding:0;margin:0;" width="100%">
	<hr>
	<table id="table">

						<tbody>
							<tr>
								<td width="200px">Kegiatan</td>
								<td width="10px">:</td>
								<td><?= $laporan['nama_kegiatan'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Mulai</td>
								<td>:</td>
								<td><?=$laporan['tgl_mulai']?></td>
							</tr>
							<tr>
								<td>Tanggal Selesai</td>
								<td>:</td>
								<td><?= $laporan['tgl_selesai']?></td>
							</tr>
						</tbody>
					</table>

					<div>
							<h1 style="text-align:center;">LPJ</h1>
						<table id="table_lpj">
						<thead>
							<tr >
								<th>#</th>
								<th >Keterangan</th>
								<th>Jumlah</th>
								<th>Satuan</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (!empty($lpj)) {
								$i=1;
								$total_all = 0;
							foreach ($lpj as $lpj): ?>
							<tr>
								<td >
									<?php echo $i ?>
								</td>
								<td >
									<?php echo $lpj->keterangan ?>
								</td>
								<td >
									<?php echo $lpj->jumlah ?>
								</td>
								<td>
									<?php echo $lpj->satuan ?>
								</td>
								<td>
									Rp. <?= number_format($lpj->total) ?>
								</td>

							</tr>
							<?php 
							$i++;
						endforeach; 
							}  ?>
						</tbody>
						<tfoot>
							<?php foreach($total_lpj as $total) : ?>
							<tr class="font-bold">
								<th colspan="4" style="text-align:left;">Total</th>
								<th style="text-align:left;">Rp. <?= number_format($total_lpj->total_all)?> </th>
							</tr>
							<?php endforeach;?>
						</tfoot>

					</table>
						</div>
	<br>
	<table>
		<tr>
			<td style="text-align:center;">
			<p>Kediri,<?=date('d-m-Y')?></p>
				<p>Ketua PKBM</p>
				<br><br>
				<p>Nama Ketua</p>
			</td>
		</tr>


	</table>
</body>

</html>
