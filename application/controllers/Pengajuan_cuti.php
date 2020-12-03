<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pengajuan_cuti extends CI_Controller {
        
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_Pengajuan_cuti');
		}

		public function index(){
			$this->load->view('assets/_header');
			$page_data['page_content']='Pengajuan_cuti';
			$this->load->view('Main',$page_data);
			$this->load->view('assets/_footer');
			}

	}
	?>