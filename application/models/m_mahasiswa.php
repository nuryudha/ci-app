<?php

class m_mahasiswa extends CI_model
{
	public function getAllMahasiswa()
	{
		$query = $this->db->get('mahasiswa');
		return $query->result_array();

		return $query = $this->db->get('mahasiswa')->result_array();
	}
}
