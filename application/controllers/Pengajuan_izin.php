<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_izin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pengajuan_izin');

		//cek kelengkapan data pegawai
		cek_data();
	}

	public function index()
	{
		//baca session
		$sso_user_data = $this->session->userdata('sso_user_data'); //session
		//ambil session pegawai
		$page_data['staff'] = $this->db->get_where('staff', ['username' => $sso_user_data->username])->row_array();
		$page_data['pegawai'] = $this->db->get_where('pegawai', ['id_staff' => $page_data['staff']['id_staff']])->row_array();
		
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'Pengajuan_izin';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function load_pegawai_ajax($id_pegawai)
	{
		//get id
		$data = $this->M_Pengajuan_izin->get_by_id($id_pegawai);
		// $data->tgl_mulai = ($data->tgl_mulai == '0000-00-00') ? '' : $data->tgl_mulai; // if 0000-00-00 set tu empty for datepicker compatibility
		// $data->tgl_akhir = ($data->tgl_akhir == '0000-00-00') ? '' : $data->tgl_akhir; // if 0000-00-00 set tu empty for datepicker compatibility
		
		// $data->masa_sip = ($data->masa_sip == '0000-00-00') ? '' : $data->masa_sip; // if 0000-00-00 set tu empty for datepicker compatibility
		
		echo json_encode($data);
	}
}
