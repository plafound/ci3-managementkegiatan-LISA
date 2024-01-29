<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Edit Tutor </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Tutor </a> </li>
			<li class="active"> Edit </li>
		</ol>
	</div>
</div>
<!--Page content-->
<!--===================================================-->
<div id="page-content">
<!-- Alert Gagal -->
<?php if($this->session->flashdata('gagal')): ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('gagal');?>
		</div>
		<?php elseif($this->session->flashdata('sukses')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('sukses');?>
		</div>
		<?php endif;?>
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><a href="<?php echo site_url('tutor')?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<form action="<?php echo site_url('c_tutor/ubah')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $tutor['id'] ?>" />
				<div class="panel-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="control-label">Nama Tutor</label>
								<input type="text" class="form-control" id="nama" name="nama"
									value="<?= $tutor['nama'] ?>">
							</div>
							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" class="form-control" id="user" name="user"
									value="<?= $tutor['username']?>" disabled>

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
								<input type="password" class="form-control" id="password" name="password"
									value="<? $tutor['password'] ?>">
								<small class="help-block">Please enter password</small>
							</div>
							<div class="form-group">
                                <label class="control-label">Re-type Password</label>
                                <input type="password" class="form-control" id="password2" name="password2">
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
