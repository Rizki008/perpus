<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_master');
		$this->load->model('m_buku');
	}

	// List all your items
	public function peminjaman()
	{
		if ($this->session->userdata('level_user') === '1' || $this->session->userdata('level_user') === '2' || $this->session->userdata('level_user') === '3') {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'pinjam' => $this->m_master->pinjam(),
				'isi' => 'backend/peminjaman/v_pinjam'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} elseif ($this->session->userdata('level_user') === '4' || $this->session->userdata('level_user') === '5' || $this->session->userdata('level_user') === '6') {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'pinjam' => $this->m_master->pinjam(),
				'isi' => 'siswa/peminjaman/v_pinjam'
			);
			$this->load->view('siswa/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'pinjam' => $this->m_master->pinjam(),
				'isi' => 'siswa/peminjaman/v_pinjam'
			);
			$this->load->view('siswa/v_wrapper', $data, FALSE);
		}
	}
	public function pengembalian()
	{
		if ($this->session->userdata('level_user') === '1' || $this->session->userdata('level_user') === '2' || $this->session->userdata('level_user') === '3') {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'kembali' => $this->m_master->kembali(),
				'isi' => 'backend/pengembalian/v_kembali'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} elseif ($this->session->userdata('level_user') === '4' || $this->session->userdata('level_user') === '5' || $this->session->userdata('level_user') === '6') {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'kembali' => $this->m_master->kembali(),
				'isi' => 'siswa/pengembalian/v_kembali'
			);
			$this->load->view('siswa/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'kembali' => $this->m_master->kembali(),
				'isi' => 'siswa/pengembalian/v_kembali'
			);
			$this->load->view('siswa/v_wrapper', $data, FALSE);
		}
	}
	public function denda()
	{
		if ($this->session->userdata('level_user') === '2') {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'denda' => $this->m_master->denda(),
				'isi' => 'backend/denda/v_denda'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} elseif ($this->session->userdata('level_user') === '4' || $this->session->userdata('level_user') === '5' || $this->session->userdata('level_user') === '6') {
			$data = array(
				'title' => 'Data Peminjaman Buku',
				'denda' => $this->m_master->denda_info(),
				'isi' => 'siswa/denda/v_denda'
			);
			$this->load->view('siswa/v_wrapper', $data, FALSE);
		}
	}
	public function saran_buku()
	{
		if ($this->session->userdata('level_user') === '3') {
			$data = array(
				'title' => 'Data Saran Buku',
				'saran_buku' => $this->m_master->saran_buku(),
				'isi' => 'backend/saran/v_saran'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} elseif ($this->session->userdata('level_user') === '4' || $this->session->userdata('level_user') === '5' || $this->session->userdata('level_user') === '6') {
			$data = array(
				'title' => 'Data Saran Buku',
				'saran_buku' => $this->m_master->saran_buku(),
				'isi' => 'siswa/saran/v_saran'
			);
			$this->load->view('siswa/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'title' => 'Data Saran Buku',
				'saran_buku' => $this->m_master->saran_buku(),
				'isi' => 'siswa/saran/v_saran'
			);
			$this->load->view('siswa/v_wrapper', $data, FALSE);
		}
	}

	// Add a new item
	public function pinjam()
	{
		$data = array(
			'id_peminjaman' => $this->input->post('id_peminjaman'),
			'id_user' => $this->session->userdata('id_user'),
			'no_buku' => $this->input->post('no_buku'),
			// 'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
			'tgl_peminjaman' => date('Y-m-d'),
			// 'tgl_pengembalian' => date('Y-m-d', strtotime('+7 day')),
			'status' => '1',
			'jml_pinjam' => '1'
		);
		$this->m_master->peminjaman($data);

		$status = array(
			'status' => '1',
		);
		$this->m_master->update_status_buku($data['no_buku'], $status);
		$this->session->set_flashdata('pesan', 'Peminjaman Berhasil!!!');
		redirect('buku/buku');
	}

	public function pinjam_langsung()
	{
		$data = array(
			'id_peminjaman' => $this->input->post('id_peminjaman'),
			'id_user' => $this->input->post('id_user'),
			'no_buku' => $this->input->post('no_buku'),
			'nama_peminjam' => $this->input->post('nama_peminjam'),
			// 'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
			'tgl_peminjaman' => date('Y-m-d'),
			// 'tgl_pengembalian' => date('Y-m-d', strtotime('+7 day')),
			'status' => '1',
			'jml_pinjam' => '1'
		);
		$this->m_master->peminjaman($data);

		$status = array(
			'status' => '1',
		);
		$this->m_master->update_status_buku($data['no_buku'], $status);
		$this->session->set_flashdata('pesan', 'Peminjaman Berhasil!!!');
		if ($this->session->userdata('username') == "") {
			redirect('buku/buku');
		} else {
			redirect('master/peminjaman');
		}
	}

	//Update one item
	public function kembali($id_peminjaman)
	{
		$data = array(
			'id_peminjaman' => $id_peminjaman,
			'id_pengembalian' => $this->input->post('id_pengembalian'),
			'no_buku' => $this->input->post('no_buku'),
			'tgl_pengembalian' => date('Y-m-d'),
			'status' => '1',
			'jml_kembali' => '1'
		);
		$this->m_master->pengembalian($data);

		$status = array(
			'status' => '0',
			'no_buku' => $this->input->post('no_buku'),
		);
		$this->m_master->update($status);

		$status_pinjam = array(
			'status' => '2',
		);
		$this->m_master->update_status_pinjam($id_peminjaman, $status_pinjam);

		$denda = array(
			'id_pengembalian' => $this->input->post('id_pengembalian'),
			'jml_pembayaran' => $this->input->post('jml_pembayaran'),
		);
		$this->m_master->denda_buku($denda);

		$saran = array(
			'id_pengembalian' => $this->input->post('id_pengembalian'),
			'saran' => '0',
			'status_saran' => '1',
		);
		$this->m_master->saran($saran);

		$this->m_master->update_status_buku($data['no_buku'], $status);
		$this->session->set_flashdata('pesan', 'Pegembalian Berhasil!!!');
		redirect('master/pengembalian');
	}

	//Delete one item
	public function saran($id_pengembalian)
	{
		$data = array(
			'id_pengembalian' => $id_pengembalian,
			'saran' => $this->input->post('saran'),
			'status_saran' => '2'
		);
		$this->m_master->update_saran($data);
		$this->session->set_flashdata('pesan', 'Pegembalian Berhasil!!!');
		redirect('master/pengembalian');
	}

	public function jam($id_peminjaman)
	{
		$data = array(
			'id_peminjaman' => $id_peminjaman,
			'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
		);
		$this->m_master->update_status_pinjam($id_peminjaman, $data);
		$this->session->set_flashdata('pesan', 'Tanggal Pengembalian Berhasil Diupdate!!!');
		redirect('master/peminjaman');
	}
}

/* End of file Master.php */
