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
				<div class="ibox-title">Data Peminjaman Buku</div>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Peminjaman</th>
							<th>Tanggal Pengembalian</th>
							<th>Waktu Pengembalian</th>
							<th>Denda Buku</th>
							<th>Status Buku</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>No Buku</th>
							<th>Tanggal Peminjaman</th>
							<th>Tanggal Pengembalian</th>
							<th>Waktu Pengembalian</th>
							<th>Denda Buku</th>
							<th>Status Buku</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						if (!empty($pinjam)) {
							foreach ($pinjam as $key => $value) { ?>
								<tr>
									<td><?= $value->nama ?> <?= $value->nama_peminjam ?></td>
									<td><?= $value->no_buku ?></td>
									<td><?= $value->tgl_peminjaman ?></td>
									<td>
										<?= $value->tgl_pengembalian ?>
									</td>
									<td>
										<?php $tgl1 = strtotime($value->tgl_peminjaman);
										$tgl2 = strtotime($value->tgl_pengembalian);
										$jarak = $tgl2 - $tgl1;
										$hari = $jarak / 60 / 60 / 24;
										echo $hari, ' Hari';
										?>
									</td>
									<td>
										<?php
										$datein = date('Y-m-d');
										$date_bts = $value->tgl_pengembalian;

										if ($date_bts <= $datein) { ?>
											<?php
											$awal = date_create($value->tgl_pengembalian);
											$akhir = date_create(); //tgl sekarang
											$diff = date_diff($awal, $akhir);

											//selisih waktu
											$denda = 0;
											$denda = $diff->days * 1000;
											echo 'Sisa Pengembalian : ' . $diff->days . ' Hari';
											//output selisih hari
											?>
											<br>Denda : Rp. <?= number_format($denda) ?>
										<?php } ?>
									</td>
									<td><?php if ($value->status === '1') { ?>
											<span class="badge badge-warning">Dipinjam</span>
										<?php } elseif ($value->status === '2') { ?>
											<span class="badge badge-success">Dikembalikan</span>
										<?php } ?>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>