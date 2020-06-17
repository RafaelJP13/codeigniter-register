<?php  

class User extends CI_Model {

    function store($userData){
        
        $this->db->insert('users', $userData);
        return $this->db->insert_id();
    }

}
