<div class="pageheader ">
	<a href="<?= site_url("c_kegiatan")?>">
		<h3><i class="fa fa-home"></i> Dokumentasi </h3>
	</a>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Dokumentasi </a> </li>
			<li class="active"> Home </li>
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
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Dokumentasi</h3>
				</div>
				<div class="panel-body">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th width="150">Dokumentasi</th>
								<th>Keterangan</th>
								<th>Jenis</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							if (!empty($dokumentasi)) {
								$i=1;
							foreach ($dokumentasi as $dokumentasi): ?>
							<tr>

								<td width="70">
									<?php echo $i ?>
								</td>
								<td>
									<img src="<?= base_url('assets/dokumentasi/kegiatan/')?><?= $dokumentasi->namafile?>"
										alt="" class="img img-thumbnail">
								</td>
								<td>
									<?php echo $dokumentasi->keterangan ?>
								</td>
								<td>
									<?php 
									$nama_file = $dokumentasi->namafile;
									$ext = explode('.',$nama_file);
									echo $ext[1];
									?>
								</td>

								<td width="350">
									<a data-toggle="modal" data-target="#modalUbah" data-id="<?= $dokumentasi->id;?>"
										data-keterangan="<?= $dokumentasi->keterangan;?>"
										data-kegiatan_id="<?= $dokumentasi->kegiatan_id;?>"
										class="btn btn-small btn-edit"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo site_url('c_kegiatan_dok/hapus/'.$dokumentasi->id ."/".$kegiatan['id']) ?>"
										class="btn btn-small text-danger"><i class="fa fa-trash"></i>
										Hapus</a>
								</td>
							</tr>
							<?php $i++;
							endforeach; 
							} ?>
						</tbody>
					</table>


				</div>
			</div>
		</div>
	</div>
</div>


<!-- modal ubah keterangan -->
<div class="modal modal-default fade" id="modalUbah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Keterangan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_kegiatan_dok/ubah')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="kegiatan_id" class="kegiatan_id">
					<input type="hidden" name="id" class="id">
					<div class="form-group">
						<label class="control-label">Keterangan</label>
						<input type="text" class="form-control keterangan" id="keterangan" name="keterangan" required>
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
			const keterangan = $(this).data('keterangan');
			const kegiatan_id = $(this).data('kegiatan_id');
			// Set data to Form Edit
			$('.id').val(id);
			$('.keterangan').val(keterangan);
			$('.kegiatan_id').val(kegiatan_id);
		});
	});

</script>
