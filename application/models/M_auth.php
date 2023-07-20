<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function login_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username' => $username, 'password' => $password));
		return $this->db->get()->row();
	}

	public function registrasi($data)
	{
		$this->db->insert('user', $data);
	}

	public function profile($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->row();
	}
}
