<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Tambah Notulen </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $rapat['kegiatan_id'])?>">Kegiatan </a> </li>
			<li> <a href="<?=site_url('c_rapat/index/'.$rapat['kegiatan_id'])?>"> Rapat </a> </li>
			<li class="active"> <a> Notulen </a> </li>
		</ol>
	</div>
</div>
<!--Page content-->
<!--===================================================-->
<div id="page-content">
	<div class="col-md-12">
		<!-- Alert Gagal -->
		<?php if($this->session->flashdata('gagal')): ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('gagal');?>
		</div>
		<?php endif;?>
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><a href="<?=site_url('c_rapat/index/'.$rapat['kegiatan_id'])?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<?php if(isset($cek_role['jabatan'])) {
						$cek_role['jabatan'] = $cek_role['jabatan'];
						 } else {
						$cek_role['jabatan'] = "";
						 }
						 ?>
			<?php 
			if($rapat['notulen']=="") {?>
			<div class="panel-body">
				<h2>BELUM ADA NOTULEN</h2>
				<?php if($cek_role['jabatan']=="2") {?>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#modalNotulen"><i
						class="fa fa-plus"></i>Buat Notulen</a>
				<?php } ?>
			</div>
			<?php }else{?>
			<div class="panel-body">
				<p><?=$rapat['notulen']?></p>
			</div>
			<div>
				<?php if($cek_role['jabatan']=="2") {?>
				<a class="btn btn-mint" href="<?=site_url('c_rapat/form_notulen/'.$rapat['id'])?>"><i
						class="fa fa-pencil"></i>Ubah</a>
				<a class="btn btn-danger" href="<?= site_url('c_rapat/hapus_notulen/'.$rapat['id'])?>"><i
						class=" fa fa-trash"></i>Hapus</a>
				<?php } ?>

			</div>
			<?php }?>
		</div>
	</div>
</div>



<!-- modal tambah notulen -->
<div class="modal modal-default fade" id="modalNotulen">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Notulen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_rapat/update_notulen')?>" method="post"
					enctype="multipart/form-data" class="p-5">
					<div class="panel-body">
						<div class="row">
							<div class="col">
								<input type="hidden" name="id" value="<?=$rapat['id']?>">
								<div class="form-group">
									<label class="control-label">Notulen</label>
									<textarea class="form-control" name="notulen" id="notulen"></textarea>
								</div>
								<div class="text-right">
									<button class="btn btn-info " type="submit">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
