<?php 

class Administration {

    private $allowedGroups = array(1);
    private $allowedRouting = array("login" => "index");

    public function __construct() {
        $this->ci =& get_instance();

        //ACL
        if(!$this->ACL()) {
            die("no access allowed");
        }

        //twig
        $this->_twigFix();
    }

    /*
     * Is user allowed to access the website?
     */
    public function ACL() {
        #loading user lib
        $this->ci->load->library("user");
        
        #is user logged in?
        $this->_setupUser();

        #checking group
        if(!$this->_free()) {
            if($this->ci->user->id != null) {
                foreach($this->allowedGroups as $ag) {
                    if(in_array($ag, $this->ci->user->groups)) {
                        return true;
                    }
                }
            }
        } else {
            return true;
        }

        return false;
    }

    /*
     * Twig template utilities
     */
    private function _twigFix() {
        $this->ci->twig->addGlobal("base_url", base_url());
        $this->ci->twig->addGlobal("systemAlert", null);
        $this->ci->twig->addGlobal("systemWarning", null);
        $this->ci->twig->addGlobal("systemInfo", null);
        $this->ci->twig->addGlobal("systemSuccess", null);
    }

    /*
     * Loading user / session data. base Cookie handling until JWT is ready
     * it setup the user library
     */
    private function _setupUser() {
        #checking userdata TODO: jwt
        $data = $this->_getSessionData();

        if(array_key_exists("user_id", $data)) {
            #loading user data
            $this->ci->user->loadById($data['user_id']);
        }
    }

    /*
     * Getting user session data users/adduntil JWT library is ready
     */
    private function _getSessionData() : array {
        $return = array();

        if($this->ci->session->user_id) {
            $return['user_id'] = $this->ci->session->user_id;
        }

        return $return;
    }

    /*
     * free routing! (no access needed)
     */
    private function _free() {
        $r1 = $this->ci->uri->segment(1);
        $r2 = $this->ci->uri->segment(2) ? $this->ci->uri->segment(2) : "index";
        foreach($this->allowedRouting as $k => $v) {
            if($r1 == $k && $r2 == $v) {
                return true;
            }
        }

        return false;
    }
}