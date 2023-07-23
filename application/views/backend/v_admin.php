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
			<div class="col-lg-12">
				<div class="ibox">
					<div class="ibox-body">
						<div class="flexbox mb-4">
							<div>
								<h3 class="m-0">Grafik Buku Dipinjam</h3>
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
									type: 'bar',
									data: {
										labels: <?= json_encode($judul) ?>,
										datasets: [{
											label: 'Grafik Penjualan',
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