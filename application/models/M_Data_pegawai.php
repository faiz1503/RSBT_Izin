<?php

class M_Data_pegawai extends CI_Model
{
	public function get_by_id($id) //edit pegawai
	{
		$this->db->where('id_pegawai', $id);
		$this->db->from('pegawai');
		$query = $this->db->get();

		return $query->row();
	}

	public function update_pegawai($data, $where)
	{
		$this->db->update('pegawai', $data, $where);
		return $this->db->affected_rows();
	}
}
