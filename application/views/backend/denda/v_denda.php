<!-- END SIDEBAR-->
<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
	<div class="page-heading">
		<h1 class="page-title"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url('admin') ?>"><i class="la la-home font-20"></i></a>
			</li>
			<li class="breadcrumb-item"><?= $title ?></li>
		</ol>
	</div>
	<div class="page-content fade-in-up">
		<div class="ibox">
			<div class="ibox-head">
				<div class="ibox-title">Data Denda Buku</div>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No Pengembalian</th>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Pengembalian</th>
							<th>Jumlah Denda</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No Pengembalian</th>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Pengembalian</th>
							<th>Jumlah Denda</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($denda as $key => $value) { ?>
							<tr>
								<td><?= $value->id_peminjaman ?></td>
								<td><?= $value->nama ?> <?= $value->nama_peminjam ?></td>
								<td><?= $value->no_buku ?></td>
								<td><?= $value->tgl_pengembalian ?></td>
								<td>Rp. <?= number_format($value->jml_pembayaran, 0) ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>