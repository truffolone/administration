<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service
{

    #from services table
    private $id          = null;
    private $name        = null;
    private $pkey        = null;
    private $skey        = null;
    private $alg         = null;
    private $url         = null;
    private $active      = false;
    private $created     = null;
    private $last_update = null;
    private $descrizione = null;

    private $ci;

    private $algs        = array(
            'HS256' => ['code' => 'HS256', 'type' => 'hash_hmac', 'name' => 'SHA256'],
            'HS384' => ['code' => 'HS384', 'type' => 'hash_hmac', 'name' => 'SHA384'],
            'HS512' => ['code' => 'HS512', 'type' => 'hash_hmac', 'name' => 'SHA512'],
            'RS256' => ['code' => 'RS256', 'type' => 'openssl',   'name' => 'SHA256'],
            'RS384' => ['code' => 'RS384', 'type' => 'openssl',   'name' => 'SHA384'],
            'RS512' => ['code' => 'RS512', 'type' => 'openssl',   'name' => 'SHA512']
    );

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    /*
     * Setup data to library service based on service id
     */
    public function loadFromId(int $id) : bool {
        #loading model
        $this->ci->load->model("services_model");

        #trying to load a service based on id
        if($ret = $this->ci->services_model->loadFromId($id)) {
            #applying data to the object
            $this->_apply($ret);

            return true;
        } else {
            #saving the error
            log_message("error", "Can't find service ID " . $id);
            return false;
        }
    }

    /*
     * Deactivate the service
     */
    public function deactivate() : void {
        $this->ci->services_model->setActive($this->id, false);
    }

    /*
     * Activate the service
     */
    public function activate() : void {
        $this->ci->services_model->setActive($this->id, true);
    }

    /*
     * Saves service based on data
     */
    public function save() : bool
    {
        #loading model
        $this->ci->load->model("services_model");

        if ($this->id === null) {
            #some date
            $this->created     = date('Y-m-d H:i:s');
            $this->last_update = date('Y-m-d H:i:s');

            #insert
            if ($this->id = $this->ci->services_model->newBase($this->name, $this->pkey, $this->skey,
                                                              $this->alg, $this->url, $this->active, $this->created,
                                                              $this->last_update)) {
            } else {
                log_message("error", "Can't insert new service into base: " . $this->ci->db->last_query());
                return false;
            }
        } else {
            #update
            $this->ci->services_model->updateBase($this->id, $this->name, $this->pkey,
                                                  $this->skey, $this->alg, $this->url,
                                                  $this->active, $this->last_update);
        }
        #updating infos (id is already set before)
        $this->ci->services_model->setInfos($this->id, $this->descrizione);

        return true;
    }

    /*
     * Generates a Public Key and save it to the pkey var
     */
    public function generatePKey() : void
    {
        $this->ci->load->library("encryption");
        $this->pkey = bin2hex($this->ci->encryption->create_key(64));
    }

    /*
     * Generates a Secret Key and save it to the skey var
     */
    public function generateSKey() : void
    {
        $this->ci->load->library("encryption");
        $this->skey = bin2hex($this->ci->encryption->create_key(64));
    }

    /*
     * Apply data to service object
     */
    private function _apply(stdClass $o) : void {
        foreach($o as $a => $b) {
            $this->$a = $b;
        }
    }

    /*
     * Setters and getters
     */
     public function __get($property)
     {
         if (property_exists($this, $property)) {
             return $this->$property;
         } else {
             log_message("error", "trying to get " . $property . " property out of Service object which doesn't exist");
             return false;
         }
     }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            log_message("error", "trying to set " . $property . " property out of Service object which doesn't exist");
            return null;
        }
    }
}
