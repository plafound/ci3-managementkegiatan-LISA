<div class="pageheader ">
	<h3><i class="fa fa-home"></i> LPJ - <?= $laporan['0']->id?></h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $laporan['0']->kegiatan_id)?>">Kegiatan </a> </li>
			<li> <a href="<?=site_url('c_laporan/index/'. $laporan['0']->kegiatan_id)?>">Laporan </a> </li>
			<li class="active"> <a > LPJ </a> </li>
		</ol>
	</div>
</div>
<!-- Basic Data Tables -->
<!--===================================================-->
<!--Page content-->
<!--===================================================-->
<div id="page-content">
	<div class="row">
		<div class="col-md-12">
			<!-- Alert Success -->
			<?php if($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success');?>
			</div>
			<?php endif;?>

			<div class="panel">
				<?php if($cek_role['jabatan']=="3") {?>
				<div class="panel-heading" style="padding: 10px;">
					<a class="btn btn-success" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i>
						Tambah</a>
				</div>
				<?php } else {?>
				<div class="panel-heading">
					<h3 class="panel-title">
						Data LPJ
					</h3>
				</div>
				<?php }?>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Keterangan</th>
								<th>Jumlah</th>
								<th>Satuan</th>
								<th>Total</th>
								<?php if($cek_role['jabatan']=="3") {?>
								<th class="text-center">Action</th>
								<?php }?>
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

								<?php if($cek_role['jabatan']=="3") {?>
								<td width="350">
									<a href="#" class=" btn btn-small btn-edit" data-toggle="modal"
										data-target="#modalUbah" data-id="<?=$lpj->id?>"
										data-laporan_id="<?=$lpj->laporan_id?>"
										data-keterangan="<?=$lpj->keterangan?>" data-jumlah="<?=$lpj->jumlah?>"
										data-satuan="<?=$lpj->satuan?>" data-total="<?=$lpj->total?>">
										<i class=" fa fa-pencil"></i>
										Edit</a>
									<a href="<?php echo site_url('c_lpj/hapus/'. $lpj->id .  "/" . $lpj->laporan_id)?>"
										class="btn btn-small text-danger">
										<i class="fa fa-trash"></i>
										Hapus</a>
								</td>
								<?php }?>
							</tr>
							<?php 
							$i++;
						endforeach; 
							}  ?>
						</tbody>
						<tfoot>
							<?php if(!empty($total_lpj)) {?>
							<?php foreach($total_lpj as $total) : ?>
							<tr class="font-bold">
								<th colspan="4" class="text-right">Total</th>
								<th colspan="2" class="text-left ">Rp. <?= number_format($total_lpj->total_all) ?> </th>
							</tr>
							<?php endforeach;?>
							<?php }?>
						</tfoot>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal tambah kegiatan -->
<div class="modal modal-default fade" id="modalAdd">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah LPJ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_lpj/tambah')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="laporan_id" value="<?=$laporan[0]->id?>">
					<div class="form-group">
						<label class="control-label">Keterangan</label>
						<input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off"
							required>
					</div>
					<div class="form-group">
						<label class="control-label">Jumlah</label>
						<input type="number" step="0.1" class="form-control" name="jumlah" required>
					</div>
					<div class="form-group">
						<label class="control-label">Satuan</label>
						<input type="text" class="form-control" name="satuan" maxlength="10" required>
					</div>
					<div class="form-group">
						<label class="control-label">Total</label>
						<input type="number" step="0.01" class="form-control" name="total" required>
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

<!-- modal ubah -->
<div class="modal modal-default fade" id="modalUbah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_lpj/ubah')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" class="id">
					<input type="hidden" name="laporan_id" class="laporan_id">
					<div class="form-group">
						<label class="control-label">Keterangan</label>
						<input type="text" class="form-control keterangan" name="keterangan" autocomplete="off"
							required>
					</div>
					<div class="form-group">
						<label class="control-label">Jumlah</label>
						<input type="number" step="0.1" class="form-control jumlah" name="jumlah" required>
					</div>
					<div class="form-group">
						<label class="control-label">Satuan</label>
						<input type="text" class="form-control satuan" name="satuan" maxlength="10" required>
					</div>
					<div class="form-group">
						<label class="control-label">Total</label>
						<input type="number" step="0.01" class="form-control total" name="total" required>
					</div>

					<div class="modal-footer">
						<input type="hidden" name="delName" value="">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span
								class="fa fa-close"></span> Batal</button>
						<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Ubah</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<script src="<?php echo base_url('assets/admin/js/jquery-2.1.1.min.js')?>"></script>


<script>
	$(document).ready(function () {
		// get Edit Product
		$('.btn-edit').on('click', function () {
			// get data from button edit
			const id = $(this).data('id');
			const laporan_id = $(this).data('laporan_id');
			const keterangan = $(this).data('keterangan');
			const jumlah = $(this).data('jumlah');
			const satuan = $(this).data('satuan');
			const total = $(this).data('total');
			// Set data to Form Edit
			$('.id').val(id);
			$('.laporan_id').val(laporan_id);
			$('.keterangan').val(keterangan);
			$('.jumlah').val(jumlah);
			$('.satuan').val(satuan);
			$('.total').val(total);
		});
	});

</script>
