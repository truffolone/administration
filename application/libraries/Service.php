<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Service {

    #from services table
    private $id          = null;
    private $name        = null;
    private $pkey        = null;
    private $skye        = null;
    private $alg         = null;
    private $active      = false;
    private $created     = null;
    private $last_update = null;

    private $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    /*
     * Setters and getters
     */
     public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            log_message("error", "trying to get " . $property . " property out of Service object which doesn't exist");
            return false;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            log_message("error", "trying to set " . $property . " property out of Service object which doesn't exist");
            return null;
        }
    }
}