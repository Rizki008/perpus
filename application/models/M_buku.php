<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_buku extends CI_Model
{

	// List all your items
	public function buku()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->order_by('id_buku', 'desc');
		return $this->db->get()->result();
	}
	public function baca($id_buku)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku', $id_buku);
		return $this->db->get()->result();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('buku', $data);
	}

	public function detail($id_buku)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku', $id_buku);
		return $this->db->get()->row();
	}

	//Update one item
	public function update($data)
	{
		$this->db->where('id_buku', $data['id_buku']);
		$this->db->update('buku', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_buku', $data['id_buku']);
		$this->db->delete('buku', $data);
	}

	public function buku_pinjam()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('peminjaman_buku', 'peminjaman_buku.no_buku = buku.no_buku', 'left');
		$this->db->where('buku.status', 1);
		$this->db->where('peminjaman_buku.status', 1);
		$this->db->order_by('id_buku', 'desc');
		return $this->db->get()->result();
	}
	public function bukud()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->limit(4);
		$this->db->order_by('id_buku', 'desc');
		return $this->db->get()->result();
	}

	public function bacabuku($data)
	{
		$this->db->insert('baca', $data);
	}
}

/* End of file M_buku.php */
