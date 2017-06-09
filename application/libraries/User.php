<?php 

Class User {

    private $id = null;
    private $username = null;
    private $email = null;
    private $password = null;
    private $created = null;
    private $last_edit = null;
    private $active = true;
    private $groups = array();

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
            $this->setGroups();
        } else {
            log_message("error", "called for user ID " . $id . " but nothing was found");
            return null;
        }

        return $this;
    }

    /*
     * Save new user or edit it based on predefined $this->id;
     */
    public function save() {
        #saving into the user table
        if($this->id == null) {
            $this->id = $this->ci->users_model->register_user($this->username, $this->email, $this->password, $this->active);
            if(!$this->id) {
                log_message("error", "Trying to register user but something went wrong:\n " . $this->ci->db->last_query());
                return false;
            }
        } else {
            if(!$this->ci->users_model->update_user($this->id, $this->username, $this->email, $this->password, $this->active)) {
                log_message("error", "Trying to update user (ID: " . $this->id . ") but something went wrong:\n " . $this->ci->db->last_query());
                return false;
            }
        }

        #no errors mean we can go on, saving groups
        $this->updateGroups();
    }

    /*
     * Saving user Groups
     */
    public function updateGroups() {
        if($this->id == null) {
            log_message("error", "Trying to update groups for a missing user");
            return false;
        } else {
            $this->ci->users_model->updateGroups($this->id, $this->groups);
        }
    }

    /*
     * hash user password and setup salt and hashed password
     */
    public function hashPassword(string $password) {
        $p = password_hash($password, PASSWORD_BCRYPT);

        return $p;
    }

    /*
     * Set User Groups if a user has been defined
     */
    public function setGroups() : ?obj {
        if($this->id == null) {
            return false;
        }

        $rawGroups = $this->ci->groups_model->loadFromUserId($this->id);

        if(count($rawGroups) > 0) {
            foreach($rawGroups as $key => $value) {
                $this->$groups[] = $value;
            }
        }

        return $this;
    }

    /*
     * Checks user password strength
     */
    public function passwordStrengthCheck(String $str) : bool {
        if (!preg_match("#[0-9]+#", $str)) {
            return false;
        }

        if (!preg_match("#[a-zA-Z]+#", $str)) {
            return false;
        } 

        return true;
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
            if($property == "password") {
                $this->$property = $this->hashPassword($value);
            } else {
                $this->$property = $value;
            }
        } else {
            log_message("error", "trying to get " . $property . " property out of User object which doesn't exist");
            return null;
        }
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
}