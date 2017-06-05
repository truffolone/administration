<?php

class Groups_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function loadFromUserId(int $id) : ?array {
        $res = $this->db->select("*")
                        ->from("groups")
                        ->join("users_groups", "users_groups.group_id = groups.id")
                        ->where("users_groups.user_id", $id)
                        ->get();
        
        if($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            log_message("debug", "looking for groups from user ID " . $id . " but nothing was found");
            return null;
        }
}