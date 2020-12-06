<?php

function cek_data()
{
    //panggil library ci untuk helper
    $ci = get_instance();

    //cek session dan role
    if (!$ci->session->userdata('sso_user_data')) {
        redirect('main/cek_data_pegawai');
    } else {
        //load session
        $sso_user_data = $ci->session->userdata('sso_user_data');

        //query nama menu = segment uri 1
        $user = $ci->db->get_where('staff', ['username' => $sso_user_data->username])->row_array();

        //mengambil id menu
        $id_staff = $user['id_staff'];

        //ambil role dan id menu berdasarkan role pada session dan id menu
        $pegawai = $ci->db->get_where(
            'pegawai',
            [
                'id_staff' => $id_staff,
            ]
        );

        if ($pegawai->num_rows() < 1) {
            redirect('main/cek_data_pegawai');
        }
    }
}
