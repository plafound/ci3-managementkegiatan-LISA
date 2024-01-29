<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Kegiatan </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Kegiatan </a> </li>
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
			<!-- Alert Success -->
			<?php if($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success');?>
			</div>
			<?php elseif($this->session->flashdata('error')): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->flashdata('error');?>
			</div>
			<?php endif;?>

			<div class="panel">
				<div class="panel-heading" style="padding: 10px;">
					<a class="btn btn-success" data-toggle="modal" data-target="#modalAddKegiatan"><i
							class="fa fa-plus"></i>
						Tambah Kegiatan</a>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Kegiatan</th>
								<th>Tanggal Mulai</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (!empty($kegiatan)) {
								$i=1;
							foreach ($kegiatan as $kegiatan): ?>
							<tr>
								<td width="40">
									<?php echo $i ?>
								</td>
								<td>
									<?php echo $kegiatan->kegiatan ?>
								</td>
								<td width="150">
									<?php echo $kegiatan->tgl_mulai ?>
								</td>

								<td width="350">
									<div class="p-2 m-2">
										<a href="<?php echo site_url('c_kegiatan/detail/'.$kegiatan->id) ?>"
											class="btn btn-primary"><i class="fa fa-chevron-circle-right"></i> Detail</a>
										<a href="#" data-id="<?= $kegiatan->id;?>"
											data-kegiatan="<?= $kegiatan->kegiatan;?>"
											data-tgl_mulai="<?= $kegiatan->tgl_mulai;?>" class=" btn btn-small btn-edit"
											data-toggle="modal" data-target="#modalUbah">
											<i class=" fa fa-pencil"></i>
											Edit</a>
											<?php if($this->session->userdata('jabatan') == "1") {?>
										<a href="<?php echo site_url('c_kegiatan/hapus/'. $kegiatan->id)?>"
											class="btn btn-small text-danger">
											<i class="fa fa-trash"></i>
											Hapus</a>
											<?php }?>
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
				<h5 class="modal-title">Tambah Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_kegiatan/tambah')?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label">Nama Kegiatan</label>
						<input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Mulai</label>
						<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai"
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

<!-- modal ubah kegiatan -->
<div class="modal modal-default fade" id="modalUbah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_kegiatan/ubah')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" class="id">
					<div class="form-group">
						<label class="control-label">Nama Kegiatan</label>
						<input type="text" class="form-control kegiatan" id="kegiatan" name="kegiatan" required>
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Mulai</label>
						<input type="date" class="form-control tgl_mulai" id="tgl_mulai" name="tgl_mulai">
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
			const kegiatan = $(this).data('kegiatan');
			const tgl_mulai = $(this).data('tgl_mulai');
			// Set data to Form Edit
			$('.id').val(id);
			$('.kegiatan').val(kegiatan);
			$('.tgl_mulai').val(tgl_mulai);
		});
	});

</script>
