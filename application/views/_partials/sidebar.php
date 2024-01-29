<nav id="mainnav-container">
	<!--Brand logo & name-->
	<!--================================-->
	<div class="navbar-header">
		<a href="index.html" class="navbar-brand">
			<div class="brand-title">
				<img width="50px" src="<?= base_url('assets/assetslogin/');?>img/logo-lisa.png" />
				Kegiatan
			</div>
		</a>
	</div>
	<!--================================-->
	<!--End brand logo & name-->
	<div id="mainnav">
		<!--Menu-->
		<!--================================-->
		<div id="mainnav-menu-wrap">
			<div class="nano">
				<div class="nano-content">

					<ul id="mainnav-menu" class="list-group">
						<!--Category name-->
						<li class="list-header">Navigation</li>
						<!--Menu list item-->
						<li> <a href="<?= site_url('home')?>"> <i class="fa fa-home"></i> <span class="menu-title">
									Dashboard </span> </a> </li>

						<?php if($this->session->userdata('jabatan')== '1' || $this->session->userdata('jabatan')== '2') {?>
						<li>
							<a href="<?= site_url('c_kegiatan')?>"> <i class="fa fa-tasks"></i>
								<span class="menu-title">Kegiatan</span>
							</a>
						</li>
						<li>
							<a href="<?= site_url('c_tutor')?>"> <i class="fa fa-group"></i>
								<span class="menu-title">Tutor</span>
							</a>
						</li>
						<?php }?>
						<li class="list-divider"></li>
						<!--Category name-->

				</div>
			</div>
		</div>
	</div>
</nav>
