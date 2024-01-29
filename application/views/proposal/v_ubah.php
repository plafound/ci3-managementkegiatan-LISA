<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Ubah Proposal - </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
		<li> <a href="<?=site_url('home')?>"> Home </a></li>
			<li> <a href="<?=site_url('c_kegiatan/detail/'. $proposal[0]->kegiatan_id)?>">Kegiatan </a> </li>
			<li> <a href="<?=site_url('c_proposal/lihat/'. $proposal[0]->kegiatan_id)?>">Proposal </a> </li>
			<li class="active"> <a> Ubah Proposal </a> </li>
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
				<h3 class="panel-title">
						<i class="fa fa-arrow-left"></i>
						Back</h3>
			</div>
			<form action="<?php echo site_url('c_proposal/ubah')?>" method="post" enctype="multipart/form-data"
				class="p-5">
				<div class="panel-body">
					<div class="row">
						<div class="col">
							
							<input type="hidden" name="id" value="<?=$proposal[0]->id?>">
							<input type="hidden" name="kegiatan_id" value="<?=$proposal[0]->kegiatan_id?>">
							<div class="form-group">
								<label class="control-label">Judul</label>
								<input type="text" class="form-control" id="judul" name="judul" value="<?=$proposal[0]->judul?>"required>
							</div>
							<div class="form-group">
								<label class="control-label">Tanggal Mulai</label>
								<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?=$proposal[0]->tgl_mulai?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">Tanggal Selesai</label>
								<input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?=$proposal[0]->tgl_selesai?>"required>
							</div>
							<div class="form-group">
								<label class="control-label">Tujuan</label>
								<textarea class="form-control" name="tujuan"  id="tujuan" >
									<?=$proposal[0]->tujuan?>
								</textarea>
							</div>
							<div class="text-right">
								<button class="btn btn-info " type="submit">Submit</button>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>

