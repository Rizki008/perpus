<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_user
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($username, $password)
	{
		$cek = $this->ci->m_auth->login_user($username, $password);
		if ($cek) {
			$id_user = $cek->id_user;
			$nama = $cek->nama;
			$no_hp = $cek->no_hp;
			$username = $cek->username;
			$password = $cek->password;
			$alamat = $cek->alamat;
			$level_user = $cek->level_user;

			$this->ci->session->set_userdata('id_user', $id_user);
			$this->ci->session->set_userdata('nama', $nama);
			$this->ci->session->set_userdata('no_hp', $no_hp);
			$this->ci->session->set_userdata('username', $username);
			$this->ci->session->set_userdata('password', $password);
			$this->ci->session->set_userdata('alamat', $alamat);
			$this->ci->session->set_userdata('level_user', $level_user);

			if ($level_user == 1) {
				redirect('admin');
			} elseif ($level_user == 2) {
				redirect('home/siswa');
			}
		} else {
			$this->ci->session->set_flashdata('error', 'Username Atau Password Error');
			redirect('home');
		}
	}

	public function proteksi()
	{
		if ($this->ci->session->userdata('username') == '') {
			$this->ci->session->set_flashdata('error', 'Maaf Anda Belum Login');
			redirect('home');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_user');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('nama');
		$this->ci->session->unset_userdata('no_hp');
		$this->ci->session->unset_userdata('password');
		$this->ci->session->unset_userdata('alamat');
		$this->ci->session->unset_userdata('level_user');
		$this->ci->session->set_flashdata('pesan', 'Berhasil Logout');
		redirect('home');
	}
}
