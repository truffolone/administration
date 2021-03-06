<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Shows list of available Services
     */
    public function index()
    {
        #loading model (no need for library)
        $this->load->model("services_model");

        #loading data
        $services = $this->services_model->loadList();

        $this->twig->display("services/index", ['services' => $services->result(), 'sCount' => $services->num_rows()]);
    }

    /*
     * Edits Service
     */
    public function edit(int $id) {
        #loading assets
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->load->library("service");

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

        #loading the data from database
        if(!$this->service->loadFromId($id)) {
            #settng message
            $this->session->set_flashdata("systemWarning", "Service " . $id . " does not exists");

            #redirecting
            redirect("services", "refresh");

            #security exit
            exit;
        }

        $this->form_validation->set_rules("name", "Name", "required|alpha_numeric_spaces");
        $this->form_validation->set_rules("algoritmo", "Algoritmo", "required|callback_alg_check");
        $this->form_validation->set_rules("url", "URL", "required|valid_url");
        $this->form_validation->set_rules("descrizione", "Descrizione", "");

        #running the form
        if ($this->form_validation->run() === true) {
            #set values to the library
            $this->service->name        = $this->input->post("name");
            $this->service->alg         = $this->input->post("algoritmo");
            $this->service->url         = $this->input->post("url");
            $this->service->descrizione = $this->input->post("descrizione") ? trim($this->input->post("descrizione")) : "";

            #creating new keys
            $this->service->generatePKey();
            $this->service->generateSKey();

            #saving
            $this->service->save();

            #redirecting
            $this->session->set_flashdata("systemSuccess", "Service " . $this->service->name . " (URL: " . $this->service->url . ") created Successfully");
            redirect("services", "refresh");
        } else {
            #checking if there are any errors
            if (validation_errors() && validation_errors() != "") {
                $this->twig->addGlobal("systemWarning", validation_errors());
            }

            #applying values if there are any
            $return['formValues']['name']        = $this->input->post("name")        ? $this->input->post("name")        : $this->service->name;
            $return['formValues']['algoritmo']   = $this->input->post("algoritmo")   ? $this->input->post("algoritmo")   : $this->service->alg;
            $return['formValues']['url']         = $this->input->post("url")         ? $this->input->post("url")         : $this->service->url;
            $return['formValues']['descrizione'] = $this->input->post("descrizione") ? trim($this->input->post("descrizione")) : trim($this->service->descrizione);

            #display form
            $this->twig->display("services/edit", $return);
        }
    }

    /*
     * Deactivate a service
     */
    public function deactivate(int $id) {
        $this->load->library("service");

        if($this->service->loadFromId($id)) {
            #deactivate
            $this->service->deactivate();

            #setting message
            $this->session->set_flashdata("systemSuccess", "Service " . $id . " has been successfully deactivated");
        } else {
            #settng message
            $this->session->set_flashdata("systemWarning", "Service " . $id . " does not exists");
        }

        #redirecting
        redirect("services", "refresh");
    }

    /*
     * Activate a service
     */
    public function activate(int $id) {
        $this->load->library("service");

        if($this->service->loadFromId($id)) {
            #deactivate
            $this->service->activate();

            #setting message
            $this->session->set_flashdata("systemSuccess", "Service " . $id . " has been successfully activated");
        } else {
            #settng message
            $this->session->set_flashdata("systemWarning", "Service " . $id . " does not exists");
        }

        #redirecting
        redirect("services", "refresh");
    }

    /*
     * simple add for a service for basic data
     */
    public function add()
    {
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

        $this->form_validation->set_rules("name", "Name", "required|alpha_numeric_spaces");
        $this->form_validation->set_rules("algoritmo", "Algoritmo", "required|callback_alg_check");
        $this->form_validation->set_rules("url", "URL", "required|valid_url");
        $this->form_validation->set_rules("descrizione", "Descrizione", "");

        #running the form
        if ($this->form_validation->run() === true) {
            #set values to the library
            $this->service->name        = $this->input->post("name");
            $this->service->alg         = $this->input->post("algoritmo");
            $this->service->url         = $this->input->post("url");
            $this->service->descrizione = $this->input->post("descrizione") ? trim($this->input->post("descrizione")) : "";

            #creating new keys
            $this->service->generatePKey();
            $this->service->generateSKey();

            #saving
            $this->service->save();

            #redirecting
            $this->session->set_flashdata("systemSuccess", "Service " . $this->service->name . " (URL: " . $this->service->url . ") created Successfully");
            redirect("services", "refresh");
        } else {
            #checking if there are any errors
            if (validation_errors() && validation_errors() != "") {
                $this->twig->addGlobal("systemWarning", validation_errors());
            }

            #applying values if there are any
            $return['formValues']['name']        = $this->input->post("name")        ? $this->input->post("name")        : "";
            $return['formValues']['algoritmo']   = $this->input->post("algoritmo")   ? $this->input->post("algoritmo")   : "";
            $return['formValues']['url']         = $this->input->post("url")         ? $this->input->post("url")         : "";
            $return['formValues']['descrizione'] = $this->input->post("descrizione") ? trim($this->input->post("descrizione")) : "";

            #display form
            $this->twig->display("services/add", $return);
        }
    }

    /*
     * callback for the alg check
     */
    public function alg_check($str)
    {
        if (array_key_exists($str, $this->service->algs)) {
            return true;
        } else {
            $this->form_validation->set_message("alg_check", "the {field} field is not allowed with <b>" . $str . "</b> value");
            return false;
        }
    }
}
