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
				<div class="ibox-title">Data Saran Buku</div>
			</div>
			<div class="ibox-body">
				<table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Judul Buku</th>
							<th>Saran</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>Judul Buku</th>
							<th>Saran</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($saran_buku as $key => $value) { ?>
							<tr>
								<td><?= $value->nama ?></td>
								<td><?= $value->judul ?></td>
								<td><?= $value->saran ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>