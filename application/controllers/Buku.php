<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
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
			'title' => 'Data Buku',
			'buku' => $this->m_buku->buku(),
			'isi' => 'backend/buku/v_buku'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('no_buku', 'No Buku', 'required|is_unique[buku.no_buku]', array(
			'required' => '%s Mohon Untuk Diisi!!!',
			'is_unique' => 'Sudah Ada!!!'
		));
		$this->form_validation->set_rules('judul', 'Judul', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));
		$this->form_validation->set_rules('isbn', 'ISBN', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/sampul';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "sampul";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Buku',
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/buku/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/sampul' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'no_buku' => $this->input->post('no_buku'),
					'judul' => $this->input->post('judul'),
					'pengarang' => $this->input->post('pengarang'),
					'penerbit' => $this->input->post('penerbit'),
					'isbn' => $this->input->post('isbn'),
					'status' => '0',
					'sampul' => $upload_data['uploads']['file_name'],
				);
				$this->m_buku->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				redirect('buku');
			}
		}

		$data = array(
			'title' => 'Tambah Buku',
			'isi' => 'backend/buku/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Update one item
	public function edit($id_buku = NULL)
	{
		$this->form_validation->set_rules('no_buku', 'No Buku', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!'
		));
		$this->form_validation->set_rules('judul', 'Judul', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));
		$this->form_validation->set_rules('isbn', 'ISBN', 'required', array(
			'required' => '%s Mohon Untuk Diisi!!!',
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/sampul';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "sampul";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Buku',
					'buku' => $this->m_buku->detail($id_buku),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/buku/v_edit'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				//hapus sampul di folder
				$buku = $this->m_buku->detail($id_buku);
				if ($buku->sampul !== "") {
					unlink('./assets/sampul/' . $buku->sampul);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/sampul' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_buku' => $id_buku,
					'no_buku' => $this->input->post('no_buku'),
					'judul' => $this->input->post('judul'),
					'pengarang' => $this->input->post('pengarang'),
					'penerbit' => $this->input->post('penerbit'),
					'isbn' => $this->input->post('isbn'),
					'status' => '0',
					'sampul' => $upload_data['uploads']['file_name'],
				);
				$this->m_buku->update($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
				redirect('buku');
			} //tanpa ganti gambar
			$data = array(
				'id_buku' => $id_buku,
				'no_buku' => $this->input->post('no_buku'),
				'judul' => $this->input->post('judul'),
				'pengarang' => $this->input->post('pengarang'),
				'penerbit' => $this->input->post('penerbit'),
				'isbn' => $this->input->post('isbn'),
				'status' => '0'
			);
			$this->m_buku->update($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('buku');
		}

		$data = array(
			'title' => 'Edit Buku',
			'buku' => $this->m_buku->detail($id_buku),
			'isi' => 'backend/buku/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_buku = NULL)
	{
		//hapus gambar
		$buku = $this->m_buku->detail($id_buku);
		if ($buku->sampul !== "" and $buku->file !== "") {
			unlink('./assets/sampul/' . $buku->sampul);
			unlink('./assets/buku/' . $buku->file);
		}

		$data = array(
			'id_buku' => $id_buku
		);
		$this->m_buku->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('buku');
	}

	public function buku()
	{
		$data = array(
			'title' => 'Data Buku',
			'buku' => $this->m_buku->buku(),
			'isi' => 'siswa/buku/v_buku'
		);
		$this->load->view('siswa/v_wrapper', $data, FALSE);
	}

	//Update one item
	public function upload($id_buku = NULL)
	{
		if ($this->form_validation->run() == FALSE) {
			$config['upload_path'] = './assets/buku';
			$config['allowed_types'] = 'pdf';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "file";
			if (!$this->upload->do_upload($field_name)) {
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/buku' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_buku' => $id_buku,
					'file' => $upload_data['uploads']['file_name'],
				);
				$this->m_buku->update($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Uploads !!!');
				redirect('buku');
			}
		}
	}

	public function download($id_buku)
	{
		$data = $this->db->get_where('buku', ['id_buku' => $id_buku])->row();
		force_download('assets/buku/' . $data->file, NULL);
	}
}

/* End of file Buku.php */
