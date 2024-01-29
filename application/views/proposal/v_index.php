<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Proposal -  <?= $kegiatan['kegiatan']?></h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Proposal </a> </li>
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
			<?php endif;?>

			<div class="panel">
				<div class="panel-heading" style="padding: 10px;">
					<a class="btn btn-success" href="<?= site_url("c_proposal/tambah/".$kegiatan['id'])?>"><i
							class="fa fa-plus"></i>
						Tambah Proposal</a>
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
							if (!empty($proposal)) {
								$i=1;
							foreach ($proposal as $proposal): ?>
							<tr>
								<td width="70">
									<?php echo $i ?>
								</td>
								<td>
									<?php echo $proposal->judul ?>
								</td>
								<td>
									<?php echo $proposal->tgl_mulai ?>
								</td>

								<td width="350">
									<a href="<?php echo site_url('c_proposal/lihat/'.$proposal->id) ?>"
										class="btn btn-primary"><i class="fa fa-eye"></i> Lihat</a>
									<a href="#" class=" btn btn-small btn-edit">
										<i class=" fa fa-pencil"></i>
										Edit</a>
									<a href="<?php echo site_url('c_proposal/hapus/'. $proposal->id)?>"
										class="btn btn-small text-danger">
										<i class="fa fa-trash"></i>
										Hapus</a>
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
