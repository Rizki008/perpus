<!-- END SIDEBAR-->
<div class="content-wrapper">
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
			<div class="col-md-4">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Laporan Peminjaman Buku</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<?php
						echo form_open('laporan/lap_pinjam') ?>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tanggal</label>
									<select name="tanggal" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 31; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Bulan</label>
									<select name="bulan" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 12; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<div class="col-md-4">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Laporan Baca Buku</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<?php
						echo form_open('laporan/lap_baca') ?>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tanggal</label>
									<select name="tanggal" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 31; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Bulan</label>
									<select name="bulan" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 12; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>

		</div>
	</div>