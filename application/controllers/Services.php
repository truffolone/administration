<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Shows list of available Services
     */
    public function index() {
        $this->load->library("service");
    }
}