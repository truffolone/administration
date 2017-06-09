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

    /*
     * User Registration, returns user id on success, false on fail
     */
    public function register_user(string $username, string $email, string $password, bool $active) {
        $result = $this->db->insert('users', array(
                                        'username'      => $username,
                                        'email'         => $email,
                                        'password'      => $password,
                                        'created'       => date('Y-m-d H:i:s'),
                                        'last_update'   => date('Y-m-d H:i:s'),
                                        'active'        => $active
                                    ));
        if($result === false) {
            return false;
        } else {
            return $this->db->insert_id();
        }
    }

    /*
     * User Edit, returns user id on success, false on fail, based on id passed
     */
    public function update_user(int $id, string $username, string $email, string $password, bool $active) {
        $result = $this->db->where("id", $id)
                           ->update("users", array(
                                        'username'      => $username,
                                        'email'         => $email,
                                        'password'      => $password,
                                        'last_update'   => date('Y-m-d H:i:s'),
                                        'active'        => $active
                                    ));
        if($result === false) {
            return false;
        } else {
            return $id;
        }
    }

    /*
     *
     */
    public function updateGroups(int $user_id, array $groups) : bool {
        #removing user groups
        $this->db->where("user_id", $user_id)->delete("users_groups");

        #now lets save the groups (if any)
        if(count($groups) > 0) {
            $batch = array();
            foreach($groups as $k => $v) {
                $batch[] = array(
                    'user_id'  => $user_id,
                    'group_id' => $v
                );
            }

            $this->db->insert_batch("users_groups", $batch);
        }

        return true;
    }
}