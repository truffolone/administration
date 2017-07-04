<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Load List of all the services
     */
    public function loadList() {
        $res = $this->db->select("s.id, s.name, s.pkey, s.skey, s.alg, s.url, s.active, s.created, s.last_update, i.descrizione")
                        ->from("services s")
                        ->join("services_info i", "i.service_id = s.id", "left")
                        ->get();

        return $res;
    }
}