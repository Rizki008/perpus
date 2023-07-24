<!-- END SIDEBAR-->
<div class="content-wrapper">
	<div class="page-content fade-in-up">
		<div class="row">
			<div class="col-12">
				<!-- Main content -->
				<div class="invoice p-3 mb-3">
					<!-- title row -->
					<div class="row">
						<div class="col-12">
							<h4>
								<i class="fa fa-shopping-cart"></i> <?= $title ?>
								<small class="float-right">Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
							</h4>
						</div>
						<!-- /.col -->
					</div>
					<!-- info row -->
					<div class="row invoice-info">
					</div>
					<!-- /.row -->

					<!-- Table row -->
					<div class="row">
						<div class="col-12 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Judul Buku</th>
										<th>Tanggal Peminjaman</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($laporan as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nama ?> <?= $value->nama_baca ?></td>
											<td><?= $value->judul ?></td>
											<td><?= $value->tgl_baca ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<!-- this row will not appear when printing -->
					<div class="row no-print">
						<div class="col-12">
							<button class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>
				</div>
				<!-- /.invoice -->
			</div><!-- /.col -->
		</div>
	</div>