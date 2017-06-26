<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        #checking if the user is logged in and redirecting to the home page
        if($this->user->isLoggedIn()) {
            redirect("/", "refresh");
            exit;
        }

        #basic library load
        $this->load->library("form_validation");
        $this->load->helper("form");

        #login data
        $loginData = array(
                'email'     => '',
                'password'  => '',
                'remember'  => false
        );

        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        if($this->form_validation->run() === true) {
            if($this->user->login($this->input->post("email"), $this->input->post("password"), $this->input->post("remember"))) {
                redirect("login", "refresh");
            } else {
                #handling validation errors
                $this->twig->addGlobal("systemWarning", "Email or Password not Valid");

                #rendering templates
                $this->twig->display('login');
            }
        } else {
            #handling validation errors
            if(validation_errors() != "") {
                $this->twig->addGlobal("systemWarning", validation_errors());
            }

            #rendering templates
            $this->twig->display('login');
        }
    }

}