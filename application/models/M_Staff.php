<?php

    class M_Staff extends CI_Model
    {

        function update_token($data, $token)
        {
            $this->db->where('token', $token);
            $this->db->update('staff', $data);
        }

    }
?>