<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		// $this->load->model('m_dashboard');
		// $this->load->model('m_chatting');
	}

	public function index()
	{
		$data = array(
			'title' => 'Laporan',
			'isi' => 'backend/laporan/v_laporan'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function lap_pinjam()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Peminjaman Buku',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_pinjam($tanggal, $bulan, $tahun),
			'isi' => 'backend/laporan/v_lap_harian'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function lap_baca()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Baca Buku',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_baca($tanggal, $bulan, $tahun),
			'isi' => 'backend/laporan/v_lap_baca'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
}
