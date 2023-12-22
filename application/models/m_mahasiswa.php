<?php

class m_mahasiswa extends CI_model
{
	public function getAllMahasiswa()
	{
		$query = $this->db->get('mahasiswa');
		return $query->result_array();

		return $query = $this->db->get('mahasiswa')->result_array();
	}

	// ? POST DATA
	public function tambahDataMahasiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"nrp" => $this->input->post('nrp', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true),
		];

		$this->db->insert('mahasiswa', $data);
	}

	// ? Delete
	public function hapusDataMahasiswa($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');
	}
}
