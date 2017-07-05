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
        $this->load->library("service"); #used just for possible algorythms

        #base data array
        $return = array(
            'formValues' => array(
                'name'        => '',
                'algoritmo'   => '',
                'url'         => '',
                'descrizione' => ''
            ),
            'algs'      => $this->service->algs
        );

        $this->form_validation->set_rules("name",        "Name",        "required|alpha_dash");
        $this->form_validation->set_rules("algoritmo",   "Algoritmo",   "required|callback_alg_check");
        $this->form_validation->set_rules("url",         "URL",         "required|alpha_dash");
        $this->form_validation->set_rules("descrizione", "Descrizione", "");

        #running the form
        if($this->form_validation->run() === true) {
            #set values to the library
            $this->service->name        = $this->input->post("name");
            $this->service->algoritmo   = $this->input->post("algoritmo");
            $this->service->url         = $this->input->post("url");
            $this->service->descrizione = $this->input->post("descrizione") ? $this->input->post("descrizione") : "";

            #creating new keys
            $this->service->generatePKey();
            $this->service->generateSKey();
        } else {
            #checking if there are any errors
            if(validation_errors() && valudation_errors() != "") {
                $this->twig->addGlobal("systemWarning", validation_errors());
            }

            #applying values if there are any
            $return['formValues']['name']        = $this->input->post("name")        ? $this->input->post("name")        : "";
            $return['formValues']['algoritmo']   = $this->input->post("algoritmo")   ? $this->input->post("algoritmo")   : "";
            $return['formValues']['url']         = $this->input->post("url")         ? $this->input->post("url")         : "";
            $return['formValues']['descrizione'] = $this->input->post("descrizione") ? $this->input->post("descrizione") : "";

            #display form
            $this->twig->display("services/add", $return);
        }
    }

    /*
     * callback for the alg check
     */
    public function alg_check($str) {
        if(array_key_exists($str, $this->service->algs)) {
            return true;
        } else {
            $this->form_validation->set_message("alg_check", "the {field} field is not allowed with <b>" . $str . "</b> value");
            return false;
        }
    }
}