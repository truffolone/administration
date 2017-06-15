<?php

class Groups_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Load group data from id
     */
    public function loadFromId(int $id) {
        $res = $this->db->where("id", $id)->get("groups");

        if($res->num_rows() > 0) {
            return $res->row();
        }

        return false;
    }

    /*
     * Load user groups from a single user
     */
    public function loadFromUserId(int $id) : ?array {
        $res = $this->db->select("groups.id, groups.name")
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

    /*
     * Load users based on group id
     */
    public function loadUsers(int $id) {
        $res = $this->db->select("u.id, u.email, u.username, u.active")
                        ->from("users u")
                        ->join("users_groups ug", "(ug.user_id = u.id AND ug.group_id = " . $id . ")")
                        ->get();

        if($res) {
            return $res->result_array();
        } else {
            return false;
        }
    }

    /*
     * Load all user groups available
     */
    public function loadAll(): CI_DB_pdo_result {
        $res = $this->db->order_by("name")->get("groups");

        return $res;
    }

    /*
     * Load all users
     */
    public function loadAllUsers() {
        $res = $this->db->select("id, username, email, active")->get("users");

        return $res->result_array();
    }

    /*
     * load all groups with a custom function
     */
    public function getFullGroupsList(int $page, int $perpage, string $orderby, string $order, array $limitations) {
        #limiting orderby
        $orderByLimit = array("g.id", "g.name");

        #base vars definition
        $orderby = in_array($order, $orderByLimit) ? $orderby : $orderByLimit[0];
        $order   = (strtoupper($order) == "ASC")   ? "ASC"    : "DESC";
        $page    = ($page < 1)                     ? 1        : $page;
        $limit   = ($perpage > 1)                  ? $perpage : 20;
        $offset  = ($page - 1) * $perpage;

        #query builder
        $query = "SELECT g.*,
                    (SELECT COUNT(*) FROM users_groups u WHERE u.group_id = g.id) as totUsers
                  FROM groups g
                  ORDER BY " . $orderby . " " . $order . "
                  LIMIT " . $offset . ", " . $limit;

        #executing query
        $result = $this->db->query($query);

        return $result;
    }

    /*
     * Count groups number based on limitations passed
     */
    public function countGroups(array $limitations) : int {
        $totgroups = 0;

        #creating query
        $query = "SELECT COUNT(*) as total FROM groups";

        #getting results back
        if($result = $this->db->query($query)) {
            $totgroups = $result->row()->total;
        } else {
            log_message("error", "can't find group's count based on " . print_r($limitations, TRUE));
        }

        return $totgroups;
    }

    /*
     * Adds a group
     */
    public function addGroup(array $data) : bool {
        return $this->db->insert("groups", $data);
    }

    /*
     * don't ask, I'm lazy
     */
    public function ug(int $id) {
        $ret = array();

        $res = $this->db->select("user_id")->where("group_id", $id)->get("users_groups");

        if($res->num_rows() > 0) {
            foreach($res->result() as $r) {
                $ret[] = (int) $r->user_id;
            }
        }

        return $ret;
    }
}