<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_buku');
		$this->load->model('m_master');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Masuk Pelanggan',
			'isi' => 'backend/log/v_login'
		);
		$this->load->view('backend/log/v_login', $data, FALSE);
	}

	public function siswa()
	{
		$data = array(
			'title' => 'Perpustakaan Web',
			'buku' => $this->m_buku->buku_pinjam(),
			'grafik_buku' => $this->m_master->grafik_buku(),
			'grafik_buku_pinjam' => $this->m_master->grafik_buku_pinjam(),
			'grafik_buku_baca_tahun' => $this->m_master->grafik_buku_baca_tahun(),
			'grafik_buku_baca_bulan' => $this->m_master->grafik_buku_baca_bulan(),
			'grafik_buku_baca' => $this->m_master->grafik_buku_baca(),
			'grafik_buku_baca_usia' => $this->m_master->grafik_buku_baca_usia(),
			'grafik_buku_baca_jk' => $this->m_master->grafik_buku_baca_jk(),
			'bukud' => $this->m_buku->bukud(),
			'log_baca_hari' => $this->m_master->log_baca_hari(),
			'log_baca_bulan' => $this->m_master->log_baca_bulan(),
			'log_baca_tahun' => $this->m_master->log_baca_tahun(),
			'log_pinjam_hari' => $this->m_master->log_pinjam_hari(),
			'log_pinjam_bulan' => $this->m_master->log_pinjam_bulan(),
			'log_pinjam_tahun' => $this->m_master->log_pinjam_tahun(),
			'log_pengembalian_hari' => $this->m_master->log_pengembalian_hari(),
			'log_pengembalian_bulan' => $this->m_master->log_pengembalian_bulan(),
			'log_pengembalian_tahun' => $this->m_master->log_pengembalian_tahun(),
			'isi' => 'siswa/v_siswa'
		);
		$this->load->view('siswa/v_wrapper', $data, FALSE);
	}
}

/* End of file Home.php */
