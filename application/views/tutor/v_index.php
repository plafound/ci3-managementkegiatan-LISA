<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Data Tutor </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Data Tutor </a> </li>
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
				<div class="panel-heading" style="padding: 10px;">
					<a href="<?php echo site_url('c_tutor/form_tambah') ?>" class="btn btn-success "><i
							class="fa fa-plus"></i>
						Add
						Tutor</a>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Tutor</th>
								<th>Jabatan</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							if (!empty($tutor)) {
								$i=1;
							foreach ($tutor as $tutor): ?>
							<tr>

								<td width="70">
									<?php echo $i ?>
								</td>
								<td>
									<?php echo $tutor->nama ?>
								</td>
								<td>
									<?php if($tutor->jabatan==1){
										echo "Ketua PKBM";
									}elseif($tutor->jabatan==2){
											echo "Bendahara PKBM";
										} elseif($tutor->jabatan==3){
											echo "Tutor";
										}
										?>
								</td>

								<td width="350">
									<a href="<?php echo site_url('c_tutor/form_ubah/'.$tutor->id) ?>"
										class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo site_url('c_tutor/hapus/'.$tutor->id) ?>"
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




