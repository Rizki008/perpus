<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_buku');
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
			'bukud' => $this->m_buku->bukud(),
			'isi' => 'siswa/v_siswa'
		);
		$this->load->view('siswa/v_wrapper', $data, FALSE);
	}
}

/* End of file Home.php */
