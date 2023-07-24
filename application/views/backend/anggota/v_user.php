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
								<td>
									<span class="badge badge-primary">Anggota</span>
								</td>
								<td>
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user ?>">
										<i class="fa fa-print"></i><br>Cetak Kartu Anggota
									</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>