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
	<?php
	echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

	if ($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-ban"></i> Gagal</h5>';
		echo $this->session->flashdata('error');
		echo '
    </div>';
	}

	if ($this->session->flashdata('pesan')) {
		echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Sukses</h5>';
		echo $this->session->flashdata('pesan');
		echo '</div>';
	}

	?>
	<div class="page-content fade-in-up">
		<div class="ibox">
			<div class="ibox-head">
				<div class="ibox-title">Data Kuisioner</div>
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
					<i class="fa fa-plus"></i>Tambah Kuisioner
				</button>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Pertanyaan</th>
							<th>Pilihan1</th>
							<th>Pilihan2</th>
							<th>Pilihan3</th>
							<th>Pilihan4</th>
							<th>Setting</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Pertanyaan</th>
							<th>Pilihan1</th>
							<th>Pilihan2</th>
							<th>Pilihan3</th>
							<th>Pilihan4</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php $i = 1;
						foreach ($kuisioner as $key => $value) { ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $value->pertanyaan ?></td>
								<td><?= $value->isi1 ?></td>
								<td><?= $value->isi2 ?></td>
								<td><?= $value->isi3 ?></td>
								<td><?= $value->isi4 ?></td>
								<td>
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_pertanyaan ?>">
										<i class="fa fa-edit"></i><br>Update
									</button>
									<a href="<?= base_url('kuisioner/delete/' . $value->id_pertanyaan) ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Tambah User Admin</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('kuisioner/add') ?>" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label>Pertanyaan</label>
								<input type="text" name="pertanyaan" class="form-control" placeholder="pertanyaan">
							</div>
							<div class="form-group">
								<label>Pilihan-1</label>
								<input type="text" name="isi1" class="form-control" placeholder="Pilihan-1">
							</div>
							<div class="form-group">
								<label>Pilihan-2</label>
								<input type="text" name="isi2" class="form-control" placeholder="Pilihan-2">
							</div>
							<div class="form-group">
								<label>Pilihan-3</label>
								<input type="text" name="isi3" class="form-control" placeholder="Pilihan-3">
							</div>
							<div class="form-group">
								<label>Pilihan-4</label>
								<input type="text" name="isi4" class="form-control" placeholder="Pilihan-4">
							</div>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal edit -->
		<?php foreach ($kuisioner as $key => $value) { ?>
			<div class="modal fade" id="edit<?= $value->id_pertanyaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Detail Peminjam Buku</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('kuisioner/update/' . $value->id_pertanyaan) ?>" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
							<div class="modal-body">
								<div class="form-group">
									<label>pertanyaan</label>
									<input type="text" name="pertanyaan" value="<?= $value->pertanyaan ?>" class="form-control" placeholder="pertanyaan">
								</div>
								<div class="form-group">
									<label>Pilihan-1</label>
									<input type="text" name="isi1" value="<?= $value->isi1 ?>" class="form-control" placeholder="Pilihan-1">
								</div>
								<div class="form-group">
									<label>Pilihan-2</label>
									<input type="text" name="isi2" value="<?= $value->isi2 ?>" class="form-control" placeholder="Pilihan-2">
								</div>
								<div class="form-group">
									<label>Pilihan-3</label>
									<input type="text" name="isi3" value="<?= $value->isi3 ?>" class="form-control" placeholder="Pilihan-3">
								</div>
								<div class="form-group">
									<label>Pilihan-4</label>
									<input type="text" name="isi4" value="<?= $value->isi4 ?>" class="form-control" placeholder="Pilihan-4">
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>