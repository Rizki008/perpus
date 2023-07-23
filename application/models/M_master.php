<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{

	public function pinjam()
	{
		if ($this->session->userdata('level_user') === '1') {
			$this->db->select('peminjaman_buku.id_peminjaman,user.nama,peminjaman_buku.nama_peminjam,buku.no_buku,peminjaman_buku.tgl_peminjaman,peminjaman_buku.tgl_pengembalian,peminjaman_buku.status,buku.judul');
			$this->db->from('peminjaman_buku');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('peminjaman_buku.status', '1');
			$this->db->order_by('id_peminjaman', 'desc');
			return $this->db->get()->result();
		} elseif ($this->session->userdata('level_user') === '2') {
			$this->db->select('peminjaman_buku.id_peminjaman,user.nama,peminjaman_buku.nama_peminjam,buku.no_buku,peminjaman_buku.tgl_peminjaman,peminjaman_buku.tgl_pengembalian,peminjaman_buku.status,buku.judul');
			$this->db->from('peminjaman_buku');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('peminjaman_buku.status', '1');
			$this->db->where('user.id_user', $this->session->userdata('id_user'));
			$this->db->order_by('id_peminjaman', 'desc');
			return $this->db->get()->result();
		}
	}
	public function kembali()
	{
		if ($this->session->userdata('level_user') === '1') {
			$this->db->select('pengembalian_buku.id_pengembalian,peminjaman_buku.id_peminjaman,user.nama,buku.no_buku,buku.judul,pengembalian_buku.tgl_pengembalian,peminjaman_buku.tgl_peminjaman,pengembalian_buku.status,saran.status_saran');
			$this->db->from('pengembalian_buku');
			$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->join('saran', 'saran.id_pengembalian = pengembalian_buku.id_pengembalian', 'left');
			$this->db->order_by('pengembalian_buku.id_pengembalian', 'desc');
			return $this->db->get()->result();
		} elseif ($this->session->userdata('level_user') === '2') {
			$this->db->select('pengembalian_buku.id_pengembalian,peminjaman_buku.id_peminjaman,user.nama,buku.no_buku,buku.judul,pengembalian_buku.tgl_pengembalian,peminjaman_buku.tgl_peminjaman,pengembalian_buku.status,saran.status_saran');
			$this->db->from('pengembalian_buku');
			$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
			$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
			$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
			$this->db->where('user.id_user', $this->session->userdata('id_user'));
			$this->db->join('saran', 'saran.id_pengembalian = pengembalian_buku.id_pengembalian', 'left');
			$this->db->order_by('pengembalian_buku.id_pengembalian', 'desc');
			return $this->db->get()->result();
		}
	}
	public function denda()
	{
		$this->db->select('*');
		$this->db->from('denda');
		$this->db->join('pengembalian_buku', 'pengembalian_buku.id_pengembalian = denda.id_pengembalian', 'left');
		$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
		$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
		$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
		$this->db->order_by('id_pembayaran', 'desc');
		return $this->db->get()->result();
	}
	public function saran_buku()
	{
		$this->db->select('*');
		$this->db->from('saran');
		$this->db->join('pengembalian_buku', 'pengembalian_buku.id_pengembalian = saran.id_pengembalian', 'left');
		$this->db->join('peminjaman_buku', 'peminjaman_buku.id_peminjaman = pengembalian_buku.id_peminjaman', 'left');
		$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
		$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
		$this->db->where('status_saran', 2);
		$this->db->order_by('id_saran', 'desc');
		return $this->db->get()->result();
	}

	public function peminjaman($data)
	{
		$this->db->insert('peminjaman_buku', $data);
	}
	public function pengembalian($data)
	{
		$this->db->insert('pengembalian_buku', $data);
	}
	public function denda_buku($data)
	{
		$this->db->insert('denda', $data);
	}
	public function saran($data)
	{
		$this->db->insert('saran', $data);
	}
	public function update_status_buku($no_buku, $data)
	{
		$this->db->where('no_buku', $no_buku);
		$this->db->update('buku', $data);
	}
	public function update_status_pinjam($id_peminjaman, $data)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('peminjaman_buku', $data);
	}
	public function update_saran($data)
	{
		$this->db->where('id_pengembalian', $data['id_pengembalian']);
		$this->db->update('saran', $data);
	}
	public function update($data)
	{
		$this->db->where('no_buku', $data['no_buku']);
		$this->db->update('buku', $data);
	}
}

/* End of file M_master.php */
