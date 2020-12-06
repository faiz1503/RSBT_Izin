<?php

class M_Pengajuan_izin extends CI_Model
{

	public function get_by_id($id) //edit pegawai
	{
		$this->db->where('pegawai.id_pegawai', $id);
		$this->db->join('detail_pegawai', 'detail_pegawai.id_pegawai=pegawai.id_pegawai');
		$this->db->from('pegawai');
		$query = $this->db->get();

		return $query->row();
	}
}
