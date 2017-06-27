<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
    public function hashPassword($password) {
        $p = password_hash($password, PASSWORD_BCRYPT);

        return $p;
    }

    /*
     * Logging user in
     */
    public function login(string $email, string $password, bool $rememberMe = false) : bool {
        #loading data
        $genericUserInfo = $this->ci->db->select("id, password")->where("email", $email)->get("users");
        if($genericUserInfo->num_rows() > 0) {
            $user = $genericUserInfo->row();

            #checking password
            if(password_verify($password, $user->password)) {
                #memorise the user
                $this->_generateSession($user->id);
                
                #remember me
                $this->_rememberUser($rememberMe);

                #returning success
                return true;
            }
        }

        return false;
    }

    /*
     * Set User Groups if a user has been defined
     */
    public function setGroups() {
        if($this->id == null) {
            return false;
        }

        $rawGroups = $this->ci->groups_model->loadFromUserId($this->id);

        if(count($rawGroups) > 0) {
            foreach($rawGroups as $key => $value) {
                if(!array_key_exists($value['id'], $this->groups)) {
                    $this->groups[$value['id']] = $value;
                }
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
     * Shortcut for logged in user
     */
    public function isLoggedIn() : bool {
        return !! $this->id;
    }

    /*
     * User Logout
     */
    public function logout() {
        #removing id from userdata
        $this->ci->session->unset_userdata('id');
    }

    /*
     *
     */
    public function reviveUserSession() {
        #checking if we have the cookies
        if(array_key_exists("saved_session_id", $_COOKIE) && array_key_exists("rh", $_COOKIE)) {
            #checking if session is still valid
            $id = $this->ci->users_model->reloadUserId($_COOKIE['saved_session_id'], $_COOKIE['rh'], $this->ci->config->item('remember_me_expiration'));
            if($id) {
                #generating user session
                $this->_generateSession($id);

                #saving the remember me
                $this->_rememberUser(true);

                #returning user id
                return $id;
            }
        }

        return false;
    }

    /*
     * Remember the user saving the session id for rehydration
     */
    private function _rememberUser(bool $rememberMe) : void {
        #check if everything is alright
        if(!$this->ci->session->session_id) {
            log_message("error", "User " . $this->id . " misses session_id!");
            return;
        }

        if($rememberMe) {
            #random key!
            $rand = $this->_encRememberMe();

            #saving the remember_session in the database
            $cid = $this->ci->users_model->rememberMe($this->ci->session->session_id, $this->id, $rand);

            #saving cookie
            $expire = time()+$this->ci->config->item('remember_me_expiration');
            setcookie("saved_session_id", $cid, $expire);
            setcookie("rh", $rand, $expire);
        }
        
        #cleaningUp Data
        $oldest = $this->ci->config->item("remember_me_expiration");
        $this->ci->users_model->cleanUpRememberMe($rememberMe, $oldest);
    }

    /*
     * Generate session for the user based on user id
     */
    private function _generateSession($id) {
        #setting up the user
        $this->loadById($id);

        #saving session
        $userdata = array(
                'id'    => $this->id
        );

        $this->ci->session->set_userdata($userdata);
    }

    /*
     * user remember me Encrypt Key
     */
    private function _encRememberMe() : string {
        $this->ci->load->library("encryption");
        $this->ci->encryption->initialize([
                'cipher' => $this->ci->config->item('remember_me_cipher'),
                'mode' => $this->ci->config->item('remember_me_mode')
        ]);

        return $this->ci->encryption->encrypt($this->id . mt_rand());
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
     * applies $user properties to $this->$property of User class
     * it overwrites if not in safe mode
     */
    private function _apply(stdClass $user, bool $safe = FALSE) : self {
        foreach($user as $key => $val) {
            if($safe && property_exists($this, $key) && $this->$key != null) continue;
            $this->$key = $val;
        }

        return $this;
    }
}