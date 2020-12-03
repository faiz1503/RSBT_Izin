<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Promosi_jabatan extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('');
		}

		public function index(){
			$this->load->view('assets/_header');
			$page_data['page_content']='Promosi_jabatan';
			$this->load->view('Main',$page_data);
			$this->load->view('assets/_footer');
			}


	}
	?>