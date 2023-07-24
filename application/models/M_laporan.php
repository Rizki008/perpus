<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	public function lap_pinjam($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('peminjaman_buku');
		$this->db->join('user', 'user.id_user = peminjaman_buku.id_user', 'left');
		$this->db->join('buku', 'buku.no_buku = peminjaman_buku.no_buku', 'left');
		$this->db->where('DAY(peminjaman_buku.tgl_peminjaman)', $tanggal);
		$this->db->where('MONTH(peminjaman_buku.tgl_peminjaman)', $bulan);
		$this->db->where('YEAR(peminjaman_buku.tgl_peminjaman)', $tahun);
		$this->db->order_by('id_peminjaman', 'desc');
		return $this->db->get()->result();
	}
	public function lap_baca($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('baca');
		$this->db->join('user', 'user.id_user = baca.id_user', 'left');
		$this->db->join('buku', 'buku.id_buku = baca.id_buku', 'left');
		$this->db->where('DAY(baca.tgl_baca)', $tanggal);
		$this->db->where('MONTH(baca.tgl_baca)', $bulan);
		$this->db->where('YEAR(baca.tgl_baca)', $tahun);
		$this->db->order_by('id_baca', 'desc');
		return $this->db->get()->result();
	}
}

/* End of file M_laporan.php */
