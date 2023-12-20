<?php


class Mahasiswa extends CI_Controller
{
	public $m_mahasiswa;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa');
	}
	public function index()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mahasiswa'] = $this->m_mahasiswa->getAllMahasiswa();
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}
}
