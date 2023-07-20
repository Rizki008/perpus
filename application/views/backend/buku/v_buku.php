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
				<a href="<?= base_url('buku/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Buku</a>
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
							<th>Sampul Buku</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($buku as $key => $value) { ?>
							<tr>
								<td><?= $value->no_buku ?></td>
								<td><?= $value->judul ?></td>
								<td><?= $value->pengarang ?></td>
								<td><?= $value->penerbit ?></td>
								<td><?= $value->isbn ?></td>
								<td><img src="<?= base_url('assets/sampul/' . $value->sampul) ?>" alt="" width="100px"></td>
								<td>
									<a href="<?= base_url('buku/edit/' . $value->id_buku) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
									<a href="<?= base_url('buku/delete/' . $value->id_buku) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>