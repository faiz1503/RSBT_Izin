<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Jadwal_dinas extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('M_Jadwal_dinas');
		}

		public function index(){
			$this->load->view('assets/_header');
			$page_data['page_content']='Jadwal_dinas';
			$this->load->view('Main',$page_data);
			$this->load->view('assets/_footer');
			}

	}
	?>