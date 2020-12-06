<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Staff');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data'); //session
        $page_data['sso_user_data'] = $sso_user_data;
        $page_data['page_content'] = 'Main';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    public function cek_data_pegawai()
    {
        $sso_user_data = $this->session->userdata('sso_user_data'); //session
        $page_data['staff'] = $this->db->get_where('staff', ['username' => $sso_user_data->username])->row_array();
        $pegawai = $this->db->get_where('pegawai', ['id_staff' => $page_data['staff']['id_staff']])->row_array();
        if ($pegawai != null) {
            redirect('jadwal_dinas');
        } else {
            $this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama tidak boleh kosong.'));
            $this->form_validation->set_rules('tpt_lahir', 'tpt_lahir', 'required', array('required' => 'Tempat Lahir tidak boleh kosong.'));
            $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required', array('required' => 'Tanggal Lahir tidak boleh kosong.'));
            $this->form_validation->set_rules('telpon', 'telpon', 'required', array('required' => 'Telpon tidak boleh kosong.'));
            $this->form_validation->set_rules('email', 'email', 'required', array('required' => 'Email tidak boleh kosong.'));
            $this->form_validation->set_rules('alamat_ktp', 'alamat_ktp', 'required', array('required' => 'Alamat KTP tidak boleh kosong.'));
            $this->form_validation->set_rules('alamat_dom', 'alamat_dom', 'required', array('required' => 'Alamat Domisili tidak boleh kosong.'));
            $this->form_validation->set_rules('status', 'status', 'required', array('required' => 'Status tidak boleh kosong.'));
            $this->form_validation->set_rules('no_rek_bni', 'no_rek_bni', 'required', array('required' => 'No Rekening tidak boleh kosong.'));
            $this->form_validation->set_rules('gol_dar', 'gol_dar', 'required', array('required' => 'Golongan Darah tidak boleh kosong.'));
            $this->form_validation->set_rules('agama', 'agama', 'required', array('required' => 'Agama tidak boleh kosong.'));
            $this->form_validation->set_rules('no_ktp', 'no_ktp', 'required', array('required' => 'No KTP tidak boleh kosong.'));
            $this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'required', array('required' => 'Nama Ibu tidak boleh kosong.'));
            $this->form_validation->set_rules('data_ortu', 'data_ortu', 'required', array('required' => 'Data Orang TUa tidak boleh kosong.'));
            $this->form_validation->set_rules('data_kel_inti', 'data_kel_inti', 'required', array('required' => 'Data Keluarga Inti tidak boleh kosong.'));
            $this->form_validation->set_rules('riwayat_pend', 'riwayat_pend', 'required', array('required' => 'Riwayat Pendidikan tidak boleh kosong.'));
            $this->form_validation->set_rules('pelatihan', 'pelatihan', 'required', array('required' => 'Pelatihan tidak boleh kosong.'));
            $this->form_validation->set_rules('no_str', 'no_str', 'required', array('required' => 'No STR tidak boleh kosong.'));
            $this->form_validation->set_rules('masa_str', 'masa_str', 'required', array('required' => 'Masa Berlaku STR tidak boleh kosong.'));
            $this->form_validation->set_rules('no_sip', 'no_sip', 'required', array('required' => 'No SIP tidak boleh kosong.'));
            $this->form_validation->set_rules('masa_sip', 'masa_sip', 'required', array('required' => 'Masa Berlaku SIP tidak boleh kosong.'));
            $this->form_validation->set_rules('riwayat_pek', 'riwayat_pek', 'required', array('required' => 'Riwayat Pekerjaan tidak boleh kosong.'));

            if ($this->form_validation->run() == false) {
                $this->load->view('assets/_header');
                $page_data['page_content'] = 'Cek_data_pegawai';
                $this->load->view('Main', $page_data);
                $this->load->view('assets/_footer');
            } else {
                $data = [
                    'id_pegawai' => $this->input->post('id_pegawai'),
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
                    'riwayat_pek' => $this->input->post('riwayat_pek'),
                    'id_staff' => $this->input->post('id_staff'),
                ];
                $this->db->insert('pegawai', $data);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>Success!</h5>
                Data anda telah berhasil disimpan!
              </div>'
                );
                redirect('Jadwal_dinas');
            }
        }
    }

    public function logout()
    {
        $id_token = $this->session->userdata('token');
        $data = [
            'token' => '',
        ];
        $this->M_Staff->update_token($data, $id_token);

        $this->session->sess_destroy();
        redirect($this->session->userdata['base_sso']);
    }
}
