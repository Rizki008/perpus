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
			<?php foreach ($baca as $key => $value) { ?>
				<div class="col-lg-12 col-md-8">
					<div class="ibox" id="mailbox-container">
						<div class="mailbox-header d-flex justify-content-between" style="border-bottom: 1px solid #e8e8e8;">
							<div>
								<h5 class="inbox-title">&nbsp;&nbsp;Judul : <?= $value->judul ?></h5>
								<div class="m-t-5 font-13">
									<span class="font-strong">&nbsp;&nbsp;Pengarang : <?= $value->pengarang ?></span>
								</div>
								<div class="p-r-10 font-13">&nbsp;&nbsp;Penerbit : <?= $value->penerbit ?></div>
							</div>
						</div>
						<br>
						<hr>
						<div class="mailbox-body">
							<embed src="<?= base_url('assets/buku/' . $value->file) ?>" type="application/pdf" width="1000" height="1000">
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- END PAGE CONTENT-->