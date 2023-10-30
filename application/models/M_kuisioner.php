<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_kuisioner extends CI_Model
{


	public function pertanyaan()
	{
		$this->db->select('*');
		$this->db->from('pertanyaan');
		$this->db->order_by('id_pertanyaan', 'desc');
		return $this->db->get()->result();
	}
	public function add($data)
	{
		$this->db->insert('pertanyaan', $data);
	}
	public function update($data)
	{
		$this->db->where('id_pertanyaan', $data['id_pertanyaan']);
		$this->db->update('pertanyaan', $data);
	}
	public function delete($data)
	{
		$this->db->where('id_pertanyaan', $data['id_pertanyaan']);
		$this->db->delete('pertanyaan', $data);
	}

	public function kuisioner()
	{
		$this->db->select('*');
		$this->db->from('saran');
		$this->db->join('pengembalian_buku', 'saran.id_pengembalian = pengembalian_buku.id_pengembalian', 'left');
		$this->db->join('buku', 'pengembalian_buku.no_buku = buku.no_buku', 'left');
		return $this->db->get()->result();
	}
	// public function rating()
	// {
	// 	$this->db->select_sum('rating');
	// 	$this->db->from('saran');
	// 	return $this->db->get()->result();
	// }
}

/* End of file M_kuisioner.php */
