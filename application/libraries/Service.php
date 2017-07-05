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
     * Saves service based on data
     */
    public function save()
    {
        #loading model
        $this->ci->load->model("services_model");

        if ($this->id === null) {
            #some date
            $this->created     = time();
            $this->last_update = time();

            #insert
            if ($this->id = $this->ci->services_model->newBase($this->name, $this->pkey, $this->skey,
                                                              $this->alg, $this->url, $this->created,
                                                              $this->last_update)) {
                $this->ci->services_model->addInfos($this->id, $this->descrizione);
            }
        } else {
            #update
        }
    }

    /*
     * Generates a Public Key and save it to the pkey var
     */
    public function generatePKey() : void
    {
        $this->pkey = openssl_random_pseudo_bytes(128);
    }

    /*
     * Generates a Secret Key and save it to the skey var
     */
    public function generateSKey() : void
    {
        $this->skey = openssl_random_pseudo_bytes(128);
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
