<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "registration";
        $data['active_menu'] = "registration";
        $this->load->helper("form");
        $this->load->helper("form");
        $data['allCat'] = $this->am->view_data("district", "", "name", "asc");
        $data['allScat'] = $this->am->view_data("registration", "", "id", "desc");
        $data['allCdt'] = $this->am->view_twodata("registration", "district", "districtid", "", "id", "desc");
        $data['content'] = $this->load->view("admin/registration-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fname", "fullname", "required");
        if ($this->form_validation->run() == NULL) {

            $data = array();

            $data['title'] = "registration";
            $data['active_menu'] = "registration";
            $this->load->helper("form");
            $this->load->helper("form");
            $data['allCat'] = $this->am->view_data("district", "", "name", "asc");
            $data['allCdt'] = $this->am->view_twodata("registration", "district", "districtid", "", "id", "desc");
            $data['content'] = $this->load->view("admin/registration-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $data = array(
                "fullname" => $this->input->post("fname"),
                "email" => $this->input->post("email"),
                "password" => md5($this->input->post("password")),
                "gender" => $this->input->post("gender"),
                "districtid" => $this->input->post("districtid"),
                "mobile" => $this->input->post("mobile"),
                "status" => "1",
                 "active" => "1",
                "type" => $this->input->post("role"),
                "date" => date("Y-m-d")
            );

            if ($this->am->save_data("registration", $data)) {

                $sdata['msg'] = "save Successful";
            } else {
                $sdata['msg'] = "Server to ....";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "registration", "refresh");
        }
    }

    public function update() {
        $id = $this->input->post("id");
        $selPdt = $this->am->view_data("registration", array("id" => $id), "id", "asc");


        $data = array(
            "fullname" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "mobile" => $this->input->post("mobile"),
            "districtid" => $this->input->post("divisionsid"),
            "type" => $this->input->post("role")
        );
        if ($this->am->update("registration", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "registration", "refresh");
    }

    public function active($id) {

        $selPdt = $this->am->view_data("registration", array("id" => $id), "id", "asc");


        $data = array(
            "active" => "1"
        );
        if ($this->am->update("registration", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "registration", "refresh");
    }

    public function deactive($id) {

        $selPdt = $this->am->view_data("registration", array("id" => $id), "id", "asc");


        $data = array(
            "active" => "0"
        );
        if ($this->am->update("registration", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "registration", "refresh");
    }
    
    public function delete($id) {

        $selPdt = $this->am->view_data("registration", array("id" => $id), "id", "asc");


        $data = array(
            "status" => "0"
        );
        if ($this->am->update("registration", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "registration", "refresh");
    }

}
