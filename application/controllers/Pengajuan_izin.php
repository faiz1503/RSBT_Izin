<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_izin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pengajuan_izin');
		$this->load->helper(array('button', 'currency_format', 'datetime', 'encrypt', 'format', 'my_function'));
	}

	public function index()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'Pengajuan_izin';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function izin($param = '', $id = '')
	{
		$view['title'] = 'Pengajuan Izin';
		$view['pageName'] = 'Pengajuan_izin';
		if ($param == 'getAllData') {
			$dt    = $this->Model_kesatuan->getAllData();
			$start = $this->input->post('start');
			$data  = array();
			foreach ($dt['data'] as $row) {
				$id  = $row->id;
				$th1 = '<div style="font-size:12px;">' . ++$start . '</div>';
				$th2 = '<div style="font-size:12px;">' . $row->nama_kesatuan . '</div>';
				$th3 = get_btn_group1('ubah("' . $id . '")', 'hapus("' . $id . '")');
				$data[]    = gathered_data(array($th1, $th2, $th3));
			}
			$dt['data'] = $data;
			echo json_encode($dt);
			die;
		}
	}
}
