<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-success color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong"><?= $total_baca ?></h2>
						<div class="m-b-5">TOTAL PEMBACA</div><i class="ti-eye widget-stat-icon"></i>
						<div><i class="fa fa-level-up m-r-5"></i><small><?= $total_baca / 100 ?>%</small></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-info color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong"><?= $total_pinjam ?></h2>
						<div class="m-b-5">TOTAL PEMINJAM</div> <i class="ti-bookmark-alt widget-stat-icon"></i>
						<div><i class="fa fa-level-up m-r-5"></i><small><?= $total_pinjam / 100 ?>%</small></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-warning color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong"><?= $total_buku ?></h2>
						<div class="m-b-5">TOTAL BUKU FAVORIT</div><i class="fa fa-book widget-stat-icon"></i>
						<div><i class="fa fa-level-up m-r-5"></i><small><?= $total_buku / 100 ?>%</small></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-danger color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong"><?= $total_anggota ?></h2>
						<div class="m-b-5">TOTAL ANGGOTA</div><i class="ti-user widget-stat-icon"></i>
						<div><i class="fa fa-level-up m-r-5"></i><small><?= $total_anggota / 100 ?>%</small></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">Log Baca</div>
					</div>
					<?php
					foreach ($log_baca_hari as $key => $value) { ?>
					<?php } ?>
					<?php
					foreach ($log_baca_bulan as $key => $bulan_baca) { ?>
					<?php } ?>
					<?php
					foreach ($log_baca_tahun as $key => $tahun_baca) { ?>
					<?php } ?>
					<div class="ibox-body">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Hari Ini : <?= $value->jumlah_baca_hari ?></div>
								<div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Bulan Ini : <?= $bulan_baca->jumlah_baca_bulan ?></div>
								<div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Tahun Ini : <?= $tahun_baca->jumlah_baca_tahun ?></div>
							</div>
						</div>
					</div>
					<hr>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">Log Peminjaman</div>
					</div>
					<?php
					foreach ($log_pinjam_hari as $key => $hari_pinjam) { ?>
					<?php } ?>
					<?php
					foreach ($log_pinjam_bulan as $key => $bulan_pinjam) { ?>
					<?php } ?>
					<?php
					foreach ($log_pinjam_tahun as $key => $tahun_pinjam) { ?>
					<?php } ?>
					<div class="ibox-body">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Hari ini : <?= $hari_pinjam->jumlah_pinjam_hari ?></div>
								<div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Bulan ini : <?= $bulan_pinjam->jumlah_pinjam__bulan ?></div>
								<div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Tahun ini : <?= $tahun_pinjam->jumlah_pinjam_tahun ?></div>
							</div>
						</div>
					</div>
					<hr>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">Log Pengembalian</div>
					</div>
					<?php
					foreach ($log_pengembalian_hari as $key => $hari_kembali) { ?>
					<?php } ?>
					<?php
					foreach ($log_pengembalian_bulan as $key => $bulan_kembali) { ?>
					<?php } ?>
					<?php
					foreach ($log_pengembalian_tahun as $key => $tahun_kembali) { ?>
					<?php } ?>
					<div class="ibox-body">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Hari ini : <?= $hari_kembali->jumlah_kembali_hari ?></div>
								<div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Bulan ini : <?= $bulan_kembali->jumlah_kembali_bulan ?></div>
								<div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Tahun ini : <?= $tahun_kembali->jumlah_kembali_tahun ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
									<th>Sampul Buku</th>
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
											<a href="#"><img src="<?= base_url('assets/sampul/' . $value->sampul) ?>" width="100px" alt=""></a>
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
								<?php if ($buk->file == NULL) { ?>
								<?php } else { ?>
									<li class="media">
										<a class="media-img" href="<?= base_url('buku/detail/' . $buk->id_buku) ?>">
											<img src="<?= base_url('assets/sampul/' . $buk->sampul) ?>" width="50px;" />
										</a>
										<div class="media-body">
											<div class="media-heading">
												<a href="<?= base_url('buku/detail/' . $buk->id_buku) ?>"><?= $buk->judul ?></a>
												<span class="font-16 float-right"><?= $buk->pengarang ?></span>
											</div>
											<div class="font-13">
												<img src="<?= base_url('assets/buku/PDF_file_icon.svg.png') ?>" alt="" width="20px"><?= $buk->file ?>
												<!-- <?= $buk->file ?> -->
											</div>
										</div>
									</li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
					<div class="ibox-footer text-center">
						<a href="<?= base_url('buku/buku') ?>">View All Buku</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Buku Favorit</h3>
							</div>
						</div>
						<div>
							<?php
							foreach ($grafik_buku as $key => $grafik) {
								$judul[] = $grafik->judul;
								$jml_buku[] = $grafik->jml_buku;
							}
							?>
							<canvas id="myChart" style="height:260px;"></canvas>
							<script>
								var ctx = document.getElementById('myChart');
								var myChart = new Chart(ctx, {
									type: 'polarArea',
									data: {
										labels: <?= json_encode($judul) ?>,
										datasets: [{
											label: 'Grafik Buku Favorit',
											data: <?= json_encode($jml_buku) ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											borderColor: [
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											fill: false,
											borderWidth: 1
										}]
									},
									// options: {
									// 	scales: {
									// 		yAxes: [{
									// 			ticks: {
									// 				beginAtZero: true
									// 			}
									// 		}]
									// 	}
									// }
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Pegunjung Teratas</h3>
							</div>
						</div>
						<div>
							<?php
							foreach ($grafik_buku_pinjam as $key => $grafik) {
								$nama[] = $grafik->nama;
								$jml_user[] = $grafik->jml_user;
							}
							?>
							<canvas id="myChar" style="height:260px;"></canvas>
							<script>
								var ctx = document.getElementById('myChar');
								var myChart = new Chart(ctx, {
									type: 'doughnut',
									data: {
										labels: <?= json_encode($nama) ?>,
										datasets: [{
											label: 'Grafik Yang Sering Pinjam',
											data: <?= json_encode($jml_user) ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											borderColor: [
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											fill: false,
											borderWidth: 1
										}]
									},
									// options: {
									// 	scales: {
									// 		yAxes: [{
									// 			ticks: {
									// 				beginAtZero: true
									// 			}
									// 		}]
									// 	}
									// }
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Pembaca Perbulan</h3>
							</div>
						</div>
						<div>
							<?php
							foreach ($grafik_buku_baca_bulan as $key => $grafik) {
								$jumlah_baca_bulan[] = $grafik->jumlah_baca_bulan;
								$bulan[] = $grafik->bulan;
							}
							?>
							<canvas id="susu" style="height:260px;"></canvas>
							<script>
								var ctx = document.getElementById('susu');
								var myChart = new Chart(ctx, {
									type: 'pie',
									data: {
										labels: <?= json_encode($bulan) ?>,
										datasets: [{
											label: 'Grafik Baca Perbulan',
											data: <?= json_encode($jumlah_baca_bulan) ?>,
											backgroundColor: [
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',

											],
											borderColor: [
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',

											],
											fill: false,
											borderWidth: 1
										}]
									},
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Pembaca Teratas</h3>
							</div>
						</div>
						<div>
							<?php
							foreach ($grafik_buku_baca as $key => $grafik) {
								$nm[] = $grafik->nm;
								$jml_baca[] = $grafik->jml_baca;
							}
							?>
							<canvas id="myCha" style="height:260px;"></canvas>
							<script>
								var ctx = document.getElementById('myCha');
								var myChart = new Chart(ctx, {
									type: 'line',
									data: {
										labels: <?= json_encode($nm) ?>,
										datasets: [{
											label: 'Grafik Yang Sering Baca',
											data: <?= json_encode($jml_baca) ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											borderColor: [
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											fill: false,
											borderWidth: 1
										}]
									},
									options: {
										scales: {
											yAxes: [{
												ticks: {
													beginAtZero: true
												}
											}]
										}
									}
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Pembaca Pertahun</h3>
							</div>
						</div>
						<div>
							<?php
							foreach ($grafik_buku_baca_tahun as $key => $grafik) {
								$jumlah_baca[] = $grafik->jumlah_baca;
								$tanggal[] = $grafik->tanggal;
							}
							?>
							<canvas id="myChsaa" style="height:260px;"></canvas>
							<script>
								var ctx = document.getElementById('myChsaa');
								var myChart = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: <?= json_encode($tanggal) ?>,
										datasets: [{
											label: 'Grafik Baca Pertahun',
											data: <?= json_encode($jumlah_baca) ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											borderColor: [
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											fill: false,
											borderWidth: 1
										}]
									},
									options: {
										scales: {
											yAxes: [{
												ticks: {
													beginAtZero: true
												}
											}]
										}
									}
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Usia Peminjaman</h3>
							</div>
						</div>
						<div>
							<?php
							foreach ($grafik_buku_baca_usia as $key => $grafik) {
								$jumlah_pinjaman[] = $grafik->jumlah_pinjaman;
								$umur[] = $grafik->umur;
							}
							?>
							<canvas id="sasi" style="height:260px;"></canvas>
							<script>
								var ctx = document.getElementById('sasi');
								var myChart = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: <?= json_encode($umur) ?>,
										datasets: [{
											label: 'Grafik Baca Perbulan',
											data: <?= json_encode($jumlah_pinjaman) ?>,
											backgroundColor: [
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',

											],
											borderColor: [
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',

											],
											fill: false,
											borderWidth: 1
										}]
									},
									options: {
										scales: {
											yAxes: [{
												ticks: {
													beginAtZero: true
												}
											}]
										}
									}
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Jenis Kelamin Peminjaman</h3>
							</div>
						</div>
						<div>
							<?php
							foreach ($grafik_buku_baca_jk as $key => $grafik) {
								$jumlah_jenis_pinjam[] = $grafik->jumlah_jenis_pinjam;
								$jeniskelamin[] = $grafik->jeniskelamin;
							}
							?>
							<canvas id="susisa" style="height:260px;"></canvas>
							<script>
								var ctx = document.getElementById('susisa');
								var myChart = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: <?= json_encode($jeniskelamin) ?>,
										datasets: [{
											label: 'Grafik Baca Perbulan',
											data: <?= json_encode($jumlah_jenis_pinjam) ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 0.80)',
												'rgba(54, 162, 235, 0.80)',
												'rgba(255, 206, 86, 0.80)',
												'rgba(75, 192, 192, 0.80)',
												'rgba(153, 102, 255, 0.80)',
												'rgba(255, 159, 64, 0.80)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											borderColor: [
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)',
												'rgba(255, 99, 132, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(75, 192, 192, 1)',
												'rgba(153, 102, 255, 1)',
												'rgba(255, 159, 64, 1)',
												'rgba(201, 76, 76, 0.3)',
												'rgba(201, 77, 77, 1)',
												'rgba(0, 140, 162, 1)',
												'rgba(158, 109, 8, 1)',
												'rgba(201, 76, 76, 0.8)',
												'rgba(0, 129, 212, 1)',
												'rgba(201, 77, 201, 1)',
												'rgba(255, 207, 207, 1)',
												'rgba(201, 77, 77, 1)',
												'rgba(128, 98, 98, 1)',
												'rgba(0, 0, 0, 1)',
												'rgba(128, 128, 128, 1)'
											],
											fill: false,
											borderWidth: 1
										}]
									},
									options: {
										scales: {
											yAxes: [{
												ticks: {
													beginAtZero: true
												}
											}]
										}
									}
								});
							</script>
						</div>
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
