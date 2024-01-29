<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Ubah Notulen </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $rapat['kegiatan_id'])?>">Kegiatan </a> </li>
			<li> <a href="<?=site_url('c_rapat/index/'.$rapat['kegiatan_id'])?>"> Rapat </a> </li>
			<li> <a href="<?=site_url('c_rapat/notulen/'.$rapat['id'])?>"> Notulen </a> </li>
			<li class="active"> <a > Ubah Notulen </a> </li>
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
				<h3 class="panel-title"><a href="<?=site_url('c_rapat/notulen/'.$rapat['id'])?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<div class="panel-body">
			<form action="<?php echo site_url('c_rapat/update_notulen')?>" method="post"
					enctype="multipart/form-data" class="p-5">
					<div class="panel-body">
						<div class="row">
							<div class="col">
								<input type="hidden" name="id" value="<?=$rapat['id']?>">
								<div class="form-group">
									<label class="control-label">Notulen</label>
									<textarea class="form-control" name="notulen" id="notulen">
										<?=$rapat['notulen']?>
									</textarea>
								</div>
								<div class="text-right">
									<button class="btn btn-info " type="submit">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
