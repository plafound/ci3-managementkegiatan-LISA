<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Kegiatan </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="<?= site_url('home') ?>"> Home </a> </li>
			<li class="active"> Kegiatan </li>
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
				<div class="panel-heading" ">
					<h3 class=" panel-title"> Kegiatan </h3>
				</div>
				<div class="panel-body">

					<a href="<?= site_url('c_panitia/index/'.$kegiatan['id']) ?>">
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body bg-primary">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no"><i class="fa fa-group"></i> Panitia</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>

					<a href="<?= site_url('c_proposal/lihat/'.$kegiatan['id']) ?>">
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body bg-success">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no">
												<i class="fa fa-file-text"></i> Proposal
											</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>

					<a href="<?= site_url('c_kegiatan_dok/dokumentasi/'.$kegiatan['id']) ?>">
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body bg-info">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no"><i class="fa fa-camera"></i> Dokumentasi</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>

					<a href="<?= site_url('c_laporan/index/'.$kegiatan['id']) ?>">
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body" style="background-color:#8e0dde;color:#fff;">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no"><i class="fa fa-money"></i> Laporan</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>

					<a href="<?= site_url('c_rapat/index/'.$kegiatan['id'])?>">
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body bg-warning">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no"><i class="fa fa-briefcase"></i> Rapat</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
