<?php

class Login_model extends CI_ModeL {
    
    function can_login($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $quary = $this->db->get('admin');
        if($quary->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>

