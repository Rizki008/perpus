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
											<div class="font-13"><?= $buk->file ?></div>
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
			<div class="col-lg-6">
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
			<div class="col-lg-12">
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