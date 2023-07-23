<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title><?= $title ?></title>
	<!-- GLOBAL MAINLY STYLES-->
	<link href="<?= base_url() ?>backend/dist/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>backend/dist/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>backend/dist/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
	<!-- THEME STYLES-->
	<link href="<?= base_url() ?>backend/dist/assets/css/main.css" rel="stylesheet" />
	<!-- PAGE LEVEL STYLES-->
	<link href="<?= base_url() ?>backend/dist/assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
	<div class="content">
		<div class="brand">
			<a class="link" href="index.html"><?= $title ?></a>
		</div>
		<?php
		echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

		if ($this->session->flashdata('error')) {
			echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-ban"></i> Gagal</h5>';
			echo $this->session->flashdata('error');
			echo '
    </div>';
		}

		if ($this->session->flashdata('pesan')) {
			echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Sukses</h5>';
			echo $this->session->flashdata('pesan');
			echo '</div>';
		}

		?>
		<form id="login-form" action="<?= base_url('admin/register') ?>" method="post">
			<h2 class="login-title">Registrasi</h2>
			<div class="form-group">
				<div class="input-group-icon right">
					<div class="input-icon"><i class="fa fa-envelope"></i></div>
					<input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="Nama Lengkap" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group-icon right">
					<div class="input-icon"><i class="fa fa-envelope"></i></div>
					<input class="form-control" type="text" name="username" value="<?= set_value('username') ?>" placeholder="Username" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group-icon right">
					<div class="input-icon"><i class="fa fa-lock font-16"></i></div>
					<input class="form-control" type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group-icon right">
					<div class="input-icon"><i class="fa fa-lock font-16"></i></div>
					<input class="form-control" type="password" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" placeholder="Ulangi Password">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group-icon right">
					<div class="input-icon"><i class="fa fa-lock font-16"></i></div>
					<input class="form-control" type="number" name="no_hp" value="<?= set_value('no_hp') ?>" placeholder="No HP">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group-icon right">
					<div class="input-icon"><i class="fa fa-lock font-16"></i></div>
					<input class="form-control" type="text" name="alamat" value="<?= set_value('alamat') ?>" placeholder="Alamat">
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-info btn-block" type="submit">Register</button>
			</div>
			<div class="text-center">Not a member?
				<a class="color-blue" href="<?= base_url('home') ?>">Login</a>
			</div>
		</form>
	</div>
	<!-- BEGIN PAGA BACKDROPS-->
	<div class="sidenav-backdrop backdrop"></div>
	<div class="preloader-backdrop">
		<div class="page-preloader">Loading</div>
	</div>
	<!-- END PAGA BACKDROPS-->
	<!-- CORE PLUGINS -->
	<script src="<?= base_url() ?>backend/dist/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>backend/dist/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>backend/dist/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- PAGE LEVEL PLUGINS -->
	<script src="<?= base_url() ?>backend/dist/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	<!-- CORE SCRIPTS-->
	<script src="<?= base_url() ?>backend/dist/assets/js/app.js" type="text/javascript"></script>
	<!-- PAGE LEVEL SCRIPTS-->
	<script type="text/javascript">
		$(function() {
			$('#login-form').validate({
				errorClass: "help-block",
				rules: {
					email: {
						required: true,
						email: true
					},
					password: {
						required: true
					}
				},
				highlight: function(e) {
					$(e).closest(".form-group").addClass("has-error")
				},
				unhighlight: function(e) {
					$(e).closest(".form-group").removeClass("has-error")
				},
			});
		});
	</script>
</body>

</html>