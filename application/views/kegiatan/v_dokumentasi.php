<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Dokumentasi Kegiatan - <?= $kegiatan['kegiatan']?></h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $kegiatan['id'])?>">Kegiatan </a> </li>
			<li class="active"> Dokumentasi Kegiatan </li>
		</ol>
	</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
	<div class="row">
		<!-- Alert Success -->
		<?php if($this->session->flashdata('gagal')): ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('gagal');?>
		</div>
		<?php endif;?>
		<div class="col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<span class="pull-right pad-20">
						<a data-toggle="modal" data-target="#modalUpload"><button class="btn btn-default"
								type="button"><i class="fa fa-upload"></i> Upload</a></button>
						<!-- <a class="btn btn-default"
							href="<?= site_url("c_kegiatan_dok/form_edit/". $kegiatan['id'])?>"><i
								class="fa fa-edit"></i> Edit </a> -->
					</span>
				</div>
				<div class="panel-body">
					<div class="">
						<?php foreach($dokumentasi as $dokumentasi) : ?>
						<div class="col-md-3">
							<?php 
							$nama_file = $dokumentasi->namafile;
							$ext = explode('.',$nama_file);
							if($ext[1] == 'mp4'){ ?>
							<div class="embed-responsive embed-responsive-4by3">
								<video width="540" height="310" controls>
									<source src="<?= base_url('assets/dokumentasi/kegiatan/')?><?= $dokumentasi->namafile?>" type="video/mp4">
								</video>
							</div>

							<?php
									} else {
								?>
							<img src="<?= base_url('assets/dokumentasi/kegiatan/')?><?= $dokumentasi->namafile?>"
								class="img-thumbnail" />
							<?php }?>
							<div class="text-center">
								<p><?= $dokumentasi->keterangan?></p>
								<a data-toggle="modal" data-target="#modalUbah" data-id="<?= $dokumentasi->id;?>"
									data-keterangan="<?= $dokumentasi->keterangan;?>"
									data-kegiatan_id="<?= $dokumentasi->kegiatan_id;?>"
									class="btn btn-small btn-edit"><i class="fa fa-edit"></i> Edit</a>
								<a href="<?php echo site_url('c_kegiatan_dok/hapus/'.$dokumentasi->id ."/".$kegiatan['id']) ?>"
									class="btn btn-small text-danger"><i class="fa fa-trash"></i>
									Hapus</a>
							</div>
						</div>

						<?php endforeach; ?>


					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal upload -->
<div class="modal modal-default fade" id="modalUpload">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Dokumentasi - <?= $kegiatan['kegiatan']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_kegiatan_dok/tambah')?>" method="POST"
					enctype="multipart/form-data">
					<input type="hidden" name="kegiatan_id" value="<?=$kegiatan['id']?>">
					<div class="form-group">
						<label class="control-label">File Dokumentasi</label>
						<input type="file" class="form-control" id="file_dok" name="file_dok" accept="image/*,video/mp4"
							required>
					</div>
					<div class="form-group">
						<label class="control-label">Keterangan</label>
						<input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
