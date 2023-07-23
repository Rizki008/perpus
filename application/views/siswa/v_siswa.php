<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<div class="row">
			<div class="col-lg-8">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">Data Buku Dipinjam</div>
						<div class="ibox-tools">
							<a class="ibox-collapse"><i class="fa fa-minus"></i></a>
							<a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
						</div>
					</div>
					<div class="ibox-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>No Buku</th>
									<th>Judul</th>
									<th>Pengarang</th>
									<th>Status</th>
									<th width="91px">Tanggal Pengembalian</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($buku as $key => $value) { ?>
									<tr>
										<td>
											<a href="#"><?= $value->no_buku ?></a>
										</td>
										<td><?= $value->judul ?></td>
										<td><?= $value->pengarang ?></td>
										<td>
											<span class="badge badge-warning">Dipinjam</span>
										</td>
										<td><?= $value->tgl_pengembalian ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">Data Buku</div>
					</div>
					<div class="ibox-body">
						<ul class="media-list media-list-divider m-0">
							<?php foreach ($bukud as $key => $buk) { ?>
								<li class="media">
									<a class="media-img" href="#">
										<img src="<?= base_url('assets/sampul/' . $buk->sampul) ?>" width="50px;" />
									</a>
									<div class="media-body">
										<div class="media-heading">
											<a href="#"><?= $buk->judul ?></a>
											<span class="font-16 float-right"><?= $buk->pengarang ?></span>
										</div>
										<div class="font-13"><?= $buk->file ?></div>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="ibox-footer text-center">
						<a href="<?= base_url('buku/buku') ?>">View All Buku</a>
					</div>
				</div>
			</div>
		</div>
		<style>
			.visitors-table tbody tr td:last-child {
				display: flex;
				align-items: center;
			}

			.visitors-table .progress {
				flex: 1;
			}

			.visitors-table .progress-parcent {
				text-align: right;
				margin-left: 10px;
			}
		</style>
	</div>
	<!-- END PAGE CONTENT-->