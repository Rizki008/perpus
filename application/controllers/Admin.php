<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_auth');
	}

	// // List all your items
	public function index()
	{
		$data = array(
			'title' => 'Masuk Pelanggan',
			'isi' => 'backend/v_admin'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'username', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->login_user->login($username, $password);
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', array(
			'required' => '%s Mohon untuk diisi!!!',
		));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'is_unique' => '%s Sudah Terdaptar'
		));
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'min_length' => '%s Minimal 8',
			'regex_match' => '%s Password Harus Gabungan Huruf Besar, Hurup Kecil, Angka dan Karakter Khusus'
		));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi password', 'required|matches[password]', array(
			'required' => '%s Mohon Untuk Diisi !!!',
			'matches' => '%s Tidak Sama !!!'
		));
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[12]|max_length[13]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'min_length' => '%s Minimal 11',
			'max_length' => '%s Maksimal 13',
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() ==  FALSE) {
			$data = array(
				'title' => 'Registrasi Siswa',
				'isi'  => 'backend/log/v_register'
			);
			$this->load->view('backend/log/v_register', $data, FALSE);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat'),
				'level_user' => 2,
			);
			$this->m_auth->registrasi($data);
			$this->session->set_flashdata('pesan', 'Register Berhasi, Silahkan Untuk Login');
			redirect('Home');
		}
	}

	public function logout()
	{
		$this->login_user->logout();
	}

	public function profile($id_user)
	{
		$data = array(
			'title' => 'Profile',
			'profile' => $this->m_auth->porfile($id_user),
			'isi' => 'backend/log/v_profile'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
}

/* End of file Login.php */