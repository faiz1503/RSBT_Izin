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
		$this->db->from('izin');
		$this->db->order_by('id_izin', 'desc');
		return $this->db->get()->result();
	}

	public function getKodeIzin()
	{
		$q = $this->db->query("select MAX(RIGHT(id_izin,3)) as id_izin from izin");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int) $k->id_izin) + 1;
				$kd = sprintf("%04s", $tmp);
			}
		} else {
			$kd = "0001";
		}
		return "PI-" . $kd;
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
		$this->db->insert('izin', $data);
		return $this->db->affected_rows() > 0 ? $this->db->insert_id() : FALSE;
	}

	function simpan_upload($bukti_izin, $id_izin, $id_pegawai, $lama_izin, $tgl_mulai, $tgl_akhir, $jadwal_off, $acc_kaunit, $ket_kaunit, $acc_kabid, $ket_kabid, $acc_kabid_sdm, $ket_sdm, $status, $id_jenis_izin)
	{
		$data['id_izin']       = $id_izin;
		$data['id_pegawai']       = $id_pegawai;
		$data['lama_izin'] = $lama_izin;
		$data['tgl_mulai']        = $tgl_mulai;
		$data['tgl_akhir']      = $tgl_akhir;
		$data['jadwal_off']        = $jadwal_off;
		$data['acc_kaunit']        = $acc_kaunit;
		$data['ket_kaunit']        = $ket_kaunit;
		$data['acc_kabid']        = $acc_kabid;
		$data['ket_kabid']        = $ket_kabid;
		$data['acc_kabid_sdm']        = $acc_kabid_sdm;
		$data['ket_sdm']        = $ket_sdm;
		$data['bukti_izin']        = $bukti_izin;
		$data['status']        = $status;
		$data['id_jenis_izin']        = $id_jenis_izin;
		$result              = $this->db->insert('izin', $data);
		return $result;
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('izin ap', array('ap.id_izin' => $id))->result();
	}

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('izin');
		$this->db->where('id_izin', $id);
		return $this->db->get()->row();
	}

	function update($id, $data)
	{
		$this->db->where('id_izin', $id);
		$this->db->update('izin', $data);
		return $this->db->affected_rows();
	}

	function delete($id)
	{
		$this->db->where('id_izin', $id);
		$this->db->delete('izin');
	}
}

/* End of file M_Pengajuan_izin.php */
