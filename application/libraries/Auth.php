<?php 
    class Auth{
        public function __construct(){
            date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_ALL,'id_ID');
            $CI = get_instance();
            $CI->load->model('M_Auth');
            $this->base_sso=$CI->session->userdata['base_sso'];

            $sso_user_data = $CI->session->userdata('sso_user_data');
            $username = $sso_user_data->username;
            $data_sibatik = $CI->M_Auth->getData($username);

            $data = [
                'data_auth' => $data_sibatik
            ];

            $data_auth = $CI->session->set_userdata($data);
            $auth = $CI->session->userdata($data_auth);

            if($auth != FALSE){
                $auth;
            }else{
                redirect($this->base_sso,"refresh"); 
            }
            
        }
    }
