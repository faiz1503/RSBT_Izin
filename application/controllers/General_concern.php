<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General_concern extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		echo "Page is not accessible";
	}

	public function print_out()
	{
		$data['page_title'] = "General Concern";
		$this->load->view('print/general_concern', $data);
	}
}
