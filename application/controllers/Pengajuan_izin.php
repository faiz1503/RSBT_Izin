<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_izin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pengajuan_izin');
	}

	public function index()
	{
		$this->load->view('assets/_header');
		$page_data['page_content'] = 'Pengajuan_izin';
		$page_data['getPegawai']   = $this->M_Pengajuan_izin->getPegawai();
		$page_data['getMaxId'] = $this->M_Pengajuan_izin->getKodeIzin();
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function izin($param = '', $id = '')
	{
		$view['title']    = 'Pengajuan Izin';
		$view['pageName'] = 'Pengajuan_izin';
		if ($param == 'getAllData') {
			$dt    = $this->M_Pengajuan_izin->getAllData();
			$start = $this->input->post('start');
			$data  = array();
			foreach ($dt['data'] as $row) {
				$id   = $row->id_izin;
				$th1  = '<div style="font-size:12px;">' . ++$start . '</div>';
				$th2  = get_btn_group1('ubah("' . $id . '")', 'hapus("' . $id . '")');
				$th3  = '<div style="font-size:12px;">' . $row->nama . '</div>';
				$th4  = '<div style="font-size:12px;">' . $row->lama_izin . '</div>';
				$th5  = '<div style="font-size:12px;">' . tgl_indo($row->tgl_mulai) . '</div>';
				$th6  = '<div style="font-size:12px;">' . tgl_indo($row->tgl_akhir) . '</div>';
				$th7  = '<div style="font-size:12px;">' . $row->jadwal_off . '</div>';
				$th8  = '<div style="font-size:12px;">' . $row->acc_kaunit . '</div>';
				$th9  = '<div style="font-size:12px;">' . $row->ket_kaunit . '</div>';
				$th10 = '<div style="font-size:12px;">' . $row->acc_kabid . '</div>';
				$th11 = '<div style="font-size:12px;">' . $row->ket_kabid . '</div>';
				$th12 = '<div style="font-size:12px;">' . $row->acc_kabid_sdm . '</div>';
				$th13 = '<div style="font-size:12px;">' . $row->ket_sdm . '</div>';
				$th14 = '<div style="font-size:12px;">' . $row->bukti_izin . '</div>';
				$th15 = '<div style="font-size:12px;">' . $row->status . '</div>';
				$th16 = '<div style="font-size:12px;">' . $row->jenis_izin . '</div>';
				$data[]     = gathered_data(array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12, $th13, $th14, $th15, $th16));
			}
			$dt['data'] = $data;
			echo json_encode($dt);
			die;
		} else if ($param == 'getById') {
		} else if ($param == 'addData') {
			$config['upload_path']   = "./bukti_izin";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|png|bmp';
			$config['remove_spaces'] = TRUE;
			if (!empty($_FILES['bukti_izin']['name'])) {
				$this->load->library('upload', $config);
				$db['bukti_izin']    = $_FILES['bukti_izin']['name'];
				$db['id_izin']    = htmlspecialchars($this->input->post('id_izin'));
				$db['id_pegawai']    = htmlspecialchars($this->input->post('id_pegawai'));
				$db['lama_izin']     = htmlspecialchars($this->input->post('lama_izin'));
				$db['tgl_mulai']     = htmlspecialchars($this->input->post('tgl_mulai'));
				$db['tgl_akhir']     = htmlspecialchars($this->input->post('tgl_akhir'));
				$db['jadwal_off']    = htmlspecialchars($this->input->post('jadwal_off'));
				$db['acc_kaunit']    = htmlspecialchars($this->input->post('acc_kaunit'));
				$db['ket_kaunit']    = htmlspecialchars($this->input->post('ket_kaunit'));
				$db['acc_kabid']     = htmlspecialchars($this->input->post('acc_kabid'));
				$db['ket_kabid']     = htmlspecialchars($this->input->post('ket_kabid'));
				$db['acc_kabid_sdm'] = htmlspecialchars($this->input->post('acc_kabid_sdm'));
				$db['ket_sdm']       = htmlspecialchars($this->input->post('ket_sdm'));
				$db['status']        = htmlspecialchars($this->input->post('status'));
				$db['id_jenis_izin'] = htmlspecialchars($this->input->post('id_jenis_izin'));
				$cekData         = $this->M_Pengajuan_izin->getData();
				if ($cekData[0]->bukti_izin != $db['bukti_izin']) {
					$this->M_Pengajuan_izin->simpan_upload(str_replace(' ', '_', $db['bukti_izin']), $db['id_izin'], $db['id_pegawai'], $db['lama_izin'], $db['tgl_mulai'], $db['tgl_akhir'], $db['jadwal_off'], $db['acc_kaunit'], $db['ket_kaunit'], $db['acc_kabid'], $db['ket_kabid'], $db['acc_kabid_sdm'], $db['ket_sdm'], $db['status'], $db['id_jenis_izin']);
					$this->upload->do_upload('bukti_izin');
					$this->session->set_flashdata('alert', 'Berhasil Mengupload Data');
					redirect('pengajuan_izin');
				} else {
					$this->session->set_flashdata('alert', 'Gagal Mengupload Data, Gambar yang anda pilih sudah ada!');
					redirect('pengajuan_izin');
				}
			}
		} else if ($param == 'update') {
		} else if ($param == 'delete') {
			$this->M_Pengajuan_izin->delete($id);
			$result = array('status' => 'success', 'msg' => 'Data berhasil dihapus !');
			echo json_encode(array('result' => $result));
			die;
		}
	}
}
