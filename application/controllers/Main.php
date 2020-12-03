<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Staff');
    }

    public function index(){
        $this->load->view('assets/_header');
        $sso_user_data = $this->session->userdata('sso_user_data');//session
        $page_data['sso_user_data']=$sso_user_data;
        $page_data['page_content']='Main';
		$this->load->view('Main',$page_data);
        $this->load->view('assets/_footer');
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
