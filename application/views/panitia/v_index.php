<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Data Panitia - <?=$kegiatan['kegiatan']?></h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $kegiatan['id'])?>">Kegiatan </a> </li>
			<li class="active"> Data Panitia </li>
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
			<?php if($this->session->flashdata('gagal')): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->flashdata('gagal');?>
			</div>
			<?php endif;?>
			<div class="panel">
				<?php if($this->session->userdata('jabatan')=="1"){?>
				<div class="panel-heading" style="padding: 10px;">
					<a class="btn btn-success " data-toggle="modal" data-target="#modalAddPanitia"><i
							class="fa fa-plus"></i>
						Add
						Panitia</a>
				</div>
				<?php } else {?>
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Panitia</h3>
				</div>
				<?php }?>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Panitia</th>
								<th>Jabatan</th>
								<?php if($this->session->userdata('jabatan')=="1"){?>
								<th class="text-center">Action</th>
								<?php }?>
							</tr>
						</thead>
						<tbody>

							<?php
							if (!empty($panitia)) {
								$i = 1;
								foreach ($panitia as $panitia) : ?>
							<tr>

								<td width="70">
									<?php echo $i ?>
								</td>
								<td>
									<?php echo $panitia->nama_tutor ?>
								</td>
								<td>
									<?php if($panitia->jabatan==1){
										echo "Ketua Panitia";
									}elseif($panitia->jabatan==2){
											echo "Sekretaris";
										} elseif($panitia->jabatan==3){
											echo "Bendahara";
										}
										?>
								</td>
								<?php if($this->session->userdata('jabatan')=="1"){?>
								<td width="350">
									<a href="<?php echo site_url('c_panitia/hapus/' . $panitia->id ."/". $kegiatan['id'])?>"
										class="btn btn-small text-danger"><i class="fa fa-trash"></i>
										Hapus</a>
								</td>
								<?php }?>
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


<div class="modal modal-default fade" id="modalAddPanitia">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Panitia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_panitia/tambah') ?>" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="kegiatan_id" value="<?=$kegiatan['id']?>">
					<div class="form-group">
						<label class="control-label">Nama Tutor</label>
						<select id="tutor_id" name="tutor_id" class="form-control" style="width: 100%;" required>
							<?php foreach ($tutor as $tutor) : ?>
							<option value="<?= $tutor->id ?>"><?= $tutor->nama ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label class="control-label">Jabatan</label>
						<select id="jabatan" name="jabatan" class="form-control" style="width: 100%;" required>
							<option value="1">Ketua Panitia</option>
							<option value="2">Sekretaris</option>
							<option value="3">Bendahara</option>
						</select>
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
