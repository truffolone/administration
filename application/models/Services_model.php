<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Load List of all the services
     */
    public function loadList()
    {
        $res = $this->db->select("s.id, s.name, s.pkey, s.skey, s.alg, s.url, s.active, s.created, s.last_update, i.descrizione")
                        ->from("services s")
                        ->join("services_info i", "i.service_id = s.id", "left")
                        ->get();

        return $res;
    }

    /*
     * Handles active/deactive service value
     */
    public function setActive(int $id, bool $value) : void {
        $this->db->where("id", $id)->update("services", ["active" => $value]);
    }

    /*
     * Load all service data from ID
     * @params int $id
     * returns data row object or false on fail
     */
    public function loadFromId(int $id) : ?stdClass {
        $res = $this->db->select("s.*, i. descrizione")
                        ->from("services s")
                        ->join("services_info i", "i.service_id = s.id", "left")
                        ->where("s.id", $id)
                        ->get();

        if($res->num_rows() === 1) {
            return $res->row();
        } else {
            return null;
        }
    }

    /*
     * Saving or updating infos
     */
    public function setInfos(int $id, String $descrizione)
    {
        #checking the existence of some data
        $check = $this->db->where("service_id", $id)->get("services_info");

        #inserting or updating based on result count
        if ($check->num_rows() > 0) {
            $this->db->where("service_id", $id)->update("services_info", ['descrizione' => $descrizione]);
        } else {
            $this->db->insert("services_info", ['service_id' => $id, 'descrizione' => $descrizione]);
        }
    }

    /*
     * Saving base service data
     */
    public function newBase(String $name, String $pkey, String $skey, String $alg, String $url, bool $active, String $created, String $last_update) : ?int
    {
        #creating the array to insert
        $dataToInsert = array(
            'name'        => $name,
            'pkey'        => $pkey,
            'skey'        => $skey,
            'alg'         => $alg,
            'url'         => $url,
            'active'      => $active,
            'created'     => $created,
            'last_update' => $last_update
        );

        #inserting the data
        $this->db->insert("services", $dataToInsert);

        #returning the inserted id
        return $this->db->insert_id();
    }

    /*
     * Update base service data
     */
    public function updateBase(int $id, String $name, String $pkey, String $skey, String $alg, String $url, bool $active, int $last_update) : ?int
    {
        #creating the array to insert
        $dataToUpdate = array(
            'name'        => $name,
            'pkey'        => $pkey,
            'skey'        => $skey,
            'alg'         => $alg,
            'url'         => $url,
            'active'      => $active,
            'last_update' => $last_update
        );

        #inserting the data
        $this->db->where("id", $id)->update("services", $dataToUpdate);

        #returning the inserted id
        return $id;
    }
}
