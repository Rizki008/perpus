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
				<div class="ibox-title">Data Peminjaman Buku</div>
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
					<i class="fa fa-plus"></i><br>Peminjaman
				</button>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Peminjaman</th>
							<th>Tanggal Pengembalian</th>
							<th>Waktu Pengembalian</th>
							<th>Status Buku</th>
							<th>Setting</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Peminjaman</th>
							<th>Tanggal Pengembalian</th>
							<th>Waktu Pengembalian</th>
							<th>Status Buku</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($pinjam as $key => $value) { ?>
							<tr>
								<td><?= $value->nama ?> <?= $value->nama_peminjam ?></td>
								<td><?= $value->no_buku ?></td>
								<td><?= $value->tgl_peminjaman ?></td>
								<td><?= $value->tgl_pengembalian ?></td>
								<td>
									<?php $tgl1 = strtotime($value->tgl_peminjaman);
									$tgl2 = strtotime($value->tgl_pengembalian);
									$jarak = $tgl2 - $tgl1;
									$hari = $jarak / 60 / 60 / 24;
									echo $hari, ' Hari';
									?>
								</td>
								<td>
									<?php if ($value->status === '1') { ?>
										<span class="badge badge-warning">Dipinjam</span>
									<?php } elseif ($value->status === '2') { ?>
										<span class="badge badge-success">Dikembalikan</span>
									<?php } elseif ($value->status === '3') { ?>
										<span class="badge badge-danger">Denda</span>
									<?php } ?>
								</td>

								<td>
									<?php if ($value->status === '1') { ?>
										<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#kembali<?= $value->id_peminjaman ?>" href="<?= base_url('master/delete/' . $value->id_peminjaman . '/' . $value->no_buku) ?>">
											<i class="fa fa-info"></i><br>Kembali
										</button>
									<?php } elseif ($value->status === '2') { ?>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- modal pinjam langsung -->
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
						echo form_open('master/pinjam_langsung');
						?>
						<?php $id_peminjaman = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
						<input name="id_peminjaman" value="<?= $id_peminjaman ?>" type="hidden">
						<?php
						$user = $this->m_auth->userall();
						$buku = $this->m_buku->buku();
						?>
						<!-- <div class="row"> -->
						<div class="form-group">
							<label>Nama Peminjam Baru</label>
							<input type="text" name="nama_peminjam" class="form-control" placeholder="Nama Peminjam Baru">
						</div>
						<p>Atau</p>
						<div class="form-group">
							<label>Nama Peminjam Anggota</label>
							<select name="id_user" id="id_user" class="form-control">
								<option>---Pilih Nama Peminjam---</option>
								<?php foreach ($user as $key => $values) { ?>
									<?php if ($values->level_user === '2') { ?>
										<option value="<?= $values->id_user ?>"><?= $values->nama ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<hr>
						<div class="form-group">
							<label>Nama Buku</label>
							<select name="no_buku" id="no_buku" class="form-control">
								<option>---Pilih Buku---</option>
								<?php foreach ($buku as $key => $value) { ?>
									<?php if ($value->status === '0') { ?>
										<option value="<?= $value->no_buku ?>"><?= $value->judul ?></option>
									<?php } elseif ($value->status === '1') { ?>
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
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>

		<!-- Modal kembali -->
		<?php foreach ($pinjam as $key => $value) { ?>
			<div class="modal fade" id="kembali<?= $value->id_peminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Detail Peminjam Buku</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('master/kembali/' . $value->id_peminjaman) ?>" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
							<?php $id_pengembalian = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
							<input type="hidden" name="id_pengembalian" value="<?= $id_pengembalian ?>" id="">
							<input type="hidden" name="no_buku" value="<?= $value->no_buku ?>">
							<div class="modal-body">
								<h5>Nama Peminjam : <strong><?= $value->nama ?></strong></h5>
								<h5>Judul Buku : <strong><?= $value->judul ?></strong></h5>
								<hr>
								<h5>Tanggal Peminjaman : <strong><?= $value->tgl_peminjaman ?></strong></h5>
								<h5>Tanggal Pengembalian : <strong><?= $value->tgl_pengembalian ?></strong></h5>

								<br>
								<br>
								<hr>
								<?php
								$datein = date('Y-m-d');
								$date_bts = $value->tgl_pengembalian;

								if ($date_bts <= $datein) { ?>
									<?php
									$awal = date_create($value->tgl_pengembalian);
									$akhir = date_create(); //tgl sekarang
									$diff = date_diff($awal, $akhir);

									//selisih waktu
									$denda = 0;
									$denda = $diff->days * 1000;
									echo 'Total Telat Pengembalian : ' . $diff->days . ' Hari';
									//output selisih hari
									?>
									<h4>Denda : Rp. <?= number_format($denda) ?></h4>
									<input type="hidden" name="jml_pembayaran" value="<?= $denda ?>">
								<?php
								} else { ?>
									<input type="hidden" name="jml_pembayaran" value="0">
								<?php } ?>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Pengembalian</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>