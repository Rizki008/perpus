<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{

	public function pinjam()
	{
		if ($this->session->userdata('level_user') === '1' || $this->session->userdata('level_user') === '2' || $this->session->userdata('level_user') === '3') {
			$this->db->select('peminjaman_buku.id_peminjaman,user.nama,peminjaman_buku.nama_peminjam,buku.no_buku,peminjaman_buku.tgl_peminjaman,peminjaman_buku.tgl_pengembalian,peminjaman_buku.status,buku.judul');
			$this->db->from('peminjaman_buku');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('peminjaman_buku.status', '1');
			$this->db->order_by('id_peminjaman', 'desc');
			return $this->db->get()->result();
		} elseif ($this->session->userdata('level_user') === '4' || $this->session->userdata('level_user') === '5' || $this->session->userdata('level_user') === '6') {
			$this->db->select('peminjaman_buku.id_peminjaman,user.nama,peminjaman_buku.nama_peminjam,buku.no_buku,peminjaman_buku.tgl_peminjaman,peminjaman_buku.tgl_pengembalian,peminjaman_buku.status,buku.judul');
			$this->db->from('peminjaman_buku');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('peminjaman_buku.status', '1');
			$this->db->where('user.id_user', $this->session->userdata('id_user'));
			$this->db->order_by('id_peminjaman', 'desc');
			return $this->db->get()->result();
			// } 
			// elseif ($this->session->userdata('level_user') === '3') {
			// 	$this->db->select('peminjaman_buku.id_peminjaman,user.nama,peminjaman_buku.nama_peminjam,buku.no_buku,peminjaman_buku.tgl_peminjaman,peminjaman_buku.tgl_pengembalian,peminjaman_buku.status,buku.judul');
			// 	$this->db->from('peminjaman_buku');
			// 	$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			// 	$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			// 	$this->db->where('peminjaman_buku.status', '1');
			// 	$this->db->where('user.id_user', $this->session->userdata('id_user'));
			// 	$this->db->order_by('id_peminjaman', 'desc');
			// 	return $this->db->get()->result();
		} elseif ($this->session->userdata('level_user') == '') {
			$this->db->select('peminjaman_buku.id_peminjaman,user.nama,peminjaman_buku.nama_peminjam,buku.no_buku,peminjaman_buku.tgl_peminjaman,peminjaman_buku.tgl_pengembalian,peminjaman_buku.status,buku.judul');
			$this->db->from('peminjaman_buku');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('peminjaman_buku.status', '1');
			$this->db->where('user.id_user', $this->session->userdata('id_user'));
			$this->db->order_by('id_peminjaman', 'desc');
			return $this->db->get()->result();
		}
	}
	public function kembali()
	{
		if ($this->session->userdata('level_user') === '1' || $this->session->userdata('level_user') === '2' || $this->session->userdata('level_user') === '3') {
			$this->db->select('pengembalian_buku.id_pengembalian,peminjaman_buku.id_peminjaman,peminjaman_buku.nama_peminjam,user.nama,buku.no_buku,buku.judul,pengembalian_buku.tgl_pengembalian,peminjaman_buku.tgl_peminjaman,pengembalian_buku.status,saran.status_saran');
			$this->db->from('pengembalian_buku');
			$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->join('saran', 'saran.id_pengembalian = pengembalian_buku.id_pengembalian', 'left');
			$this->db->order_by('pengembalian_buku.id_pengembalian', 'desc');
			return $this->db->get()->result();
		} elseif ($this->session->userdata('level_user') === '4' || $this->session->userdata('level_user') === '5' || $this->session->userdata('level_user') === '6') {
			$this->db->select('pengembalian_buku.id_pengembalian,peminjaman_buku.id_peminjaman,peminjaman_buku.nama_peminjam,user.nama,buku.no_buku,buku.judul,pengembalian_buku.tgl_pengembalian,peminjaman_buku.tgl_peminjaman,pengembalian_buku.status,saran.status_saran');
			$this->db->from('pengembalian_buku');
			$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('user.id_user', $this->session->userdata('id_user'));
			$this->db->join('saran', 'saran.id_pengembalian = pengembalian_buku.id_pengembalian', 'left');
			$this->db->order_by('pengembalian_buku.id_pengembalian', 'desc');
			return $this->db->get()->result();
			// } elseif ($this->session->userdata('level_user') === '3') {
			// 	$this->db->select('pengembalian_buku.id_pengembalian,peminjaman_buku.id_peminjaman,peminjaman_buku.nama_peminjam,user.nama,buku.no_buku,buku.judul,pengembalian_buku.tgl_pengembalian,peminjaman_buku.tgl_peminjaman,pengembalian_buku.status,saran.status_saran');
			// 	$this->db->from('pengembalian_buku');
			// 	$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
			// 	$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			// 	$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			// 	$this->db->where('user.id_user', $this->session->userdata('id_user'));
			// 	$this->db->join('saran', 'saran.id_pengembalian = pengembalian_buku.id_pengembalian', 'left');
			// 	$this->db->order_by('pengembalian_buku.id_pengembalian', 'desc');
			// 	return $this->db->get()->result();
		} elseif ($this->session->userdata('level_user') == '') {
			$this->db->select('pengembalian_buku.id_pengembalian,peminjaman_buku.id_peminjaman,user.nama,peminjaman_buku.nama_peminjam,buku.no_buku,buku.judul,pengembalian_buku.tgl_pengembalian,peminjaman_buku.tgl_peminjaman,pengembalian_buku.status,saran.status_saran');
			$this->db->from('pengembalian_buku');
			$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('user.id_user', $this->session->userdata('id_user'));
			$this->db->join('saran', 'saran.id_pengembalian = pengembalian_buku.id_pengembalian', 'left');
			$this->db->order_by('pengembalian_buku.id_pengembalian', 'desc');
			return $this->db->get()->result();
		}
	}
	public function denda()
	{
		$this->db->select('*');
		$this->db->from('denda');
		$this->db->join('pengembalian_buku', 'pengembalian_buku.id_pengembalian = denda.id_pengembalian', 'left');
		$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
		$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
		$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
		$this->db->order_by('id_pembayaran', 'desc');
		return $this->db->get()->result();
	}
	public function denda_info()
	{
		$this->db->select('*');
		$this->db->from('denda');
		$this->db->join('pengembalian_buku', 'pengembalian_buku.id_pengembalian = denda.id_pengembalian', 'left');
		$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
		$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
		$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		$this->db->order_by('id_pembayaran', 'desc');
		return $this->db->get()->result();
	}
	public function saran_buku()
	{
		$this->db->select('*');
		$this->db->from('saran');
		$this->db->join('pengembalian_buku', 'pengembalian_buku.id_pengembalian = saran.id_pengembalian', 'left');
		$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
		$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
		$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
		$this->db->where('status_saran', 2);
		$this->db->order_by('id_saran', 'desc');
		return $this->db->get()->result();
	}

	public function peminjaman($data)
	{
		$this->db->insert('peminjaman_buku', $data);
	}
	public function pengembalian($data)
	{
		$this->db->insert('pengembalian_buku', $data);
	}
	public function denda_buku($data)
	{
		$this->db->insert('denda', $data);
	}
	public function saran($data)
	{
		$this->db->insert('saran', $data);
	}
	public function update_status_buku($no_buku, $data)
	{
		$this->db->where('no_buku', $no_buku);
		$this->db->update('buku', $data);
	}
	public function update_status_pinjam($id_peminjaman, $data)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('peminjaman_buku', $data);
	}
	public function update_saran($data)
	{
		$this->db->where('id_pengembalian', $data['id_pengembalian']);
		$this->db->update('saran', $data);
	}
	public function update($data)
	{
		$this->db->where('no_buku', $data['no_buku']);
		$this->db->update('buku', $data);
	}


	public function total_buku()
	{
		return $this->db->get('buku')->num_rows();
	}
	public function total_pinjam()
	{
		return $this->db->get('peminjaman_buku')->num_rows();
	}
	public function total_denda()
	{
		return $this->db->query("SELECT SUM(jml_pembayaran) AS jml FROM denda")->result();
	}
	public function total_kembali()
	{
		return $this->db->get('pengembalian_buku')->num_rows();
	}

	public function grafik_buku()
	{
		return $this->db->query("SELECT COUNT(peminjaman_buku.no_buku) as jml_buku, buku.judul FROM `peminjaman_buku` LEFT JOIN buku ON buku.no_buku=peminjaman_buku.no_buku GROUP BY peminjaman_buku.no_buku")->result();
	}
	public function grafik_buku_baca()
	{
		return $this->db->query("SELECT COUNT(nama_baca) as jml_baca, nama_baca AS nm FROM `baca` GROUP BY nama_baca;")->result();
	}
	public function grafik_buku_pinjam()
	{
		return $this->db->query("SELECT COUNT(peminjaman_buku.id_user) as jml_user, user.nama FROM `peminjaman_buku` LEFT JOIN buku ON buku.no_buku=peminjaman_buku.no_buku LEFT JOIN user ON user.id_user=peminjaman_buku.id_user GROUP BY peminjaman_buku.id_user;")->result();
	}
	public function grafik_buku_baca_tahun()
	{
		return $this->db->query("SELECT COUNT(nama_baca) as jumlah_baca, YEAR(tgl_baca) AS tanggal FROM `baca` GROUP BY tanggal")->result();
	}
	public function grafik_buku_baca_bulan()
	{
		return $this->db->query("SELECT COUNT(nama_baca) as jumlah_baca_bulan, DATE_FORMAT(tgl_baca,'%M') AS bulan FROM baca GROUP BY bulan")->result();
	}
	// public function grafik_buku_baca_bulan()
	// {
	// 	return $this->db->query("SELECT DATE_FORMAT(tgl_baca,'%a, %Y %M %e %H:%i:%s') AS bulan FROM baca GROUP BY tanggal")->result();
	// }
	public function grafik_buku_baca_usia()
	{
		return $this->db->query("SELECT COUNT(peminjaman_buku.id_user) as jumlah_pinjaman, (YEAR(CURDATE()) - YEAR(user.usia)) AS umur FROM `peminjaman_buku` LEFT JOIN user ON user.id_user=peminjaman_buku.id_user GROUP BY umur;")->result();
	}
	public function grafik_buku_baca_jk()
	{
		return $this->db->query("SELECT COUNT(peminjaman_buku.id_user) as jumlah_jenis_pinjam, jenis_kelamin AS jeniskelamin FROM `peminjaman_buku` LEFT JOIN user ON user.id_user=peminjaman_buku.id_user GROUP BY jeniskelamin;")->result();
	}

	public function notif_anggota()
	{
		$this->db->where('level_user', 4);
		return $this->db->get('user')->num_rows();
	}
	public function notif_pinjam()
	{
		$this->db->where('status', 1);
		return $this->db->get('peminjaman_buku')->num_rows();
	}

	public function batas_baca($nama_baca)
	{
		return $this->db->query("SELECT COUNT(nama_baca) as jml_baca, nama_baca FROM `baca` WHERE nama_baca='" . $nama_baca . "'")->row();
	}

	public function detail($id_buku)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku', $id_buku);
		return $this->db->get()->result();
	}

	public function log_baca_bulan()
	{
		return $this->db->query("SELECT COUNT(nama_baca) as jumlah_baca_bulan,MONTH(tgl_baca) AS tahun FROM baca WHERE (tgl_baca > CURDATE());")->result();
	}
	public function log_baca_tahun()
	{
		return $this->db->query("SELECT COUNT(nama_baca) as jumlah_baca_tahun,YEAR(tgl_baca) AS bulan FROM baca WHERE (tgl_baca > CURDATE());")->result();
	}
	public function log_baca_hari()
	{
		return $this->db->query("SELECT COUNT(nama_baca) as jumlah_baca_hari,DAY(tgl_baca) AS hari FROM baca WHERE (tgl_baca > CURDATE());")->result();
	}


	public function log_pinjam_tahun()
	{
		return $this->db->query("SELECT COUNT(nama_peminjam) as jumlah_pinjam_tahun,YEAR(tgl_peminjaman) AS tahun FROM peminjaman_buku WHERE (tgl_peminjaman > CURDATE());")->result();
	}
	public function log_pinjam_bulan()
	{
		return $this->db->query("SELECT COUNT(nama_peminjam) as jumlah_pinjam__bulan,MONTH(tgl_peminjaman) AS bulan FROM peminjaman_buku WHERE (tgl_peminjaman > CURDATE());")->result();
	}
	public function log_pinjam_hari()
	{
		return $this->db->query("SELECT COUNT(nama_peminjam) as jumlah_pinjam_hari,DAY(tgl_peminjaman) AS hari FROM peminjaman_buku WHERE (tgl_peminjaman > CURDATE());")->result();
	}

	public function log_pengembalian_tahun()
	{
		return $this->db->query("SELECT COUNT(no_buku) as jumlah_kembali_tahun,YEAR(tgl_pengembalian) AS tahun FROM pengembalian_buku WHERE (tgl_pengembalian > CURDATE());")->result();
	}
	public function log_pengembalian_bulan()
	{
		return $this->db->query("SELECT COUNT(no_buku) as jumlah_kembali_bulan,MONTH(tgl_pengembalian) AS bulan FROM pengembalian_buku WHERE (tgl_pengembalian > CURDATE());")->result();
	}
	public function log_pengembalian_hari()
	{
		return $this->db->query("SELECT COUNT(no_buku) as jumlah_kembali_hari,DAY(tgl_pengembalian) AS hari FROM pengembalian_buku WHERE (tgl_pengembalian > CURDATE());")->result();
	}
}

/* End of file M_master.php */
