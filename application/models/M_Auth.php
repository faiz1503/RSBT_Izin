
<?php
class M_Auth extends CI_Model
{
    public function getData($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        return $this->db->get('staff')->row();
    }
}

?>