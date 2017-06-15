<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Group {

    public $id = null;
    public $name = null;

    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->model("groups_model");
    }

    /*
     * Loading Group data based on id
     * chit chat: I prefer load with multiple queries in order to make the function easily extendible
     */
    public function loadFromId(int $id) {
        #loading basic data from the groups table
        if($basicData = $this->ci->groups_model->loadFromId($id)) {
            #saving base data
            $this->id           = $id;
            $this->name         = $basicData->name;
            $this->created      = $basicData->created;
            $this->last_update  = $basicData->last_update;
        } else {
            return false;
        }

        #loading users assigned to this group

    }

    /*
     * Setters and getters
     */
     public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            log_message("error", "trying to set " . $property . " property out of Group object which doesn't exist");
            return false;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            log_message("error", "trying to get " . $property . " property out of Group object which doesn't exist");
            return null;
        }
    }
}