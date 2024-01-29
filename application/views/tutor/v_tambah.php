<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Tambah Tutor </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Tambah Tutor </a> </li>
			<li class="active"> Tambah </li>
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
				<h3 class="panel-title"><a href="<?php echo site_url('tutor')?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<form action="<?php echo site_url('c_tutor/tambah')?>" method="post" enctype="multipart/form-data">
				<div class="panel-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="control-label">Nama Tutor</label>
								<input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
							</div>
							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" class="form-control" id="user" name="user" required autocomplete="off"  maxlength="10" >
								<small class="help-block">Please enter username</small>
							</div>
							<div class="form-group">
								<label class="control-label">Jabatan</label>
								<select id="jabatan" name="jabatan" class="form-control" style="width: 100%;"
									required>
									<option value="1">Ketua PKBM</option>
									<option value="2">Bendahara PKBM</option>
									<option value="3" selected>Tutor</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" class="form-control" id="password" name="password" required>
								<small class="help-block">Please enter password</small>
							</div>
							<div class="form-group">
								<label class="control-label">Re-type Password</label>
								<input type="password" class="form-control" id="password2" name="password2" required>
								<small class="help-block">Please Re-enter password</small>
							</div>

							<div class="text-right">
								<button class="btn btn-info" type="submit">Submit</button>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
