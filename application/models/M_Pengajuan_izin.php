<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* Model Code Author : Fitra Arrafiq */
class M_Pengajuan_izin extends CI_Model
{
	public function getAllData()
	{
		$this->datatables->select('i.id_izin, p.nama, i.lama_izin, i.tgl_mulai, i.tgl_akhir, i.jadwal_off, i.acc_kaunit, i.ket_kaunit, i.acc_kabid, i.ket_kabid, i.acc_kabid_sdm, i.ket_sdm, i.bukti_izin, i.status, ji.jenis_izin, ji.jenis_izin');
		$this->datatables->from('izin i');
		$this->datatables->join('pegawai p', 'p.id_pegawai = i.id_pegawai', 'left');
		$this->datatables->join('jenis_izin ji', 'ji.id_jenis_izin = i.id_jenis_izin', 'left');
		return $this->datatables->generate();
	}

	public function getData()
	{
		$this->db->select('*');
		$this->db->from('tb_kesatuan');
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}

	public function getPegawai()
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->order_by('id_pegawai', 'desc');
		return $this->db->get()->result();
	}

	public function addData($data)
	{
		$this->db->insert('tb_kesatuan', $data);
		return $this->db->affected_rows() > 0 ? $this->db->insert_id() : FALSE;
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('tb_kesatuan ap', array('ap.id' => $id))->result();
	}

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kesatuan');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_kesatuan', $data);
		return $this->db->affected_rows();
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_kesatuan');
	}
}

/* End of file M_Pengajuan_izin.php */
