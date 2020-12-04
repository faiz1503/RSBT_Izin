<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_izin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pengajuan_izin');
		$this->load->helper('button_helper', 'currency_format_helper', 'datetime_helper', 'encrypt_helper', 'format_helper', 'my_function_helper');
	}

	public function index()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'Pengajuan_izin';
		$page_data['getPegawai'] = $this->M_Pengajuan_izin->getPegawai();
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function izin($param = '', $id = '')
	{
		$view['title'] = 'Pengajuan Izin';
		$view['pageName'] = 'Pengajuan_izin';
		if ($param == 'getAllData') {
			$dt    = $this->M_Pengajuan_izin->getAllData();
			$start = $this->input->post('start');
			$data  = array();
			foreach ($dt['data'] as $row) {
				$id  = $row->id;
				$th1 = '<div style="font-size:12px;">' . ++$start . '</div>';
				$th2 = '<div style="font-size:12px;">' . $row->nama . '</div>';
				$th3 = '<div style="font-size:12px;">' . $row->lama_izin . '</div>';
				$th4 = '<div style="font-size:12px;">' . $row->tgl_mulai . '</div>';
				$th5 = '<div style="font-size:12px;">' . $row->tgl_akhir . '</div>';
				$th6 = '<div style="font-size:12px;">' . $row->jadwal_off . '</div>';
				$th7 = '<div style="font-size:12px;">' . $row->acc_kaunit . '</div>';
				$th8 = '<div style="font-size:12px;">' . $row->ket_kaunit . '</div>';
				$th9 = '<div style="font-size:12px;">' . $row->acc_kabid . '</div>';
				$th10 = '<div style="font-size:12px;">' . $row->ket_kabid . '</div>';
				$th11 = '<div style="font-size:12px;">' . $row->acc_kabid_sdm . '</div>';
				$th12 = '<div style="font-size:12px;">' . $row->ket_sdm . '</div>';
				$th13 = '<div style="font-size:12px;">' . $row->bukti_izin . '</div>';
				$th14 = '<div style="font-size:12px;">' . $row->status . '</div>';
				$th15 = '<div style="font-size:12px;">' . $row->jenis_izin . '</div>';
				$th16 = get_btn_group1('ubah("' . $id . '")', 'hapus("' . $id . '")');
				$data[]    = gathered_data(array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12, $th13, $th14, $th15, $th16));
			}
			$dt['data'] = $data;
			echo json_encode($dt);
			die;
		} else if ($param == 'getById') {
		} else if ($param == 'update') {
		} else if ($param == 'delete') {
		}
	}
}
