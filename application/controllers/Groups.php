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
            $this->load->library("group");
            $this->group->name = $this->input->post("name");

            #saving the user
            if(!$this->group->save()) {
                $this->twig->addGlobal("systemError", "something went wrong... Administrators has been contacted...");
                log_message("error", "couldn't add a group... " . $this->db->last_query());
                redirect("groups/add", "refresh");
            } else {
                $this->session->set_flashdata("systemSuccess", "Group <b>" . $this->group->name . "</b> added successfully, you can now setup everything else");
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
        $this->load->library("group"); #editing a group needs some standardised help
        $this->load->model("groups_model");
        $this->load->library("form_validation");
        $this->load->helper("form");

        #defining default values from database
        $response = array();

        #loading Group
        $group = $this->_loadGroup($id);

        #loading all Users
        $users = $this->groups_model->loadAllUsers();

        $response['group'] = $group;
        $response['users'] = $users;
        $response['ug']    = $this->groups_model->ug($id);

        if($this->group->id != null) {
            $this->form_validation->set_rules("name", "Name", "required");

            if($this->form_validation->run() === true) {
                #setting up new data
                $this->group->name = $this->input->post("name");

                #saving the group
                $this->group->save();

                #reinitializing the group values
                $response['group'] = $this->_loadGroup($id);

                $this->twig->addGlobal("systemSuccess", "Group <b>" . $this->group->name . "</b> edited successfully");
            } else {
                #handling validation errors
                if(validation_errors() != "") {
                    $this->twig->addGlobal("systemError", validation_errors());
                }

                #setting new values
                if($this->input->post("name") && $this->input->post("name") != "") {
                    $response['group']['name'] = $this->input->post("name");
                }
                if($this->input->post("ug")) {
                    $response['ug'] = $this->input->post("ug");
                }
            }

            $this->twig->display("groups/edit", $response);
        } else {
            #non-existent group id
            show_404();
            exit;
        }
    }

    /*
     * Function to instantiate a group into group library
     */
    private function _loadGroup(int $id) {
        $this->load->library("group");
        $this->group->loadFromId($id);

        $group = array();
        $group = array(
                'id'        => $this->group->id,
                'name'      => $this->group->name,
                'users'     => $this->group->users
        );

        return $group;
    }
}