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
				<table id="example1" class="table table-bordered" id="example1">
					<thead>
						<tr>
							<th>No Buku</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>ISBN</th>
							<th>Stok</th>
							<th>Status Buku</th>
							<th>Sampul Buku</th>
							<th>File Buku</th>
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
							<th>Stok</th>
							<th>Status Buku</th>
							<th>Sampul Buku</th>
							<th>File Buku</th>
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
								<td><?= $value->stok ?></td>
								<td>
									<?php if ($value->status === '1') { ?>
										<span class="badge badge-warning">Buku Dipinjam</span>
									<?php } elseif ($value->status === '0') { ?>
										<span class="badge badge-success">Buku Diperpus</span>
									<?php } ?>
								</td>
								<td><img src="<?= base_url('assets/sampul/' . $value->sampul) ?>" alt="" width="100px"></td>
								<td><?php if ($value->file == NULL) { ?>
										<span class="badge badge-warning">Belum Upload File</span>
									<?php } else { ?>
										<img src="<?= base_url('assets/buku/PDF_file_icon.svg.png') ?>" alt="" width="100px"><?= $value->file ?>
									<?php } ?>
								</td>
								<td>
									<a href="<?= base_url('buku/edit/' . $value->id_buku) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
									<a href="<?= base_url('buku/delete/' . $value->id_buku) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add<?= $value->id_buku ?>">
										<i class="fa fa-upload"></i>
									</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<?php foreach ($buku as $key => $value) { ?>
			<div class="modal fade" id="add<?= $value->id_buku ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Upload File Buku</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('buku/upload/' . $value->id_buku) ?>" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
							<div class="modal-body">
								<div class="form-group">
									<label>Upload File Buku</label>
									<p>(Format PDF)</p>
									<input type="file" name="file" class="form-control" placeholder="File Buku">
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Uploads</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>
