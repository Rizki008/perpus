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
	public function update($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}

	public function profile($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->row();
	}

	public function user()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user', 1);
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}
}
