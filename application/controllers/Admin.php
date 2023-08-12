<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_auth');
		$this->load->model('m_master');
	}

	// // List all your items
	public function index()
	{
		$data = array(
			'title' => 'Perpustakaan',
			'total_buku' => $this->m_master->total_buku(),
			'total_pinjam' => $this->m_master->total_pinjam(),
			'total_denda' => $this->m_master->total_denda(),
			'total_kembali' => $this->m_master->total_kembali(),
			'grafik_buku' => $this->m_master->grafik_buku(),
			'grafik_buku_pinjam' => $this->m_master->grafik_buku_pinjam(),
			'grafik_buku_baca_tahun' => $this->m_master->grafik_buku_baca_tahun(),
			'grafik_buku_baca_bulan' => $this->m_master->grafik_buku_baca_bulan(),
			'grafik_buku_baca' => $this->m_master->grafik_buku_baca(),
			'grafik_buku_baca_usia' => $this->m_master->grafik_buku_baca_usia(),
			'grafik_buku_baca_jk' => $this->m_master->grafik_buku_baca_jk(),
			'log_baca_hari' => $this->m_master->log_baca_hari(),
			'log_baca_bulan' => $this->m_master->log_baca_bulan(),
			'log_baca_tahun' => $this->m_master->log_baca_tahun(),
			'log_pinjam_hari' => $this->m_master->log_pinjam_hari(),
			'log_pinjam_bulan' => $this->m_master->log_pinjam_bulan(),
			'log_pinjam_tahun' => $this->m_master->log_pinjam_tahun(),
			'log_pengembalian_hari' => $this->m_master->log_pengembalian_hari(),
			'log_pengembalian_bulan' => $this->m_master->log_pengembalian_bulan(),
			'log_pengembalian_tahun' => $this->m_master->log_pengembalian_tahun(),
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
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array(
			'required' => '%s Mohon untuk diisi!!!',
		));
		$this->form_validation->set_rules('usia', 'Tanggal Lahir', 'required', array(
			'required' => '%s Mohon untuk diisi!!!',
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('level_user', 'Status Anggota / Siswa', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() ==  TRUE) {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "foto";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Registrasi Pengunjung',
					'error_upload' => $this->upload->display_errors()
				);
				$this->load->view('backend/log/v_register', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/foto' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'no_hp' => $this->input->post('no_hp'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'usia' => $this->input->post('usia'),
					'alamat' => $this->input->post('alamat'),
					'level_user' => $this->input->post('level_user'),
					'foto' => $upload_data['uploads']['file_name'],
				);
				$this->m_auth->registrasi($data);
				$this->session->set_flashdata('pesan', 'Register Berhasi, Silahkan Untuk Login');
				redirect('Home');
			}
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'no_hp' => $this->input->post('no_hp'),
				'usia' => $this->input->post('usia'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'level_user' => $this->input->post('level_user'),
			);
			$this->m_auth->registrasi($data);
			$this->session->set_flashdata('pesan', 'Register Berhasi, Silahkan Untuk Login');
			redirect('Home');
		}
		$data = array(
			'title' => 'Registrasi Pengunjung'
		);
		$this->load->view('backend/log/v_register', $data, FALSE);
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

	public function user()
	{
		$data = array(
			'title' => 'Data User Admin',
			'user' => $this->m_auth->user(),
			'isi' => 'backend/user/v_user'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function anggota()
	{
		$data = array(
			'title' => 'Data Anggota',
			'user' => $this->m_auth->user_anggota(),
			'isi' => 'backend/anggota/v_user'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function add()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'level_user' => $this->input->post('level_user'),
		);
		$this->m_auth->registrasi($data);
		$this->session->set_flashdata('pesan', 'Tambah Data User Admin Berhasi!!!');
		redirect('admin/user');
	}

	public function update($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'level_user' => $this->input->post('level_user'),
		);
		$this->m_auth->update($data);
		$this->session->set_flashdata('pesan', 'Update Data User Admin Berhasi!!!');
		redirect('admin/user');
	}
	public function delete($id_user)
	{
		$data = array(
			'id_user' => $id_user,
		);
		$this->m_auth->delete($data);
		$this->session->set_flashdata('pesan', 'Delete Data User Admin Berhasi!!!');
		redirect('admin/user');
	}

	public function verifikasi($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'level_user' => 5
		);
		$this->m_auth->update($data);
		$this->session->set_flashdata('pesan', 'Verifikasi Data Anggota Berhasi!!!');
		redirect('admin/anggota');
	}

	public function detail($id_user)
	{
		// if ($this->session->userdata('level_user') == '3') {
		// 	if ($this->uri->segment('3') == '') {
		// 		echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('user') . '";</script>';
		// 	}
		// 	$this->data['idbo'] = $this->session->userdata('ses_id');
		// 	$count = $this->M_Admin->CountTableId('tbl_login', 'id_login', $this->uri->segment('3'));
		// 	if ($count > 0) {
		// 		$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $this->uri->segment('3'));
		// 	} else {
		// 		echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('user') . '"</script>';
		// 	}
		// } elseif ($this->session->userdata('level') == 'Anggota') {
		// 	$this->data['idbo'] = $this->session->userdata('ses_id');
		// 	$count = $this->M_Admin->CountTableId('tbl_login', 'id_login', $this->session->userdata('ses_id'));
		// 	if ($count > 0) {
		// 		$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $this->session->userdata('ses_id'));
		// 	} else {
		// 		echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('user') . '"</script>';
		// 	}
		// }
		// $this->data['title_web'] = 'Print Kartu Anggota ';
		// $this->load->view('user/detail', $this->data);
		$data = array(
			'title' => 'cetak kartu anggota',
			'user' => $this->m_auth->detail($id_user),
		);
		$this->load->view('backend/anggota/detail', $data, FALSE);
	}
}

/* End of file Login.php */
