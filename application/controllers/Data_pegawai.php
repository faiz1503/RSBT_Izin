<?php defined('BASEPATH') or exit('No direct script access allowed');

class Data_pegawai extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Data_pegawai');

		//cek kelengkapan data pegawai
		cek_data();
	}

	public function index()
	{
		//baca session
		$sso_user_data = $this->session->userdata('sso_user_data'); //session

		$page_data['staff'] = $this->db->get_where('staff', ['username' => $sso_user_data->username])->row_array();
		$page_data['pegawai'] = $this->db->get_where('pegawai', ['id_staff' => $page_data['staff']['id_staff']])->row_array();

		$this->load->view('assets/_header');
		$page_data['page_content'] = 'Data_pegawai';
		$this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
	}

	public function edit_pegawai_ajax($id_pegawai)
	{
		//get id
		$data = $this->M_Data_pegawai->get_by_id($id_pegawai);
		$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir; // if 0000-00-00 set tu empty for datepicker compatibility
		$data->masa_str = ($data->masa_str == '0000-00-00') ? '' : $data->masa_str; // if 0000-00-00 set tu empty for datepicker compatibility
		$data->masa_sip = ($data->masa_sip == '0000-00-00') ? '' : $data->masa_sip; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function data_pegawai_ajax()
	{
		//baca session
		$sso_user_data = $this->session->userdata('sso_user_data'); //session
		$page_data['staff'] = $this->db->get_where('staff', ['username' => $sso_user_data->username])->row_array();
		$page_data['pegawai'] = $this->db->get_where('pegawai', ['id_staff' => $page_data['staff']['id_staff']])->row_array();

		//get id
		$data = $this->M_Data_pegawai->get_by_id($page_data['pegawai']['id_pegawai']);
		$data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir; // if 0000-00-00 set tu empty for datepicker compatibility
		$data->masa_str = ($data->masa_str == '0000-00-00') ? '' : $data->masa_str; // if 0000-00-00 set tu empty for datepicker compatibility
		$data->masa_sip = ($data->masa_sip == '0000-00-00') ? '' : $data->masa_sip; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function update_pegawai_ajax()
	{
		//validasi 
		$this->_validate_update_pegawai();

		$data = [
			'nama' => $this->input->post('nama'),
			'tpt_lahir' => $this->input->post('tpt_lahir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'telpon' => $this->input->post('telpon'),
			'email' => $this->input->post('email'),
			'alamat_ktp' => $this->input->post('alamat_ktp'),
			'alamat_dom' => $this->input->post('alamat_dom'),
			'status' => $this->input->post('status'),
			'no_rek_bni' => $this->input->post('no_rek_bni'),
			'gol_dar' => $this->input->post('gol_dar'),
			'agama' => $this->input->post('agama'),
			'no_ktp' => $this->input->post('no_ktp'),
			'nama_ibu' => $this->input->post('nama_ibu'),
			'data_ortu' => $this->input->post('data_ortu'),
			'data_kel_inti' => $this->input->post('data_kel_inti'),
			'riwayat_pend' => $this->input->post('riwayat_pend'),
			'pelatihan' => $this->input->post('pelatihan'),
			'no_str' => $this->input->post('no_str'),
			'no_sip' => $this->input->post('no_sip'),
			'masa_str' => $this->input->post('masa_str'),
			'masa_sip' => $this->input->post('masa_sip'),
			'riwayat_pek' => $this->input->post('riwayat_pek')
		];

		$this->M_Data_pegawai->update_pegawai($data, [
			'id_pegawai' => $this->input->post('id_pegawai'),
		]);

		echo json_encode(array("status" => TRUE));
	}

	private function _validate_update_pegawai()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('tpt_lahir') == '') {
			$data['inputerror'][] = 'tpt_lahir';
			$data['error_string'][] = 'Tempat Lahir wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('tgl_lahir') == '') {
			$data['inputerror'][] = 'tgl_lahir';
			$data['error_string'][] = 'Tgl Lahir wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('telpon') == '') {
			$data['inputerror'][] = 'telpon';
			$data['error_string'][] = 'Telpon wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('email') == '') {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('alamat_ktp') == '') {
			$data['inputerror'][] = 'alamat_ktp';
			$data['error_string'][] = 'Alamat KTP wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('alamat_dom') == '') {
			$data['inputerror'][] = 'alamat_dom';
			$data['error_string'][] = 'Alamat Domisili wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('status') == '') {
			$data['inputerror'][] = 'status';
			$data['error_string'][] = 'Status wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('no_rek_bni') == '') {
			$data['inputerror'][] = 'no_rek_bni';
			$data['error_string'][] = 'No Rekening wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('gol_dar') == '') {
			$data['inputerror'][] = 'gol_dar';
			$data['error_string'][] = 'Golongan Darah wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('agama') == '') {
			$data['inputerror'][] = 'agama';
			$data['error_string'][] = 'Agama wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('no_ktp') == '') {
			$data['inputerror'][] = 'no_ktp';
			$data['error_string'][] = 'No KTP wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('nama_ibu') == '') {
			$data['inputerror'][] = 'nama_ibu';
			$data['error_string'][] = 'Nama Ibu wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('data_ortu') == '') {
			$data['inputerror'][] = 'data_ortu';
			$data['error_string'][] = 'Data Orang Tua wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('data_kel_inti') == '') {
			$data['inputerror'][] = 'data_kel_inti';
			$data['error_string'][] = 'Data Keluarga Inti wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('riwayat_pend') == '') {
			$data['inputerror'][] = 'riwayat_pend';
			$data['error_string'][] = 'Riwayat Pendidikan wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('pelatihan') == '') {
			$data['inputerror'][] = 'pelatihan';
			$data['error_string'][] = 'Pelatihan wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('no_str') == '') {
			$data['inputerror'][] = 'no_str';
			$data['error_string'][] = 'No STR wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('masa_str') == '') {
			$data['inputerror'][] = 'masa_str';
			$data['error_string'][] = 'Masa Berlaku STR wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('no_sip') == '') {
			$data['inputerror'][] = 'no_sip';
			$data['error_string'][] = 'No SIP wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('masa_sip') == '') {
			$data['inputerror'][] = 'masa_sip';
			$data['error_string'][] = 'Masa SIP wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('riwayat_pek') == '') {
			$data['inputerror'][] = 'riwayat_pek';
			$data['error_string'][] = 'Riwayat Pekerjaan wajib diisi!';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}
}
