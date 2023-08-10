<!-- END SIDEBAR-->
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
		<div class="ibox">
			<div class="ibox-head">
				<div class="ibox-title">Data Buku</div>
				<!-- <?php if ($this->session->userdata('username') == "") { ?>
					<button data-toggle="modal" data-target="#addpinjam" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
						Pinjam Buku
					</button>
				<?php } else { ?>
					<button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
						Pinjam Buku
					</button>
				<?php }
				?> -->
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No Buku</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>ISBN</th>
							<th>Stok Buku</th>
							<th>Status Buku</th>
							<th>Sampul Buku</th>
							<th>Setting</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No Buku</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>ISBN</th>
							<th>Stok Buku</th>
							<th>Status Buku</th>
							<th>Sampul Buku</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($buku as $key => $value) { ?>
							<?php if ($value->file == NULL) { ?>

							<?php } else { ?>
								<tr>
									<td>
										<a href="<?= base_url('buku/detail/' . $value->id_buku) ?>"><?= $value->no_buku ?></a>
									</td>
									<td><?= $value->judul ?></td>
									<td><?= $value->pengarang ?></td>
									<td><?= $value->penerbit ?></td>
									<td><?= $value->isbn ?></td>
									<td><?= $value->stok ?></td>
									<td>
										<?php if ($value->status === '1' && $value->stok <= '1') { ?>
											<span class="badge badge-warning">Buku Dipinjam</span>
										<?php } elseif ($value->status === '1' && $value->stok >= '1') { ?>
											<span class="badge badge-success">Buku Diperpus</span>
										<?php } elseif ($value->status === '0') { ?>
											<span class="badge badge-success">Buku Diperpus</span>
										<?php } ?>
									</td>
									<td><a href="<?= base_url('buku/detail/' . $value->id_buku) ?>"><img src="<?= base_url('assets/sampul/' . $value->sampul) ?>" alt="" width="100px"></a></td>
									<td>
										<?php if ($this->session->userdata('level_user') == '4' || $this->session->userdata('level_user') == '5' || $this->session->userdata('level_user') == '6') { ?>
											<a href="<?= base_url('buku/download/' . $value->id_buku) ?>" class="btn btn-danger btn-sm"><i class="fa fa-download"></i>Download</a>
											<a href="<?= base_url('buku/baca_buku1/' . $value->id_buku) ?>" class="btn btn-primary btn-sm"><i class="fa fa-book"></i>Baca</a>
											<?php if ($value->stok >= '1') { ?>
												<a href="<?= base_url('master/pinjam_baru/' . $value->no_buku) ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i>Pinjam Buku</a>
											<?php } ?>
										<?php } else { ?>
											<button data-toggle="modal" data-target="#baca<?= $value->id_buku ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-book"></i>
												Baca
											</button>
											<?php if ($value->stok >= '1') { ?>
												<button data-toggle="modal" data-target="#addpinjam" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
													Pinjam Buku
												</button>
											<?php } ?>
										<?php } ?>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- /.modal Add -->
		<div class="modal fade" id="add">
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
						echo form_open('master/pinjam');
						?>
						<?php $id_peminjaman = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
						<input name="id_peminjaman" value="<?= $id_peminjaman ?>" type="hidden">
						<div class="form-group">
							<label>Atas Nama</label>
							<input type="text" name="id_user" value="<?= $this->session->userdata('nama'); ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama Buku</label>
							<select name="no_buku" id="no_buku" class="form-control">
								<option>---Pilih Buku---</option>
								<?php foreach ($buku as $key => $value) { ?>
									<?php if ($value->status === '0') { ?>
										<option value="<?= $value->no_buku ?>"><?= $value->judul ?></option>
									<?php } elseif ($value->status === '1' && $value->stok >= '1') { ?>
										<option value="<?= $value->no_buku ?>"><?= $value->judul ?></option>
									<?php } elseif ($value->status === '1' && $value->stok <= 1) { ?>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
					<?php
					echo form_close();
					?>
				</div>
			</div>
		</div>

		<?php foreach ($buku as $key => $bukus) { ?>
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
				</div>
			</div>
		<?php } ?>

		<?php foreach ($buku as $key => $pinjam) { ?>
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
							<input name="id_peminjaman" value="<?= $id_peminjaman ?>" type="text">
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