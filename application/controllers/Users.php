<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Show users list
     */
    public function index() {

    }

    /*
     * Add User
     */
     public function add() {
         $this->load->library("user");

         $this->load->helper("form");
         $this->twig->display("users/add");
     }

}