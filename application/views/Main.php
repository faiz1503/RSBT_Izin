<?php $sso_user_data = $this->session->userdata('sso_user_data');
?>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
	<div class="wrapper">

		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
			<a href="index.html"><img class="brand-img pull-left" src="<?php echo base_url() ?>assets/logo.png" alt="brand" /></a>

			<ul class="nav navbar-right top-nav pull-right">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Hai. <?= $sso_user_data->nama ?></h2></a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?= $sso_user_data->image ?>" alt="user_auth" class="user-auth-img img-circle"><span class="user-online-status"></span></a>
					<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
						<li>
							<a href="#" data-toggle="modal" data-target="#mo_logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
						<li>
					</ul>
				</li>
			</ul>
			<div class="collapse navbar-search-overlap" id="site_navbar_search">
				<form role="search">
					<div class="form-group mb-0">
						<div class="input-search">
							<div class="input-group">
								<input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
								<span class="input-group-addon pr-30">
									<a href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
								</span>
							</div>
						</div>
					</div>
				</form>
			</div>
		</nav>
		<!-- /Top Menu Items -->

		<?php $this->load->view('_sidebar'); ?>

		<!-- Main Content -->
		<div class="page-wrapper pt-0">
			<div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<?php $this->load->view($page_content); ?>
					</div>
				</div>
				<!-- /Row -->
			</div>

			<!-- modal  -->
			<div id="mo_Bantuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">BANTUAN</h5>
						</div>
						<div class="modal-body">
							<!-- <h5 class="mb-15">Overflowing text to show scroll behavior</h5> -->
							<p>SSO RSBT KARIMUN merupakan pintu gerbang pertama ketika ingin masuk ke salah satu sistem RSBT Karimun</p>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-5">
						<a href="index.html" class="brand mr-30"><img src="<?php echo base_url() ?>assets/logo.png" alt="logo" /></a>
						<ul class="footer-link nav navbar-nav">
							<li class="logo-footer"><a href="#" data-toggle="modal" data-target="#mo_Bantuan">bantuan</a></li>
						</ul>
					</div>
					<div class="col-sm-7 text-right">
						<p>2020 &copy; Development by EDP</p>
					</div>
				</div>


				<!-- Logout modal -->
				<div id="mo_logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title" id="myModalLabel">Anda yakin ingin keluar?</h5>
							</div>
							<div class="modal-body">Pilih "Logout" untuk keluar dari akun anda.</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
								<a class="btn btn-primary" href="<?= base_url('Main/logout'); ?>">Logout</a>
							</div>
						</div>
					</div>
				</div>
				<!--  -->

				<!-- Back modal -->
				<div id="mo_back" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title" id="myModalLabel">Anda yakin ingin kembali ke Dashboard SSO?</h5>
							</div>
							<div class="modal-body">Pilih "Yakin" untuk kembali ke dashboard SSO.</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
								<a class="btn btn-primary" href="<?= base_url('Main/back'); ?>">Yakin</a>
							</div>
						</div>
					</div>
				</div>
				<!--  -->