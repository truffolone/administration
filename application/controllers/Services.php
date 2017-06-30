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
        #loading model (no need for library)
        $this->load->model("services_model");

        #loading data
        $services = $this->services_model->loadList();

        $this->twig->display("services/index", ['services' => $services->result(), 'sCount' => $services->num_rows()]);
    }

    /*
     * simple add for a service for basic data
     */
    public function add() {
        #loading assets
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->load->library("service");

        #base data array
        $return = array(
            'formValues' => array(
                'name'      => '',
                'algoritmo' => ''
            )
        );

        #running the form
        if($this->form_validation->run() === true) {

        } else {

        }
    }
}