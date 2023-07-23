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
				<div class="ibox-title">Data User Admin</div>
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
					<i class="fa fa-plus"></i>Tambah User
				</button>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Username</th>
							<th>Password</th>
							<th>No Hp</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>Setting</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>Username</th>
							<th>Password</th>
							<th>No Hp</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($user as $key => $value) { ?>
							<tr>
								<td><?= $value->nama ?></td>
								<td><?= $value->username ?></td>
								<td>********</td>
								<td><?= $value->no_hp ?></td>
								<td><?= $value->alamat ?></td>
								<td>
									<span class="badge badge-primary">Admin</span>
								</td>
								<td>
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user ?>">
										<i class="fa fa-edit"></i><br>Update
									</button>
									<a href="<?= base_url('admin/delete/' . $value->id_user) ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
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
					<form action="<?= base_url('admin/add') ?>" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="password">
							</div>
							<div class="form-group">
								<label>No hp</label>
								<input type="number" name="no_hp" class="form-control" placeholder="No HP">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
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
		<?php foreach ($user as $key => $value) { ?>
			<div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Detail Peminjam Buku</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('admin/update/' . $value->id_user) ?>" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
							<div class="modal-body">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" value="<?= $value->nama ?>" class="form-control" placeholder="Nama">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Username">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<label>No Hp</label>
									<input type="number" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" placeholder="No Hp">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" id="" class="form-control" cols="30" rows="10"><?= $value->alamat ?></textarea>
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