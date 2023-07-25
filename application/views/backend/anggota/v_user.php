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
				<div class="ibox-title">Data User Anggota</div>
				<!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
					<i class="fa fa-plus"></i>Tambah User
				</button> -->
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Username</th>
							<th>No Hp</th>
							<th>Alamat</th>
							<th>Foto</th>
							<th>Status</th>
							<th>Setting</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>Username</th>
							<th>No Hp</th>
							<th>Alamat</th>
							<th>Foto</th>
							<th>Status</th>
							<th>Setting</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($user as $key => $value) { ?>
							<tr>
								<td><?= $value->nama ?></td>
								<td><?= $value->username ?></td>
								<td><?= $value->no_hp ?></td>
								<td><?= $value->alamat ?></td>
								<td><img src="<?= base_url('assets/foto/' . $value->foto) ?>" width="100px" alt=""></td>
								<td>
									<?php if ($value->level_user == '4') { ?>
										<span class="badge badge-primary">Daftar Anggota</span>
									<?php } elseif ($value->level_user == '5') { ?>
										<span class="badge badge-success">Anggota</span>
									<?php } elseif ($value->level_user == '6') { ?>
										<span class="badge badge-warning">Pengunjung</span>
									<?php } ?>
								</td>
								<td>
									<?php if ($value->level_user === '4') { ?>
										<a href="<?= base_url('admin/verifikasi/' . $value->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i>Verifikasi</a>
									<?php } elseif ($value->level_user === '5') { ?>
										<a href="<?= base_url('admin/detail/' . $value->id_user); ?>" target="_blank"><button class="btn btn-primary btn-sm">
												<i class="fa fa-print"></i> Cetak Kartu</button></a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>