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
		<div class="row">
			<div class="col-md-12">
				<div class="ibox">
					<div class="ibox-head">
						<div class="ibox-title">
							<?= $title ?>
						</div>
						<div class="ibox-tools">
							<a class="ibox-collapse"><i class="fa fa-minus"></i></a>
						</div>
					</div>
					<div class="ibox-body">
						<?php foreach ($detail as $key => $value) { ?>
							<div class="card" style="width:300px;">
								<img class="card-img-top" src="<?= base_url('assets/sampul/' . $value->sampul) ?>" />
								<div class="card-body">
									<h4 class="card-title"><?= $value->judul ?></h4>
								</div>
								<ul class="list-group list-group-divider no-margin">
									<li class="list-group-item" style="border-top-color:#e1eaec;">Pengarang
										<span class="badge-circle float-right"><?= $value->pengarang ?></span>
									</li>
									<li class="list-group-item">Penerbit
										<span class="badge-circle float-right"><?= $value->penerbit ?></span>
									</li>
									<li class="list-group-item">ISBN
										<span class="badge-circle float-right"><?= $value->isbn ?></span>
									</li>
									<li class="list-group-item">Stok
										<span class="badge badge-warning badge-circle float-right"><?= $value->stok ?></span>
									</li>
								</ul>
								<div class="card-footer">
									<button data-toggle="modal" data-target="#baca<?= $value->id_buku ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-book"></i>
										Baca Buku
									</button>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php foreach ($detail as $key => $bukus) { ?>
			<!-- /.modal Add -->
			<div class="modal fade" id="baca<?= $bukus->id_buku ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Baca Buku</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							echo form_open('buku/baca_buku/' . $bukus->id_buku);
							?>
							<input type="hidden" name="id_buku" value="<?= $bukus->id_buku ?>">
							<div class="form-group">
								<label>Atas Nama</label>
								<input type="text" name="nama_baca" class="form-control" placeholder="Nama">
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Baca</button>
						</div>
						<?php
						echo form_close();
						?>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		<?php } ?>