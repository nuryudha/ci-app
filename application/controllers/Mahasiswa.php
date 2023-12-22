<?php


class Mahasiswa extends CI_Controller
{
	public $m_mahasiswa;
	public $form_validation;
	public $session;

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

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Form Tambah Data Mahasiswa';
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->m_mahasiswa->tambahDataMahasiswa();
			$this->session->set_flashdata('flash', 'Ditambahkan'); // 1 nama session , 2 nama isinya apa
			redirect('mahasiswa/index'); // kalau berhasil langsung pindah ke halaman mahasiswa
		}
	}

	public function hapus($id)
	{
		$this->m_mahasiswa->hapusDataMahasiswa($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('mahasiswa/index');
	}
}
