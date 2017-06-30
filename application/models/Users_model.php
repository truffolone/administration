<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
                           ->update("users", [
                                        'username'      => $username,
                                        'email'         => $email,
                                        'password'      => $password,
                                        'last_update'   => date('Y-m-d H:i:s'),
                                        'active'        => $active
                           ]);
        if($result === false) {
            return false;
        } else {
            return $id;
        }
    }

    /*
     * Update user groups
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

    /*
     * load all users with a custom function
     */
    public function getFullUsersList(int $page, int $perpage, string $orderby, string $order, array $limitations) {
        #limiting orderby
        $orderByLimit = array("u.id", "u.username");

        #base vars definition
        $orderby = in_array($order, $orderByLimit) ? $orderby : $orderByLimit[0];
        $order   = (strtoupper($order) == "ASC")   ? "ASC"    : "DESC";
        $page    = ($page < 1)                     ? 1        : $page;
        $limit   = ($perpage > 1)                  ? $perpage : 20;
        $offset  = ($page - 1) * $perpage;

        #query builder
        $query = "SELECT u.*,
                    (SELECT COUNT(*) FROM users_groups g WHERE user_id = u.id) as totGroups
                  FROM users u
                  ORDER BY " . $orderby . " " . $order . "
                  LIMIT " . $offset . ", " . $limit;

        #executing query
        $result = $this->db->query($query);

        return $result;
    }

    /*
     * Count users number based on limitations passed
     */
    public function countUsers(array $limitations) : int {
        $totusers = 0;

        #creating query
        $query = "SELECT COUNT(*) as total FROM users";

        #getting results back
        if($result = $this->db->query($query)) {
            $totusers = $result->row()->total;
        } else {
            log_message("error", "can't find user's count based on " . print_r($limitations, TRUE));
        }

        return $totusers;
    }

    /*
     * Saving the remember me data
     */
    public function rememberMe(string $sess_id, int $user_id, string $key) {
        $return = false;

        #do we have old session id saved for the user?
        $res = $this->db->select("id, session_id")
                        ->where("user_id", $user_id)
                        ->get("session_memory");

        if($res->num_rows() > 0) {
            #regenerate the session memory
            $oldId      = $res->row()->id;
            $oldSessId  = $res->row()->session_id;

            $this->db->where("id", $oldId)->update("session_memory", [
                                                        "session_id"  => $sess_id,
                                                        "rh_key"      => $key,
                                                        "last_update" => date('Y-m-d H:i:s')
                                                    ]);

            $return = $oldId;
        } else {
            #create a new memory
            $this->db->insert("session_memory", [
                    "session_id"    => $sess_id,
                    "user_id"       => $user_id,
                    "rh_key"        => $key,
                    "last_update"   => date('Y-m-d H:i:s')
            ]);

            $return = $this->db->insert_id();
        }

        return $return;
    }

    /*
     * Delete remember me data from db
     */
    public function cleanUpRememberMe(int $upUntil, bool $rememberMe = true, int $user_id = 0) {
        #delete older than
        $goback = time() - $upUntil;

        #delete old data
        $this->db->where("last_update <", $goback)
                 ->delete("session_memory");

        #delete self if not wanted
        if(!$rememberMe) {
            $this->db->where("user_id", $user_id)
                     ->delete("session_memory");
        }
    }

    /*
     * Reload userId if the cookie is valid. double check on expiration date (I don't trust cookies)
     */
    public function reloadUserId($sessId, $rh, $expire) {
        $result = $this->db->select("user_id")
                           ->where("id", $sessId)
                           ->where("rh_key", $rh)
                           ->where("last_update >", time()-$expire)
                           ->get("session_memory");
        
        if($result->num_rows() > 0) {
            return $result->row()->user_id;
        }

        return false;
    }

    /*
     * handles the force_logout for the user
     */
    public function forceLogout(int $id, bool $status) : void {
        $this->db->where("id", $id)->update("users", ['force_logout' => $status]);
    }

    /*
     * Deletes user rememberMe saved session
     */
    public function destroyMemory(int $user_id) {
        $this->db->where("user_id", $user_id)->delete("session_memory");
    }
}