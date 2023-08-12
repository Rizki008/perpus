<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-success color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong"><?= $total_buku ?></h2>
						<div class="m-b-5">Data Buku</div><i class="ti-book widget-stat-icon"></i>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-info color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong"><?= $total_pinjam ?></h2>
						<div class="m-b-5">Data Peminjaman</div><i class="ti-bar-chart widget-stat-icon"></i>
					</div>
				</div>
			</div>
			<?php foreach ($total_denda as $key => $denda) { ?>
			<?php } ?>
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-warning color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong">Rp. <?= number_format($denda->jml, 0) ?></h2>
						<div class="m-b-5">Total Denda</div><i class="fa fa-money widget-stat-icon"></i>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="ibox bg-danger color-white widget-stat">
					<div class="ibox-body">
						<h2 class="m-b-5 font-strong"><?= $total_kembali ?></h2>
						<div class="m-b-5">Data Pengembalian</div><i class="ti-user widget-stat-icon"></i>
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
			<div class="col-lg-8">
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
			<div class="col-lg-6">
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
									type: 'bar',
									data: {
										labels: <?= json_encode($bulan) ?>,
										datasets: [{
											label: 'Grafik Baca Perbulan',
											data: <?= json_encode($jumlah_baca_bulan) ?>,
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