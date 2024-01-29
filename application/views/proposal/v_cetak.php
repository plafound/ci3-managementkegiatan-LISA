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
			text-align: left;
			background-color: #D9E2F3;
			color: #000;
		}

		#table_rab {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#table_rab td,
		#table_rab th{
			border: 1px solid #000;
			padding: 3px;
		}

		#table_rab tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#table_rab tr:hover {
			background-color: #ddd;
		}

		#table_rab th {
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
				<td width="200px">Judul</td>
				<td width="10px">:</td>
				<td><?= $proposal['judul'] ?></td>
			</tr>
			<tr>
				<td>Tanggal Mulai</td>
				<td>:</td>
				<td><?=$proposal['tgl_mulai']?></td>
			</tr>
			<tr>
				<td>Tanggal Selesai</td>
				<td>:</td>
				<td><?= $proposal['tgl_selesai']?></td>
			</tr>
			<tr>
				<td>Tujuan</td>
				<td>:</td>
				<p><?= $proposal['tujuan']?></p>
			</tr>
		</tbody>
	</table>


	<div>
		<h1 style="text-align:center;">RAB</h1>
		<table id="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Keterangan</th>
					<th>Jumlah</th>
					<th>Satuan</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php 
							if (!empty($rab)) {
								$i=1;
								$total_all = 0;
							foreach ($rab as $rab): ?>
				<tr>
					<td width="70">
						<?php echo $i ?>
					</td>
					<td width="100">
						<?php echo $rab->keterangan ?>
					</td>
					<td width="150">
						<?php echo $rab->jumlah ?>
					</td>
					<td>
						<?php echo $rab->satuan ?>
					</td>
					<td>
						Rp. <?= number_format($rab->total) ?>
					</td>

				</tr>
				<?php 
							$i++;
						endforeach; 
							}  ?>
			</tbody>
			<tfoot>
				<?php foreach($total_rab as $total) : ?>
				<tr class="font-bold">
					<th colspan="4" >Total</th>
					<th style="text-align:left;">Rp. <?= number_format($total_rab->total_all)?> </th>
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
