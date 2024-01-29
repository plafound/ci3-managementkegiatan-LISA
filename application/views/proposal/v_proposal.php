<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Proposal - <?=$kegiatan['kegiatan']?> </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $kegiatan['id'])?>">Kegiatan </a> </li>
			<li class="active"> Proposal </li>
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
						<?php if(isset($proposal) && $cek_role['jabatan']==3 && $proposal['acc_kpkbm']==0 && $proposal['acc_kpnt']==0 && $proposal['acc_bpkbm']==0) { ?>
						<a class="btn btn-success" href="<?= site_url('c_rab/index/'). $proposal['id']?>"><i class="fa fa-plus-circle"></i> Tambah RAB</a>
						<?php } ?>	
					</div>
					<h3 class="panel-title" href=""> Proposal </h3>
				</div>
				
				<?php if(isset($proposal)) : ?>
				<div class="panel-body">
					<table class="table table-hover">

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
								<td><?= $proposal['tujuan']?></td>
							</tr>
							<tr>
								<td>Acc Ketua Panitia</td>
								<td>:</td>
								<td>
									<?php if($proposal['acc_kpnt']!="0") : ?>
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
									<?php if($proposal['acc_bpkbm']!="0") : ?>
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
									<?php if($proposal['acc_kpkbm']!="0") : ?>
									<i class="text-primary fa fa-check-circle"></i>
									<?php else : ?>
									<i class="text-danger fa fa-times-circle"></i>
									<?php endif;?>
								</td>
							</tr>
						</tbody>
					</table>
						<div>
							<h1 class="text-center">RAB</h1>
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
							if (!empty($rab)) {
								$i=1;
								$total_all = 0;
							foreach ($rab as $rab): ?>
							<tr>
								<td width="70">
									<?php echo $i ?>
								</td>
								<td width="200">
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
								<th colspan="4" class="text-right">Total</th>
								<th colspan="2" class="text-left ">Rp. <?= number_format($total_rab->total_all)?> </th>
							</tr>
							<?php endforeach;?>
						</tfoot>

					</table>
						</div>
					

					<!-- CEK JIKA KETUA BISA ACC/TOLAK -->
					<?php if($cek_role['jabatan']=="1" ) : ?>
					<?php if($proposal['acc_bpkbm']==0 && $proposal['acc_kpkbm']==0) {?>
					<a class="btn btn-success"
						href="<?= site_url('c_proposal/acc_kpnt/'. $proposal['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-check"></i>Setujui</a>
					<a class="btn btn-danger"
						href="<?= site_url('c_proposal/revisi_kpnt/'. $proposal['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-close"></i>Tolak</a>
					<?php }?>

					<!-- ACC BENDAHARA PKBM -->
					<?php elseif($proposal['acc_kpnt']!="0" && $this->session->userdata('jabatan')=="2") : ?>
					<?php if($proposal['acc_kpkbm']==0) {?>
					<a class="btn btn-success"
						href="<?= site_url('c_proposal/acc_bpkbm/'. $proposal['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-check"></i>Setujui</a>
					<a class="btn btn-danger"
						href="<?= site_url('c_proposal/revisi_bpkbm/'. $proposal['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-close"></i>Tolak</a>
					<?php }?>

					<!-- ACC KETUA PKBM -->
					<?php elseif($proposal['acc_kpnt']!="0" && $proposal['acc_bpkbm']!="0" && $this->session->userdata('jabatan')=="1") : ?>
					<a class="btn btn-success"
						href="<?= site_url('c_proposal/acc_kpkbm/'. $proposal['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-check"></i>Setujui</a>

					<a class="btn btn-danger"
						href="<?= site_url('c_proposal/revisi_kpkbm/'. $proposal['id'] ."/" . $kegiatan['id'])?>"><i
							class=" fa fa-close"></i>Tolak</a>
					<!-- CEK JIKA STATUS SEKRETARIS  -->
					<?php elseif($cek_role['jabatan']=="2" ) : ?>
					<div>
						<?php if($proposal['acc_kpkbm']==0 && $proposal['acc_kpnt']==0 && $proposal['acc_bpkbm']==0) {?>
						<a class="btn btn-mint"
							href="<?= site_url('c_proposal/form_ubah/'. $proposal['id'] )?>"><i
								class=" fa fa-pencil"></i>Ubah</a>
						<a class="btn btn-danger"
							href="<?= site_url('c_proposal/hapus/'. $proposal['id'] ."/" . $kegiatan['id'])?>"><i
								class=" fa fa-trash"></i>Hapus</a>
						<?php }?>
						<?php if($proposal['acc_kpkbm']!=0 && $proposal['acc_kpnt']!=0 && $proposal['acc_bpkbm']!=0) {?>
						<a class="btn btn-mint"
							href="<?= site_url('c_proposal/cetak/'. $proposal['kegiatan_id'] )?>"><i
								class=" fa fa-print"></i>Cetak</a>
						<?php }?>
					</div>
					<?php endif;?>
				</div>
				<?php else : ?>
				<div class="panel-body">
					<h2>BELUM ADA PROPOSAL</h2>
					<?php if($cek_role['jabatan']=="2") : ?>
					<a class="btn btn-success" href="<?= site_url('c_proposal/tambah/'. $kegiatan['id'])?>"><i
							class="fa fa-plus"></i>Buat Proposal</a>
					<?php endif;?>
				</div>

				<?php endif;?>
			</div>
		</div>
	</div>
</div>
