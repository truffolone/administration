<?php 

class Users_model extends CI_Model {

    public function __construct() {

    }

    /* 
     * functions for single user setup and querying
     */
    public function loadById(int $id) {
        $res = $this->db->where("id", $id)->get("users");
        
        if($res->num_rows() > 0) {
            return $res->row();
        }

        return false;
    }
}