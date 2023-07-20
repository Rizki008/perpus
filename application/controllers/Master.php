<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_master');
	}

	// List all your items
	public function peminjaman()
	{
		$data = array(
			'title' => 'Data Peminjaman Buku',
			'pinjam' => $this->m_master->pinjam(),
			'isi' => 'backend/peminjaman/v_pinjam'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function pengembalian()
	{
		$data = array(
			'title' => 'Data Peminjaman Buku',
			'kembali' => $this->m_master->kembali(),
			'isi' => 'backend/pengembalian/v_kembali'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function denda()
	{
		$data = array(
			'title' => 'Data Peminjaman Buku',
			'denda' => $this->m_master->denda(),
			'isi' => 'backend/denda/v_denda'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
	}

	//Update one item
	public function update($id = NULL)
	{
	}

	//Delete one item
	public function delete($id = NULL)
	{
	}
}

/* End of file Master.php */
