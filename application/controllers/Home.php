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
			'grafik_buku_baca' => $this->m_master->grafik_buku_baca(),
			'bukud' => $this->m_buku->bukud(),
			'isi' => 'siswa/v_siswa'
		);
		$this->load->view('siswa/v_wrapper', $data, FALSE);
	}
}

/* End of file Home.php */
