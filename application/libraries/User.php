<?php 

Class User {

    public function __construct() {
        $this->ci =& get_instance();

        //loading users model
        $this->ci->load->model("users_model");
        $this->ci->load->model("groups_model");
    }

    /* 
     * Load a user by ID
     */
    public function loadById(int $id) : ?self {
        if($user = $this->ci->users_model->loadById($id)) {
            $this->_apply($user);
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
            $k = "_" . $key;
            if($safe && property_exists($this, $key)) continue;
            $this->$k = $val;
        }

        return $this;
    }
}