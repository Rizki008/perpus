<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_kuisioner');
		$this->load->model('m_master');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Pertanyaan Kuisioner',
			'kuisioner' => $this->m_kuisioner->pertanyaan(),
			'isi' => 'backend/kuisioner/v_kuisioner'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'pertanyaan' => $this->input->post('pertanyaan'),
			'isi1' => $this->input->post('isi1'),
			'isi2' => $this->input->post('isi2'),
			'isi3' => $this->input->post('isi3'),
			'isi4' => $this->input->post('isi4'),
		);
		$this->m_kuisioner->add($data);
		$this->session->set_flashdata('pesan', 'Tambah Data Kuisioner Berhasi!!!');
		redirect('kuisioner');
	}

	public function update($id_pertanyaan)
	{
		$data = array(
			'id_pertanyaan' => $id_pertanyaan,
			'pertanyaan' => $this->input->post('pertanyaan'),
			'isi1' => $this->input->post('isi1'),
			'isi2' => $this->input->post('isi2'),
			'isi3' => $this->input->post('isi3'),
			'isi4' => $this->input->post('isi4'),
		);
		$this->m_kuisioner->update($data);
		$this->session->set_flashdata('pesan', 'Update Data Kuisioner Berhasi!!!');
		redirect('kuisioner');
	}
	public function delete($id_pertanyaan)
	{
		$data = array(
			'id_pertanyaan' => $id_pertanyaan,
		);
		$this->m_kuisioner->delete($data);
		$this->session->set_flashdata('pesan', 'Delete Data Kuisioner Berhasi!!!');
		redirect('kuisioner');
	}
}

/* End of file Kuisioner.php */
