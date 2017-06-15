<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Show groups list
     */
    public function index() {
        #loading base  model
        $this->load->model("groups_model");

        #page settings
        $page    = $this->input->get("page")    ? $this->input->get("page")     : 1;
        $perpage = $this->input->get("perpage") ? $this->input->get("perpage")  : 20;
        $orderby = $this->input->get("orderby") ? $this->input->get("orderby")  : "id";
        $order   = $this->input->get("order")   ? $this->input->get("order")    : "DESC";

        #limitations (group(s), active, etc...)
        $limitations = array();

        #getting user list with custom function
        $glist = $this->groups_model->getFullGroupsList($page, $perpage, $orderby, $order, $limitations);
        $groupsCount = $this->groups_model->countGroups($limitations);

        #setting up display data
        $response = array(
                'groups'         => $glist->num_rows() > 0 ? $glist->result() : null,
                'groupsCount'    => $groupsCount,
                'page'           => $page,
                'perpage'        => $perpage,
                'orderby'        => $orderby,
                'order'          => $order
        );

        #rendering page
        $this->twig->display("groups/index", $response);
    }

    /*
     * Add User
     */
     public function add() {
         #loading libraries
         $this->load->model("groups_model");
         $this->load->library("form_validation");
         $this->load->helper("form");

         #base form values
         $formValues = array(
            'name'       => ''
         );

         #setting up form_validation rules
         $this->form_validation->set_rules("name", "Name", "required");

         #running the form
         if($this->form_validation->run() === TRUE) {
            #saving user data
            $insert['name']   = $this->input->post("name");

            #saving the user
            if(!$this->groups_model->addGroup($insert)) {
                $this->twig->addGlobal("systemError", "something went wrong... Administrators has been contacted...");
                log_message("error", "couldn't add a group... " . $this->db->last_query());
                redirect("groups/add", "refresh");
            } else {
                redirect("groups/edit/" . $this->db->insert_id());
            }
         } else {
            #redefine formValues based on user data (if sent)
            $formValues['name'] = $this->input->post("name") ? $this->input->post("name") : "";

            #handling validation errors
            if(validation_errors() != "") {
                $this->twig->addGlobal("systemError", validation_errors());
            }

            $response = array(
                'formValues'        => $formValues
            );

            $this->twig->display("groups/add", $response);
         }
     }

     /*
      * Edit Group
      */
    public function edit(int $id) {
        #loading libraries
        $this->load->library("group"); #editing a group needs some standardized help
        $this->load->model("groups_model");
        $this->load->library("form_validation");
        $this->load->helper("form");
    }
}