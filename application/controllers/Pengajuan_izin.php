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
		$sso_user_data = $this->session->userdata('sso_user_data'); //session
		$page_data['sso_user_data'] = $sso_user_data;
		$page_data['getStaff'] = $this->M_Pengajuan_izin->getDataStaff($sso_user_data->username);
		$page_data['getPegawai'] = $this->M_Pengajuan_izin->getPegawaiByUsernameStaff($sso_user_data->username);
		$page_data['getMaxId'] = $this->M_Pengajuan_izin->getKodeIzin();
		$page_data['getJenisIzin'] = $this->M_Pengajuan_izin->getJenisIzin();
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function izin($param = '', $id = '')
	{
		$sso_user_data = $this->session->userdata('sso_user_data'); //session
		$view['title']    = 'Pengajuan Izin';
		$view['pageName'] = 'Pengajuan_izin';
		if ($param == 'getAllData') {
			$dt    = $this->M_Pengajuan_izin->getAllData($sso_user_data->username);
			$start = $this->input->post('start');
			$data  = array();
			foreach ($dt['data'] as $row) {
				$id   = $row->id_izin;
				$th1  = '<div style="font-size:11px;">' . ++$start . '</div>';
				$th2  = (get_btn_group1('ubah("' . $id . '")', 'hapus("' . $id . '")')) . (empty($row->bukti_izin) ? '' : btn_upload_gambar('uploadGbr("' . $id . '")'));
				$th3  = '<div style="font-size:11px;">' . $row->nama . '</div>';
				$th4  = '<div class="badge bg-cyan" style="font-size:9px;">' . $row->lama_izin . ' Hari</div>';
				$th5  = '<div style="font-size:11px;">' . tgl_indo($row->tgl_mulai) . '</div>';
				$th6  = '<div style="font-size:11px;">' . tgl_indo($row->tgl_akhir) . '</div>';
				$th7  = '<div style="font-size:11px;">' . $row->jadwal_off . '</div>';
				$th8  = $row->acc_kaunit == 0 ? '<label style="font-size:8px;" class="badge bg-yellow">Diajukan</label>' : '<div style="font-size:12px;">' . $row->acc_kaunit . '</div>';
				$th9  = '<div style="font-size:12px;">' . $row->ket_kaunit . '</div>';
				$th10 = $row->acc_kabid == 0 ? '<label style="font-size:8px;" class="badge bg-yellow"> Diajukan</label>' : '<div style="font-size:12px;">' . $row->acc_kabid . '</div>';
				$th11 = '<div style="font-size:12px;">' . $row->ket_kabid . '</div>';
				$th12 = $row->acc_kabid_sdm == 0 ? '<label style="font-size:8px;" class="badge bg-yellow"> Diajukan</label>' : '<div style="font-size:12px;">' . $row->acc_kabid_sdm . '</div>';
				$th13 = '<div style="font-size:12px;">' . $row->ket_sdm . '</div>';
				$th14 = empty($row->bukti_izin) ? (btn_upload_gambar('uploadGbr("' . $id . '")')) : '<img src="bukti_izin/' . $row->bukti_izin . '" width="100px" height="100px">';
				$th15 = '<div style="font-size:12px;">' . $row->jenis_izin . '</div>';
				$data[]     = gathered_data(array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12, $th13, $th14, $th15));
			}
			$dt['data'] = $data;
			echo json_encode($dt);
			die;
		} else if ($param == 'getById') {
			$data = $this->M_Pengajuan_izin->getByIdUpload($id);
			echo json_encode(array('data' => $data));
			die;
		} else if ($param == 'get_by_id') {
			$data = $this->M_Pengajuan_izin->getById($id);
			echo json_encode(array('data' => $data));
			die;
		} else if ($param == 'addData') {

			$this->form_validation->set_rules("id_pegawai", "Nama Pegawai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_mulai", "Tanggal Mulai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_akhir", "Tanggal Berakhir", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("jadwal_off", "Jadwal Off", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("id_jenis_izin", "Jenis Izin", "trim|required", array('required' => '{field} Wajib diisi !'));

			$this->form_validation->set_error_delimiters('<small id="text-error" style="color:red;">*', '</small>');
			if ($this->form_validation->run() == FALSE) {
				$result = array('status' => 'error', 'msg' => 'Data yang anda isi Belum Benar!');
				foreach ($_POST as $key => $value) {
					$result['messages'][$key] = form_error($key);
				}
			} else {
				$tgl1 = new DateTime($this->input->post('tgl_mulai'));
				$tgl2 = new DateTime($this->input->post('tgl_akhir'));
				$d = $tgl2->diff($tgl1)->days;
				$db['id_pegawai']    = htmlspecialchars($this->input->post('id_pegawai'));
				$db['lama_izin']     = $d;
				$db['tgl_mulai']     = htmlspecialchars($this->input->post('tgl_mulai'));
				$db['tgl_akhir']     = htmlspecialchars($this->input->post('tgl_akhir'));
				$db['jadwal_off']    = htmlspecialchars($this->input->post('jadwal_off'));
				$db['acc_kaunit']    = htmlspecialchars($this->input->post('acc_kaunit'));
				$db['ket_kaunit']    = htmlspecialchars($this->input->post('ket_kaunit'));
				$db['acc_kabid']     = htmlspecialchars($this->input->post('acc_kabid'));
				$db['ket_kabid']     = htmlspecialchars($this->input->post('ket_kabid'));
				$db['acc_kabid_sdm'] = htmlspecialchars($this->input->post('acc_kabid_sdm'));
				$db['ket_sdm']       = htmlspecialchars($this->input->post('ket_sdm'));
				$db['status']        = '1';
				$db['id_jenis_izin'] = htmlspecialchars($this->input->post('id_jenis_izin'));
				$result['messages']            = '';
				$sso_user_data = $this->session->userdata('sso_user_data'); //session
				$getDataStaff = $this->M_Pengajuan_izin->getDataStaff($sso_user_data->username);
				$getPegawai = $this->M_Pengajuan_izin->getPegawaiByUsernameStaff($sso_user_data->username);

				if ($sso_user_data->username == $getPegawai[0]->username) {
					$result                = array('status' => 'success', 'msg' => 'Data diterima, silahkan upload bukti izin !');
					$this->M_Pengajuan_izin->addData($db);
				} else {
					$result                = array('status' => 'error', 'msg' => 'Data gagal dikirimkan, pengguna tidak ditemukan');
				}
			}
			$csrf = array(
				'token' => $this->security->get_csrf_hash()
			);
			echo json_encode(array('result' => $result, 'csrf' => $csrf));
			die;
		} else if ($param == 'uploadData') {
			$sso_user_data = $this->session->userdata('sso_user_data'); //session
			$config['upload_path']   = "./bukti_izin";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|png|bmp';
			$config['remove_spaces'] = TRUE;

			if (!empty($_FILES['bukti_izin']['name'])) {
				$this->load->library('upload', $config);
				$db['bukti_izin']    = $_FILES['bukti_izin']['name'];
				$db['id_izin']    = htmlspecialchars($this->input->post('id_izin'));

				$cekData         = $this->M_Pengajuan_izin->getById($db['id_izin']);
				if ($cekData->bukti_izin != $db['bukti_izin']) {
					$this->M_Pengajuan_izin->updateGbr($db['id_izin'], str_replace(' ', '_', $db['bukti_izin']));
					$this->upload->do_upload('bukti_izin');
					$this->session->set_flashdata('success', 'Berhasil Mengupload Gambar');
					redirect('pengajuan_izin');
				} else {
					$this->session->set_flashdata('notif', 'Gagal Mengupload Data, Gambar yang anda pilih sudah ada!');
					redirect('pengajuan_izin');
				}
			}
		} else if ($param == 'update') {
			$this->form_validation->set_rules("id_pegawai", "Nama Pegawai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_mulai", "Tanggal Mulai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_akhir", "Tanggal Berakhir", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("jadwal_off", "Jadwal Off", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("id_jenis_izin", "Jenis Izin", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_error_delimiters('<small id="text-error" style="color:red;">*', '</small>');
			if ($this->form_validation->run() == FALSE) {
				$result = array('status' => 'error', 'msg' => 'Data yang anda isi belum benar !');
				foreach ($_POST as $key => $value) {
					$result['messages'][$key] = form_error($key);
				}
			} else {
				$tgl1 = new DateTime($this->input->post('tgl_mulai'));
				$tgl2 = new DateTime($this->input->post('tgl_akhir'));
				$d = $tgl2->diff($tgl1)->days;
				$db['id_izin']    = htmlspecialchars($this->input->post('id_izin'));
				$db['id_pegawai']    = htmlspecialchars($this->input->post('id_pegawai'));
				$db['lama_izin']     = $d;
				$db['tgl_mulai']     = htmlspecialchars($this->input->post('tgl_mulai'));
				$db['tgl_akhir']     = htmlspecialchars($this->input->post('tgl_akhir'));
				$db['jadwal_off']    = htmlspecialchars($this->input->post('jadwal_off'));
				$db['acc_kaunit']    = htmlspecialchars($this->input->post('acc_kaunit'));
				$db['ket_kaunit']    = htmlspecialchars($this->input->post('ket_kaunit'));
				$db['acc_kabid']     = htmlspecialchars($this->input->post('acc_kabid'));
				$db['ket_kabid']     = htmlspecialchars($this->input->post('ket_kabid'));
				$db['acc_kabid_sdm'] = htmlspecialchars($this->input->post('acc_kabid_sdm'));
				$db['ket_sdm']       = htmlspecialchars($this->input->post('ket_sdm'));
				$db['status']        = '1';
				$db['id_jenis_izin'] = htmlspecialchars($this->input->post('id_jenis_izin'));
				$result['messages']      = '';
				$result          = array('status' => 'success', 'msg' => 'Data Berhasil diubah');
				$this->M_Pengajuan_izin->update($db['id_izin'], $db);
			}
			$csrf = array(
				'token' => $this->security->get_csrf_hash()
			);
			echo json_encode(array('result' => $result, 'csrf' => $csrf));
			die;
		} else if ($param == 'delete') {
			$this->M_Pengajuan_izin->updateStatus($id);
			$result = array('status' => 'success', 'msg' => 'Data berhasil dihapus !');
			echo json_encode(array('result' => $result));
			die;
		}
	}

	// created by faiz on 2020-12-21 08:33:59
	// fungsi mengambil data dari model dan ditampilkan pada view tabel tanpa
	// session. data ditampilkan utk kaunit, kabid dan kabid_sdm
	public function izin1($param = '', $id = '')
	{
		// $sso_user_data = $this->session->userdata('sso_user_data'); //session
		$view['title']    = 'Pengajuan Izin';
		$view['pageName'] = 'Pengajuan_izin';
		if ($param == 'getAllData1') {
			$dt    = $this->M_Pengajuan_izin->getAllData1();
			$start = $this->input->post('start');
			$data  = array();
			foreach ($dt['data'] as $row) {
				$id   = $row->id_izin;
				$th1  = '<div style="font-size:11px;">' . ++$start . '</div>';
				$th2  = (get_btn_group1('ubah("' . $id . '")', 'hapus("' . $id . '")')) . (empty($row->bukti_izin) ? '' : btn_upload_gambar('uploadGbr("' . $id . '")'));
				$th3  = '<div style="font-size:11px;">' . $row->nama . '</div>';
				$th4  = '<div class="badge bg-cyan" style="font-size:9px;">' . $row->lama_izin . ' Hari</div>';
				$th5  = '<div style="font-size:11px;">' . tgl_indo($row->tgl_mulai) . '</div>';
				$th6  = '<div style="font-size:11px;">' . tgl_indo($row->tgl_akhir) . '</div>';
				$th7  = '<div style="font-size:11px;">' . $row->jadwal_off . '</div>';
				$th8  = $row->acc_kaunit == 0 ? '<label style="font-size:8px;" class="badge bg-yellow">Diajukan</label>' : '<div style="font-size:12px;">' . $row->acc_kaunit . '</div>';
				$th9  = '<div style="font-size:12px;">' . $row->ket_kaunit . '</div>';
				$th10 = $row->acc_kabid == 0 ? '<label style="font-size:8px;" class="badge bg-yellow"> Diajukan</label>' : '<div style="font-size:12px;">' . $row->acc_kabid . '</div>';
				$th11 = '<div style="font-size:12px;">' . $row->ket_kabid . '</div>';
				$th12 = $row->acc_kabid_sdm == 0 ? '<label style="font-size:8px;" class="badge bg-yellow"> Diajukan</label>' : '<div style="font-size:12px;">' . $row->acc_kabid_sdm . '</div>';
				$th13 = '<div style="font-size:12px;">' . $row->ket_sdm . '</div>';
				$th14 = empty($row->bukti_izin) ? (btn_upload_gambar('uploadGbr("' . $id . '")')) : '<img src="bukti_izin/' . $row->bukti_izin . '" width="100px" height="100px">';
				$th15 = '<div style="font-size:12px;">' . $row->jenis_izin . '</div>';
				$data[]     = gathered_data(array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12, $th13, $th14, $th15));
			}
			$dt['data'] = $data;
			echo json_encode($dt);
			die;
		} else if ($param == 'getById') {
			$data = $this->M_Pengajuan_izin->getByIdUpload($id);
			echo json_encode(array('data' => $data));
			die;
		} else if ($param == 'get_by_id') {
			$data = $this->M_Pengajuan_izin->getById($id);
			echo json_encode(array('data' => $data));
			die;
		} else if ($param == 'addData') {

			$this->form_validation->set_rules("id_pegawai", "Nama Pegawai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_mulai", "Tanggal Mulai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_akhir", "Tanggal Berakhir", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("jadwal_off", "Jadwal Off", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("id_jenis_izin", "Jenis Izin", "trim|required", array('required' => '{field} Wajib diisi !'));

			$this->form_validation->set_error_delimiters('<small id="text-error" style="color:red;">*', '</small>');
			if ($this->form_validation->run() == FALSE) {
				$result = array('status' => 'error', 'msg' => 'Data yang anda isi Belum Benar!');
				foreach ($_POST as $key => $value) {
					$result['messages'][$key] = form_error($key);
				}
			} else {
				$tgl1 = new DateTime($this->input->post('tgl_mulai'));
				$tgl2 = new DateTime($this->input->post('tgl_akhir'));
				$d = $tgl2->diff($tgl1)->days;
				$db['id_pegawai']    = htmlspecialchars($this->input->post('id_pegawai'));
				$db['lama_izin']     = $d;
				$db['tgl_mulai']     = htmlspecialchars($this->input->post('tgl_mulai'));
				$db['tgl_akhir']     = htmlspecialchars($this->input->post('tgl_akhir'));
				$db['jadwal_off']    = htmlspecialchars($this->input->post('jadwal_off'));
				$db['acc_kaunit']    = htmlspecialchars($this->input->post('acc_kaunit'));
				$db['ket_kaunit']    = htmlspecialchars($this->input->post('ket_kaunit'));
				$db['acc_kabid']     = htmlspecialchars($this->input->post('acc_kabid'));
				$db['ket_kabid']     = htmlspecialchars($this->input->post('ket_kabid'));
				$db['acc_kabid_sdm'] = htmlspecialchars($this->input->post('acc_kabid_sdm'));
				$db['ket_sdm']       = htmlspecialchars($this->input->post('ket_sdm'));
				$db['status']        = '1';
				$db['id_jenis_izin'] = htmlspecialchars($this->input->post('id_jenis_izin'));
				$result['messages']            = '';
				$sso_user_data = $this->session->userdata('sso_user_data'); //session
				$getDataStaff = $this->M_Pengajuan_izin->getDataStaff($sso_user_data->username);
				$getPegawai = $this->M_Pengajuan_izin->getPegawaiByUsernameStaff($sso_user_data->username);

				if ($sso_user_data->username == $getPegawai[0]->username) {
					$result                = array('status' => 'success', 'msg' => 'Data diterima, silahkan upload bukti izin !');
					$this->M_Pengajuan_izin->addData($db);
				} else {
					$result                = array('status' => 'error', 'msg' => 'Data gagal dikirimkan, pengguna tidak ditemukan');
				}
			}
			$csrf = array(
				'token' => $this->security->get_csrf_hash()
			);
			echo json_encode(array('result' => $result, 'csrf' => $csrf));
			die;
		} else if ($param == 'uploadData') {
			$sso_user_data = $this->session->userdata('sso_user_data'); //session
			$config['upload_path']   = "./bukti_izin";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|png|bmp';
			$config['remove_spaces'] = TRUE;

			if (!empty($_FILES['bukti_izin']['name'])) {
				$this->load->library('upload', $config);
				$db['bukti_izin']    = $_FILES['bukti_izin']['name'];
				$db['id_izin']    = htmlspecialchars($this->input->post('id_izin'));

				$cekData         = $this->M_Pengajuan_izin->getById($db['id_izin']);
				if ($cekData->bukti_izin != $db['bukti_izin']) {
					$this->M_Pengajuan_izin->updateGbr($db['id_izin'], str_replace(' ', '_', $db['bukti_izin']));
					$this->upload->do_upload('bukti_izin');
					$this->session->set_flashdata('success', 'Berhasil Mengupload Gambar');
					redirect('pengajuan_izin');
				} else {
					$this->session->set_flashdata('notif', 'Gagal Mengupload Data, Gambar yang anda pilih sudah ada!');
					redirect('pengajuan_izin');
				}
			}
		} else if ($param == 'update') {
			$this->form_validation->set_rules("id_pegawai", "Nama Pegawai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_mulai", "Tanggal Mulai", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("tgl_akhir", "Tanggal Berakhir", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("jadwal_off", "Jadwal Off", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_rules("id_jenis_izin", "Jenis Izin", "trim|required", array('required' => '{field} Wajib diisi !'));
			$this->form_validation->set_error_delimiters('<small id="text-error" style="color:red;">*', '</small>');
			if ($this->form_validation->run() == FALSE) {
				$result = array('status' => 'error', 'msg' => 'Data yang anda isi belum benar !');
				foreach ($_POST as $key => $value) {
					$result['messages'][$key] = form_error($key);
				}
			} else {
				$tgl1 = new DateTime($this->input->post('tgl_mulai'));
				$tgl2 = new DateTime($this->input->post('tgl_akhir'));
				$d = $tgl2->diff($tgl1)->days;
				$db['id_izin']    = htmlspecialchars($this->input->post('id_izin'));
				$db['id_pegawai']    = htmlspecialchars($this->input->post('id_pegawai'));
				$db['lama_izin']     = $d;
				$db['tgl_mulai']     = htmlspecialchars($this->input->post('tgl_mulai'));
				$db['tgl_akhir']     = htmlspecialchars($this->input->post('tgl_akhir'));
				$db['jadwal_off']    = htmlspecialchars($this->input->post('jadwal_off'));
				$db['acc_kaunit']    = htmlspecialchars($this->input->post('acc_kaunit'));
				$db['ket_kaunit']    = htmlspecialchars($this->input->post('ket_kaunit'));
				$db['acc_kabid']     = htmlspecialchars($this->input->post('acc_kabid'));
				$db['ket_kabid']     = htmlspecialchars($this->input->post('ket_kabid'));
				$db['acc_kabid_sdm'] = htmlspecialchars($this->input->post('acc_kabid_sdm'));
				$db['ket_sdm']       = htmlspecialchars($this->input->post('ket_sdm'));
				$db['status']        = '1';
				$db['id_jenis_izin'] = htmlspecialchars($this->input->post('id_jenis_izin'));
				$result['messages']      = '';
				$result          = array('status' => 'success', 'msg' => 'Data Berhasil diubah');
				$this->M_Pengajuan_izin->update($db['id_izin'], $db);
			}
			$csrf = array(
				'token' => $this->security->get_csrf_hash()
			);
			echo json_encode(array('result' => $result, 'csrf' => $csrf));
			die;
		} else if ($param == 'delete') {
			$this->M_Pengajuan_izin->updateStatus($id);
			$result = array('status' => 'success', 'msg' => 'Data berhasil dihapus !');
			echo json_encode(array('result' => $result));
			die;
		}
	}

}
