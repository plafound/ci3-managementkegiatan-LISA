<div class="pageheader ">
	<h3><i class="fa fa-home"></i> LAPORAN - <?=$kegiatan['kegiatan']?> </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $kegiatan['id'])?>">Kegiatan </a> </li>
			<li class="active"> Laporan</li>
		</ol>
	</div>
</div>
<div id="page-content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-control">
						<?php if(isset($cek_role['jabatan'])) {
						$cek_role['jabatan'] = $cek_role['jabatan'];
						 } else {
						$cek_role['jabatan'] = "";
						 }
						 ?>
						<?php if(isset($laporan) && $cek_role['jabatan']=="3") { ?>
						<a class="btn btn-success" href="<?= site_url('c_lpj/index/'). $laporan['id']?>"><i
								class="fa fa-plus-circle"></i> Tambah LPJ</a>
						<?php } ?>
					</div>
					<h3 class="panel-title" href=""> Laporan </h3>
				</div>

				<?php if(isset($laporan)) : ?>
				<div class="panel-body">
					<table class="table table-hover">

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
							<tr>
								<td>Acc Ketua Panitia</td>
								<td>:</td>
								<td>
									<?php if($laporan['acc_kpnt']!="0") : ?>
									<i class="text-primary fa fa-check-circle"></i>
									<?php else : ?>
									<i class="text-danger fa fa-times-circle"></i>
									<?php endif;?>
								</td>
							</tr>
							<tr>
								<td>Acc Bendahara PKBM</td>
								<td>:</td>
								<td>
									<?php if($laporan['acc_bpkbm']!="0") : ?>
									<i class="text-primary fa fa-check-circle"></i>
									<?php else : ?>
									<i class="text-danger fa fa-times-circle"></i>
									<?php endif;?>
								</td>
							</tr>
							<tr>
								<td>Acc Ketua PKBM</td>
								<td>:</td>
								<td>
									<?php if($laporan['acc_kpkbm']!="0") : ?>
									<i class="text-primary fa fa-check-circle"></i>
									<?php else : ?>
									<i class="text-danger fa fa-times-circle"></i>
									<?php endif;?>
								</td>
							</tr>
						</tbody>
					</table>

					<div>
						<h1 class="text-center">LPJ</h1>
						<table class="table table-striped table-bordered">
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
							if (!empty($lpj)) {
								$i=1;
								$total_all = 0;
							foreach ($lpj as $lpj): ?>
								<tr>
									<td width="70">
										<?php echo $i ?>
									</td>
									<td width="200">
										<?php echo $lpj->keterangan ?>
									</td>
									<td width="150">
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
									<th colspan="4" class="text-right">Total</th>
									<th colspan="2" class="text-left ">Rp. <?= number_format($total_lpj->total_all)?>
									</th>
								</tr>
								<?php endforeach;?>
							</tfoot>

						</table>
					</div>



					<!-- CEK JIKA KETUA BISA ACC/TOLAK -->
					<?php if($cek_role['jabatan']=="1" ) : ?>
					<?php if($laporan['acc_bpkbm']==0 && $laporan['acc_kpkbm']==0) {?>
					<a class="btn btn-success"
						href="<?= site_url('c_laporan/acc_kpnt/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-check"></i>Setujui</a>
					<a class="btn btn-danger"
						href="<?= site_url('c_laporan/revisi_kpnt/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-close"></i>Tolak</a>
					<?php }?>

					<!-- ACC BENDAHARA PKBM -->
					<?php elseif($laporan['acc_kpnt']!="0" && $this->session->userdata('jabatan')=="2") : ?>
					<?php if($laporan['acc_kpkbm']==0) {?>
					<a class="btn btn-success"
						href="<?= site_url('c_laporan/acc_bpkbm/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-check"></i>Setujui</a>
					<a class="btn btn-danger"
						href="<?= site_url('c_laporan/revisi_bpkbm/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-close"></i>Tolak</a>
					<?php }?>

					<!-- ACC KETUA PKBM -->
					<?php elseif($laporan['acc_kpnt']!="0" && $laporan['acc_bpkbm']!="0" && $this->session->userdata('jabatan')=="1") : ?>
					<a class="btn btn-success"
						href="<?= site_url('c_laporan/acc_kpkbm/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-check"></i>Setujui</a>

					<a class="btn btn-danger"
						href="<?= site_url('c_laporan/revisi_kpkbm/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-close"></i>Tolak</a>
					<!-- CEK JIKA STATUS SEKRETARIS  -->
					<?php elseif($cek_role['jabatan']=="2" ) : ?>
					<div>
						<?php if($laporan['acc_kpkbm']==0 && $laporan['acc_kpnt']==0 && $laporan['acc_bpkbm']==0) {?>
						<a class="btn btn-mint"
							href="<?= site_url('c_laporan/ubah/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
								class=" fa fa-pencil"></i>Ubah</a>
						<a class="btn btn-danger"
							href="<?= site_url('c_laporan/hapus/'. $laporan['id'] ."/" . $kegiatan['id'])?>"><i
								class=" fa fa-trash"></i>Hapus</a>
						<?php }?>
						<?php if($laporan['acc_kpkbm']!=0 && $laporan['acc_kpnt']!=0 && $laporan['acc_bpkbm']!=0) {?>
						<a class="btn btn-mint" href="<?= site_url('c_laporan/cetak/'. $laporan['kegiatan_id'] )?>"><i
								class=" fa fa-print"></i>Cetak</a>
						<?php }?>
					</div>
					<?php endif;?>


				</div>
				<?php else : ?>
				<div class="panel-body">

					<?php if($cek_role['jabatan']=="2" || $cek_role['jabatan']=="3") : ?>
					<a class="btn btn-success" data-toggle="modal" data-target="#modalAddLaporan"><i
							class="fa fa-plus"></i>Buat Laporan</a>
					<?php else : ?>
					<h2>BELUM ADA LAPORAN</h2>
					<?php endif;?>
				</div>

				<?php endif;?>
			</div>
		</div>
	</div>
</div>



<!-- modal tambah Laporan -->
<div class="modal modal-default fade" id="modalAddLaporan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Laporan - <?=$kegiatan['kegiatan']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_laporan/tambah')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="kegiatan_id" value="<?=$kegiatan['id']?>">
					<div class="form-group">
						<label class="control-label">Tanggal Mulai</label>
						<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai"
							value="<?php echo date('Y-m-d')?>" required>
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Selesai</label>
						<input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai"
							value="<?php echo date('Y-m-d')?>" required>
					</div>

					<div class="modal-footer">
						<input type="hidden" name="delName" value="">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span
								class="fa fa-close"></span> Batal</button>
						<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Tambah</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
