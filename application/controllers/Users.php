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
        #loading base  model
        $this->load->model("users_model");

        #page settings
        $page    = $this->input->get("page")    ? $this->input->get("page")     : 1;
        $perpage = $this->input->get("perpage") ? $this->input->get("perpage")  : 20;
        $orderby = $this->input->get("orderby") ? $this->input->get("orderby")  : "id";
        $order   = $this->input->get("order")   ? $this->input->get("order")    : "DESC";

        #limitations (group(s), active, etc...)
        $limitations = array();

        #getting user list with custom function
        $ulist = $this->users_model->getFullUsersList($page, $perpage, $orderby, $order, $limitations);
        $usersCount = $this->users_model->countUsers($limitations);

        #setting up display data
        $response = array(
                'users'         => $ulist->num_rows() > 0 ? $ulist->result() : null,
                'usersCount'    => $usersCount,
                'page'          => $page,
                'perpage'       => $perpage,
                'orderby'       => $orderby,
                'order'         => $order
        );

        #rendering page
        $this->twig->display("users/index", $response);
    }

    /*
     * Add User
     */
    public function add() {
         #loading libraries (groups_model is autoloaded through user library)
         $this->load->library("user");
         $this->load->library("form_validation");
         $this->load->helper("form");

         #base form values
         $formValues = array(
            'username'       => '',
            'email'          => '',
            'password'       => '',
            'password_check' => '',
            'groups'         => array()
         );

         #groups array
         $groups = array();
         $g = $this->groups_model->loadAll();
         if($g->num_rows() > 0) {
            foreach($g->result() as $gr) {
                $groups[] = array(
                        "id"   => $gr->id,
                        "name" => $gr->name
                    );
            }
         }

         #setting up form_validation rules
         $this->form_validation->set_rules("username",         "Username",         "required|is_unique[users.username]|max_length[24]|min_length[3]|alpha_dash");
         $this->form_validation->set_rules("email",            "Email",            "required|is_unique[users.email]|valid_email");
         $this->form_validation->set_rules("password",         "Password",         "required|min_length[8]|max_length[64]|callback_password_check");
         $this->form_validation->set_rules("password_confirm", "Confrma Password", "required|matches[password]");

         #running the form
         if($this->form_validation->run() === TRUE) {
            #saving user data
            $this->user->username   = $this->input->post("username");
            $this->user->email      = $this->input->post("email");
            $this->user->password   = $this->input->post("password");

            #groups values
            if($this->input->post('groups') && is_array($this->input->post('groups')) && count($this->input->post('groups')) > 0) {
                $this->user->groups = $this->input->post('groups');
            }

            #saving the user
            $this->user->save();

         } else {
            #redefine formValues based on user data (if sent)
            $formValues['username'] = $this->input->post("username") ? $this->input->post("username") : "";
            $formValues['email']    = $this->input->post("email")    ? $this->input->post("email")    : "";

            #groups values
            if($this->input->post('groups') && is_array($this->input->post('groups')) && count($this->input->post('groups')) > 0) {
                $formValues['groups'] = $this->input->post('groups');
            }

            #handling validation errors
            if(validation_errors() != "") {
                $this->twig->addGlobal("systemError", validation_errors());
            }

            $response = array(
                'formValues'        => $formValues,
                'groups'            => $groups
            );

            $this->twig->display("users/add", $response);
         }
    }

    public function edit($id) {
        #loading libraries (groups_model is autoloaded through user library)
         $this->load->library("user");
         $this->load->library("form_validation");
         $this->load->helper("form");

         $this->user->loadById($id); #setting up user
         $this->user->associateUG(); #setting up user groups for the form

         #base form values
         $formValues = array(
            'username'       => '',
            'email'          => '',
            'password'       => '',
            'password_check' => '',
            'groups'         => array(),
            'ug'             => array()
         );

         #groups array
         $groups = array();
         $g = $this->groups_model->loadAll();
         if($g->num_rows() > 0) {
            foreach($g->result() as $gr) {
                $groups[] = array(
                        "id"   => $gr->id,
                        "name" => $gr->name
                    );
            }
         }

         #setting up form_validation rules
         $this->form_validation->set_rules("username", "Username", "required|max_length[24]|min_length[3]|alpha_dash");
         $this->form_validation->set_rules("email", "Email", "required|valid_email");
         $this->form_validation->set_rules("password", "Password", "min_length[8]|max_length[64]|callback_password_check_edit");
         $this->form_validation->set_rules("password_confirm", "Confrma Password", "matches[password]");

         #running the form
         if($this->form_validation->run() === TRUE) {
            #saving user data
            $this->user->username   = $this->input->post("username");
            $this->user->email      = $this->input->post("email");
            $this->user->password   = ($this->input->post("password") && $this->user->passwordStrengthCheck($this->input->post("password"))) ? $this->input->post("password") : "";
            
            #groups values
            if($this->input->post('groups') && is_array($this->input->post('groups')) && count($this->input->post('groups')) > 0) {
                $this->user->groups = $this->input->post('groups');
            }

            #saving the user
            $this->user->save();

            #redirecting (to self... ?)
            $this->session->set_flashdata("systemSuccess", "User " . $this->user->username . " (ID: " . $this->user->id . ") edited Successfully");
            redirect("users/edit/" . $id, "refresh");
         } else {
            #redefine formValues based on user data (if sent)
            $formValues['username'] = $this->input->post("username") ? $this->input->post("username") : $this->user->username;
            $formValues['email']    = $this->input->post("email")    ? $this->input->post("email")    : $this->user->email;
            $formValues['ug']       = $this->input->post("ug")       ? $this->input->post("ug")       : $this->user->ug;

            #groups values
            if($this->input->post('groups') && is_array($this->input->post('groups')) && count($this->input->post('groups')) > 0) {
                $formValues['groups'] = $this->input->post('groups');
            } else {
                $formValues['groups'] = $this->user->groups;
            }

            #handling validation errors
            if(validation_errors() != "") {
                $this->twig->addGlobal("systemError", validation_errors());
            }

            $response = array(
                'formValues'        => $formValues,
                'groups'            => $groups
            );

            $this->twig->display("users/edit", $response);
         }
    }

    /*
     * force user logout based on id
     */
    public function logOutUser(int $id) {

    }

    public function password_check(String $str) : bool {
        if($this->user->passwordStrengthCheck($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', 'The {field} field must contain at least one letter and one number');
            return FALSE;
        }
    }

    public function password_check_edit(String $str) : bool {
        if(trim($str) != "") {
            if($this->user->passwordStrengthCheck($str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('password_check', 'The {field} field must contain at least one letter and one number');
                return FALSE;
            }
        } else {
            return TRUE;
        }
        
    }

}