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
				<a href="<?= base_url('buku/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Buku</a>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Jumlah Buku</th>
							<th>Tanggal Pengembalian</th>
							<th>Status Buku</th>
							<th>Setting</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Jumlah Buku</th>
							<th>Tanggal Pengembalian</th>
							<th>Status Buku</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($pinjam as $key => $value) { ?>
							<tr>
								<td><?= $value->nama ?></td>
								<td><?= $value->no_buku ?></td>
								<td><?= $value->qty ?></td>
								<td><?= $value->tgl_pengembalian ?></td>
								<td><?php if ($value->status === 1) { ?>
										<span class="badge badge-warning">Dipinjam</span>
									<?php } elseif ($value->status === 2) { ?>
										<span class="badge badge-success">Dikembalikan</span>
									<?php } elseif ($value->status === 3) { ?>
										<span class="badge badge-danger">Denda</span>
									<?php } ?>
								</td>
								<td>
									<a href="<?= base_url('master/edit_pinjam/' . $value->id_peminjaman) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
									<!-- <a href="<?= base_url('master/delete/' . $value->id_buku) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>