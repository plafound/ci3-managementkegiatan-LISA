<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Rapat - <?=$kegiatan['kegiatan']?> </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $kegiatan['id'])?>">Kegiatan </a> </li>
			<li> <a> Rapat </a> </li>
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
				<div class="panel-heading" style="padding: 10px;">
					<a class="btn btn-success" data-toggle="modal" data-target="#modalAddKegiatan"><i
							class="fa fa-plus"></i>Tambah Rapat</a>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Tanggal Rapat</th>
								<th>Jam Mulai</th>
								<th>Lokasi</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (!empty($rapat)) {
								$i=1;
							foreach ($rapat as $rapat): ?>
							<tr>
								<!-- <td width="40">
									<?php echo $id ?>
								</td> -->
								<td width="40">
									<?php echo $i ?>
								</td>
								<td width="150">
									<?php echo $rapat->tanggal ?>
								</td>
								<td width="150">
									<?php echo $rapat->jam_mulai ?>
								</td>
								<td width="150">
									<?php echo $rapat->lokasi ?>
								</td>

								<td width="350">
									<div class="p-2 m-2">

										<a class="btn btn-primary" href="#">Presensi</a>
										<a class="btn btn-primary" href="<?php echo site_url('c_rapat_doc/doc_rapat/'. $rapat->id)?>">Dokumentasi</a>
										<a class="btn btn-primary" href="<?=site_url("c_rapat/notulen/". $rapat->id)?>">Notulen</a>
										<a href="#" 
											data-id="<?= $rapat->id;?>"
											data-kegiatan_id="<?= $rapat->kegiatan_id;?>"
											data-tanggal="<?= $rapat->tanggal;?>" 
											data-jam_mulai="<?= $rapat->jam_mulai;?>"
											data-lokasi="<?= $rapat->lokasi;?>"
											class=" btn btn-small btn-edit"
											data-toggle="modal" data-target="#modalUbah">
											<i class=" fa fa-pencil"></i>
											Edit</a>
										<a class="btn btn-danger"
										href="<?php echo site_url('c_rapat/hapus/'.  $rapat->id ."/" . $kegiatan['id'])?>">
											<i class="fa fa-trash"></i>
											Hapus</a>	
									</div>
								</td>
							</tr>
							<?php 
							$i++;
						endforeach; 
							}  ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal tambah kegiatan -->
<div class="modal modal-default fade" id="modalAddKegiatan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Rapat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_rapat/tambah')?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="kegiatan_id" value="<?=$kegiatan['id']?>">
				
					<div class="form-group">
						<label class="control-label">Tanggal Mulai</label>
						<input type="date" class="form-control" id="tanggal" name="tanggal"
							value="<?php echo date('Y-m-d')?>" required>
					</div>
					<div class="form-group">
						<label class="control-label">Jam Mulai</label>
						<input type="time" class="form-control" id="jam_mulai" name="jam_mulai" onkeyup="Waktumasuk()" required>
					</div>
					<div class="form-group">
						<label class="control-label">Lokasi</label>
						<input type="text" class="form-control" id="lokasi" name="lokasi" required>
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

<!-- modal ubah kegiatan -->
<div class="modal modal-default fade" id="modalUbah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Rapat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_rapat/ubah')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" class="id">
					<input type="hidden" name="kegiatan_id" class="kegiatan_id">
					<div class="form-group">
						<label class="control-label">Tanggal Mulai</label>
						<input type="date" class="form-control tgl_mulai" id="tanggal" name="tanggal"
							value="<?php echo date('Y-m-d')?>" required>
					</div>
					<div class="form-group">
						<label class="control-label">Jam Mulai</label>
						<input type="time" class="form-control jam_mulai" id="jam_mulai" name="jam_mulai" onkeyup="Waktumasuk()" required>
					</div>
					<div class="form-group">
						<label class="control-label">Lokasi</label>
						<input type="text" class="form-control lokasi" id="lokasi" name="lokasi" required>
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
			const kegiatan_id = $(this).data('kegiatan_id');
			const tanggal = $(this).data('tanggal');
			const jam_mulai = $(this).data('jam_mulai');
			const lokasi = $(this).data('lokasi');
			//const notulen = $(this).data('notulen');

			// Set data to Form Edit
			$('.id').val(id);
			$('.kegiatan_id').val(kegiatan_id);
			$('.tanggal').val(tanggal);
			$('.jam_mulai').val(jam_mulai);
			$('.lokasi').val(lokasi);
			//$('.notulen').val(notulen);
		});
	});

</script>
