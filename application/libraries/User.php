<?php 

Class User {

    private $id = null;
    private $username = null;
    private $email = null;
    private $password = null;
    private $salt = null;
    private $created = null;
    private $last_edit = null;
    private $active = null;

    private $ci;

    public function __construct() {
        $this->ci =& get_instance();

        //loading users model
        $this->ci->load->model("users_model");
        $this->ci->load->model("groups_model");
    }

    /* 
     * Load a user by ID
     */
    public function loadById(int $id, bool $safe = FALSE) : ?self {
        if($user = $this->ci->users_model->loadById($id)) {
            $this->_apply($user, $safe);
        } else {
            log_message("error", "called for user ID " . $id . " but nothing was found");
            return null;
        }

        return $this;
    }

    /*
     * applies $user properties to $this->_$property of User class
     * it overwrites if not in safe mode
     */
    private function _apply(obj $user, bool $safe = FALSE) : self {
        foreach($user as $key => $val) {
            if($safe && property_exists($this, $key) && $this->$key != null) continue;
            $this->$key = $val;
        }

        return $this;
    }

    /*
     * Save new user or edit it based on defined $id;
     */
     public function save() {
         
     }

    /*
     * Setters and getters
     */
     public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            log_message("error", "trying to set " . $property . " property out of User object which doesn't exist");
            return false;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            log_message("error", "trying to get " . $property . " property out of User object which doesn't exist");
            return null;
        }
    }
}