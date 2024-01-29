<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body>
	<div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">
		<!--NAVBAR-->
		<!--===================================================-->
		<?php $this->load->view("_partials/navbar.php") ?>

		<!--===================================================-->
		<!--END NAVBAR-->
		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				<div class="pageheader hidden-xs">
					<h3><i class="fa fa-home"></i> Dashboard - <?php echo $this->session->userdata('nama'); ?> </h3>

					<div class="breadcrumb-wrapper">
						<span class="label">You are here:</span>
						<ol class="breadcrumb">
							<li> <a href="#"> Home </a> </li>
							<li class="active"> Dashboard </li>
						</ol>
					</div>
				</div>

				<!--Page content-->
				<!--===================================================-->
				<?php if($this->session->userdata('jabatan')== '3') {?>
				<div id="page-content">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> Kegiatan Saya </h3>
								</div>
								<div class="panel-body">
									<?php foreach($kegiatan as $kegiatan) :?>
									<a href="<?= site_url('c_kegiatan/detail/'.$kegiatan->kegiatan_id)?>">
										<div class="col-md-3 eq-box-md grid">
											<div class="panel">
												<div class="panel-body bg-primary">
													<div class="row">
														<div class="col-md-9 col-sm-9 col-xs-10">
															<h3 class="mar-no text-uppercase"> <?=$kegiatan->kegiatan?>
															</h3>

															<?php 
														if($kegiatan->jabatan =="1"){
															$jabatan = "Ketua Panitia";
														} elseif($kegiatan->jabatan=="2"){
															$jabatan = "Sekretaris";
														} elseif($kegiatan->jabatan=="3"){
															$jabatan = "Bendahara";
														}
														?>
															<small>Jabatan : <?=$jabatan?> </small>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<?php endforeach ;?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if($this->session->userdata('jabatan')== '1' || $this->session->userdata('jabatan')== '2' ) {?>
				<div id="page-content">
					<div class="row">
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no"> <span class="counter"><?= $jumlah_kegiatan?></span></h3>
											<p class="mar-ver-5"> Kegiatan </p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no"> <span class="counter"><?= $jumlah_tutor?></span></h3>
											<p class="mar-ver-5"> Tutor </p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 eq-box-md grid">
							<div class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-10">
											<h3 class="mar-no"> <span class="counter"><?= $jumlah_rapat?></span></h3>
											<p class="mar-ver-5"> Rapat </p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!--===================================================-->
				<!--End page content-->
			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->
			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<?php $this->load->view("_partials/sidebar.php") ?>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->
		</div>
		<!-- FOOTER -->
		<!--===================================================-->
		<?php $this->load->view("_partials/footer.php") ?>
		<!--===================================================-->
		<!-- END FOOTER -->
		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->

	<!-- JavaScript -->
	<?php $this->load->view("_partials/script.php") ?>


</body>

</html>
