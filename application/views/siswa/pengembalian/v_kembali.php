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
				<div class="ibox-title">Data Pengembalian Buku</div>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No Peminjaman</th>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Pengembalian</th>
							<th>Status Buku</th>
							<th>Setting</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No Peminjaman</th>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Pengembalian</th>
							<th>Status Buku</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php if (!empty($kembali)) {
							foreach ($kembali as $key => $value) { ?>
								<tr>
									<td><?= $value->id_peminjaman ?></td>
									<td><?= $value->nama ?> <?= $value->nama_peminjam ?></td>
									<td><?= $value->no_buku ?></td>
									<td><?= $value->tgl_pengembalian ?></td>
									<td><?php if ($value->status === '1') { ?>
											<span class="badge badge-success">Dikembalikan</span>
										<?php } ?>
									</td>
									<td><?php if ($value->status_saran === '1') { ?>
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_pengembalian ?>">
												<i class="fa ti-comment-alt"></i><br>Saran
											</button>
										<?php } elseif ($value->status_saran === '2') { ?>
											<p>Terimakasih <br>
												Telah mengimkan saran
											</p>
										<?php } ?>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>

		<?php if (!empty($kembali)) {
			foreach ($kembali as $key => $value) { ?>
				<div class="modal fade" id="edit<?= $value->id_pengembalian ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Detail Peminjam Buku</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="<?= base_url('master/saran/' . $value->id_pengembalian) ?>" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
								<!-- <input type="text" name="id_pengembalian" value="<?= $value->id_pengembalian ?>" id=""> -->
								<div class="modal-body">
									<h5>Judul Buku : <strong><?= $value->judul ?></strong></h5>
									<hr>
									<h5>Tanggal Peminjaman : <strong><?= $value->tgl_peminjaman ?></strong></h5>
									<h5>Tanggal Pengembalian : <strong><?= $value->tgl_pengembalian ?></strong></h5>
									<hr>
									<div class="form-group">
										<label>Saran</label>
										<textarea name="saran" class="form-control" cols="30" rows="10"></textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Kirim Saran</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								</div>
							</form>
						</div>
					</div>
				</div>
		<?php }
		} ?>