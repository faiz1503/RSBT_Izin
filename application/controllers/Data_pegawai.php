<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Data_pegawai extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('M_Data_pegawai');
		}

		
		public function index(){
			$this->load->view('assets/_header');
			$page_data['page_content']='Data_pegawai';
			$this->load->view('Main',$page_data);
			$this->load->view('assets/_footer');
			}
	}
	?>