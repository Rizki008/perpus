<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{

	public function pinjam()
	{
		$this->db->select('*');
		$this->db->from('peminjaman_buku');
		$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
		$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
		$this->db->order_by('id_peminjaman', 'desc');
		return $this->db->get()->result();
	}
	public function kembali()
	{
		$this->db->select('*');
		$this->db->from('pengembalian_buku');
		$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
		$this->db->order_by('id_pengembalian', 'desc');
		return $this->db->get()->result();
	}
	public function denda()
	{
		$this->db->select('*');
		$this->db->from('denda');
		$this->db->join('pengembalian_buku', 'pengembalian_buku.id_pengembalian = denda.id_pengembalian', 'left');
		$this->db->order_by('id_pembayaran', 'desc');
		return $this->db->get()->result();
	}
}

/* End of file M_master.php */
