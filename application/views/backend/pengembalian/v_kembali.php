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
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No Peminjaman</th>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Pengembalian</th>
							<th>Status Buku</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($kembali as $key => $value) { ?>
							<tr>
								<td><?= $value->id_peminjaman ?></td>
								<td><?= $value->nama ?> <?= $value->nama_peminjam ?></td>
								<td><?= $value->no_buku ?></td>
								<td><?= $value->tgl_pengembalian ?></td>
								<td><?php if ($value->status === '1') { ?>
										<span class="badge badge-success">Dikembalikan</span>
									<?php } elseif ($value->status === '2') { ?>
										<span class="badge badge-danger">Denda</span>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>