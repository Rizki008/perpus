<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
	<div id="sidebar-collapse">
		<div class="admin-block d-flex">
			<div>
				<img src="<?= base_url('backend/dist') ?>/assets/img/admin-avatar.png" width="45px" />
			</div>
			<div class="admin-info">
				<div class="font-strong"><?= $this->session->userdata('nama'); ?></div>
				<small>
					<?php if ($this->session->userdata('level_user') == '2') { ?>
						Staff
					<?php } elseif ($this->session->userdata('level_user') == '3') { ?>
						Kepala Perpustakaan
					<?php } ?>
				</small>
			</div>
		</div>
		<ul class="side-menu metismenu">
			<li>
				<a class="active" href="<?= base_url('admin') ?>"><i class="sidebar-item-icon fa fa-th-large"></i>
					<span class="nav-label">Dashboard</span>
				</a>
			</li>
			<li class="heading">MASTER DATA</li>
			<?php if ($this->session->userdata('level_user') === '2') { ?>
				<li>
					<a href="<?= base_url('buku') ?>"><i class="sidebar-item-icon fa fa-bookmark"></i>
						<span class="nav-label">Data Buku</span>
					</a>
				</li>
			<?php } ?>
			<li>
				<?php $notif_pinjam = $this->m_master->notif_pinjam() ?>
				<a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
					<span class="nav-label">Data Peminjaman</span><i class="fa fa-angle-left arrow"></i></a>
				<ul class="nav-2-level collapse">
					<?php if ($this->session->userdata('level_user') === '3') { ?>
						<li>
							<a href="<?= base_url('master/peminjaman') ?>">Peminjaman Buku <span class="bagde badge-warning"><?= $notif_pinjam ?></span></a>
						</li>
						<li>
							<a href="<?= base_url('master/pengembalian') ?>">Pengembalian Buku</a>
						</li>
					<?php } elseif ($this->session->userdata('level_user') === '2') { ?>
						<li>
							<a href="<?= base_url('master/peminjaman') ?>">Peminjaman Buku <span class="bagde badge-warning"><?= $notif_pinjam ?></span></a>
						</li>
						<li>
							<a href="<?= base_url('master/pengembalian') ?>">Pengembalian Buku</a>
						</li>
						<li>
							<a href="<?= base_url('master/denda') ?>">Pembayaran Denda Buku</a>
						</li>
					<?php } ?>
				</ul>
			</li>
			<?php if ($this->session->userdata('level_user') === '3') { ?>
				<li class="heading">SARAN</li>
				<li>
					<a href="<?= base_url('master/saran_buku') ?>"><i class="sidebar-item-icon fa fa-smile-o"></i>
						<span class="nav-label">Saran</span>
					</a>
				</li>
				<li class="heading">LAPORAN</li>
				<li>
					<a href="<?= base_url('laporan') ?>"><i class="sidebar-item-icon fa fa-info"></i>
						<span class="nav-label">Laporan</span>
					</a>
				</li>
			<?php } ?>
			<li class="heading">USER</li>
			<li>
				<?php $notif = $this->m_master->notif_anggota(); ?>
				<?php if ($this->session->userdata('level_user') === '2') { ?>
					<a href="<?= base_url('admin/user') ?>"><i class="sidebar-item-icon fa fa-user-circle-o"></i>
						<span class="nav-label">User</span>
					</a>
				<?php } ?>
				<a href="<?= base_url('admin/anggota') ?>"><i class="sidebar-item-icon fa fa-user-plus"></i>
					<span class="nav-label">Data Anggota <span class="badge badge-danger"><?= $notif ?></span></span>
				</a>
			</li>
		</ul>
	</div>
</nav>
<!-- END SIDEBAR-->