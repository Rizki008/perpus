<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
	<div class="page-heading">
		<h1 class="page-title">Basic Form</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html"><i class="la la-home font-20"></i></a>
			</li>
			<li class="breadcrumb-item">Basic Form</li>
		</ol>
	</div>
	<div class="page-content fade-in-up">
		<div class="row">
			<div class="col-md-12">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">Basic form</div>
						<div class="ibox-tools">
							<a class="ibox-collapse"><i class="fa fa-minus"></i></a>
							<a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item">option 1</a>
								<a class="dropdown-item">option 2</a>
							</div>
						</div>
					</div>
					<div class="ibox-body">
						<?php
						//notifikasi form kosong
						echo validation_errors('<div class="alert alert-warning alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

						//notifikasi gagal upload gambar
						if (isset($error_upload)) {
							echo '<div class="alert alert-warning alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
						}
						echo form_open_multipart('buku/add') ?>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label for="exampleInputEmail1">No Buku</label>
								<input type="text" class="form-control" name="no_buku" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Buku">
								<?= form_error('no_buku', '<small id="emailHelp" class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-sm-6 form-group">
								<div class="form-group">
									<label for="exampleInputPassword1">Judul Buku</label>
									<input type="text" name="judul" class="form-control" id="exampleInputPassword1" placeholder="Judul Buku">
									<?= form_error('judul', '<small id="emailHelp" class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Pengarang Buku</label>
									<input type="text" name="pengarang" class="form-control" id="exampleInputPassword1" placeholder="Pengarang Buku">
									<?= form_error('pengarang', '<small id="emailHelp" class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Penerbit Buku</label>
									<input type="text" name="penerbit" class="form-control" id="exampleInputPassword1" placeholder="Penerbit Buku">
									<?= form_error('penerbit', '<small id="emailHelp" class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputPassword1">ISBN Buku</label>
									<input type="text" name="isbn" class="form-control" id="exampleInputPassword1" placeholder="ISBN Buku">
									<?= form_error('isbn', '<small id="emailHelp" class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Sampul Buku</label>
									<input type="file" name="sampul" class="form-control" id="exampleInputPassword1" placeholder="Sampul Buku">
									<?= form_error('sampul', '<small id="emailHelp" class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
						<button type="submit" class="btn  btn-primary">Submit</button>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>