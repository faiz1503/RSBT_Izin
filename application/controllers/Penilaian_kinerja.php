<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_kinerja extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Penilaian_kinerja');

		//cek kelengkapan data pegawai
		cek_data();
	}

	public function index()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'Penilaian_kinerja';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}
}
