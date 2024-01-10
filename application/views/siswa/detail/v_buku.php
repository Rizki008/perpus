<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
	<div class="page-heading">
		<h1 class="page-title"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html"><i class="la la-home font-20"></i></a>
			</li>
			<li class="breadcrumb-item"><?= $title ?></li>
		</ol>
	</div>
	<div class="page-content fade-in-up">
		<div class="row">
			<div class="col-md-12">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">
							<?= $title ?>
						</div>
						<div class="ibox-tools">
							<a class="ibox-collapse"><i class="fa fa-minus"></i></a>
						</div>
					</div>
					<div class="ibox-body">
						<?php foreach ($detail as $key => $value) { ?>
							<div class="card" style="width:300px;">
								<img class="card-img-top" src="<?= base_url('assets/sampul/' . $value->sampul) ?>" />
								<div class="card-body">
									<h4 class="card-title"><?= $value->judul ?></h4>
								</div>
								<ul class="list-group list-group-divider no-margin">
									<li class="list-group-item" style="border-top-color:#e1eaec;">Pengarang
										<span class="badge-circle float-right"><?= $value->pengarang ?></span>
									</li>
									<li class="list-group-item">Penerbit
										<span class="badge-circle float-right"><?= $value->penerbit ?></span>
									</li>
									<li class="list-group-item">ISBN
										<span class="badge-circle float-right"><?= $value->isbn ?></span>
									</li>
									<li class="list-group-item">Stok
										<span class="badge badge-warning badge-circle float-right"><?= $value->stok ?></span>
									</li>
								</ul>
								<div class="card-footer">
									<button data-toggle="modal" data-target="#baca<?= $value->id_buku ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-book"></i>
										Baca Buku
									</button>
									<?php if ($this->session->userdata('level_user') == '4' || $this->session->userdata('level_user') == '5' || $this->session->userdata('level_user') == '6') { ?>
										<?php
										if ($value->stok >= '1') { ?>
											<a href="<?= base_url('master/pinjam_baru/' . $value->no_buku) ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i>Pinjam Buku</a>
										<?php } else { ?>
											<a href="<?= base_url('master/booking/' . $value->no_buku) ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i>Booking Buku</a>
										<?php } ?>
									<?php } else { ?>
										<?php if ($value->stok >= '1') { ?>
											<button data-toggle="modal" data-target="#addpinjam" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
												Pinjam Buku
											</button>
										<?php } else { ?>
											<button data-toggle="modal" data-target="#addbooking" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
												Booking Buku
											</button>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php foreach ($detail as $key => $bukus) { ?>
			<!-- /.modal Add -->
			<div class="modal fade" id="baca<?= $bukus->id_buku ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Baca Buku</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							echo form_open('buku/baca_buku/' . $bukus->id_buku);
							?>
							<input type="hidden" name="id_buku" value="<?= $bukus->id_buku ?>">
							<div class="form-group">
								<label>Atas Nama</label>
								<input type="text" name="nama_baca" class="form-control" placeholder="Nama">
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Baca</button>
						</div>
						<?php
						echo form_close();
						?>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		<?php } ?>

		<?php foreach ($detail as $key => $pinjam) { ?>
			<div class="modal fade" id="addpinjam">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Pinjam Buku</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							echo form_open('master/pinjam_langsung_baru/' . $pinjam->no_buku);
							?>
							<?php $id_peminjaman = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
							<input name="id_peminjaman" value="<?= $id_peminjaman ?>" type="hidden">
							<!-- <div class="row"> -->
							<div class="form-group">
								<label>Nama Peminjam</label>
								<input type="text" name="nama_peminjam" class="form-control" placeholder="Nama Peminjam" required>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Pinjam</button>
						</div>
						<?php
						echo form_close();
						?>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
		<?php } ?>
		<?php foreach ($detail as $key => $booking) { ?>
			<div class="modal fade" id="addbooking">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Booking Buku</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							echo form_open('master/booking_langsung_baru/' . $booking->no_buku);
							?>
							<?php $id_booking = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
							<input name="id_booking" value="<?= $id_booking ?>" type="hidden">
							<!-- <div class="row"> -->
							<div class="form-group">
								<label>Nama Booking</label>
								<input type="text" name="nama_booking" class="form-control" placeholder="Nama booking" required>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Booking</button>
						</div>
						<?php
						echo form_close();
						?>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
		<?php } ?>