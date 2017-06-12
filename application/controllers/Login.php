<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        #basic library load
        $this->load->library("form_validation");
        $this->load->helper("form");

        #login data
        $loginData = array(
                'email'     => '',
                'password'  => ''
        );

        if($this->form_validation->run() === true) {

        } else {
            $this->twig->display('login');
        }
    }

}