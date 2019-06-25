<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class District extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "District";
        $data['active_menu'] = "district";
        $this->load->helper("form");
        $data['allPdt'] = $this->am->view_data("divisions", "", "name", "asc");
        $data['allCdt'] = $this->am->view_twodata("district", "divisions", "divisionsid", "", "id", "desc");
        $data['content'] = $this->load->view("admin/district-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "name", "required");
        if ($this->form_validation->run() == NULL) {


            $data = array();

            $data['title'] = "District";
            $data['active_menu'] = "district";
            $this->load->helper("form");
            $data['allPdt'] = $this->am->view_data("divisions", "", "name", "asc");
            $data['allCdt'] = $this->am->view_data("district", "", "id", "desc");
            $data['content'] = $this->load->view("admin/district-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $data = array(
                "name" => $this->input->post("name"),
                "code" => $this->input->post("code"),
                "divisionsid" => $this->input->post("divisionsid"),
                "status" => "1",
                "date" => date("Y-m-d")
            );

            if ($this->am->save_data("district", $data)) {

                $sdata['msg'] = "save Successful";
            } else {
                $sdata['msg'] = "Server to ....";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "district", "refresh");
        }
    }

    public function delete($id) {

        $selPdt = $this->am->view_data("district", array("id" => $id), "id", "asc");


        $data = array(
            "status" => "0"
        );
        if ($this->am->update("district", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "district", "refresh");
    }

    public function update() {
        $id = $this->input->post("id");
        $selPdt = $this->am->view_data("district", array("id" => $id), "id", "asc");


        $data = array(
            "name" => $this->input->post("name"),
            "code" => $this->input->post("code"),
            "divisionsid" => $this->input->post("divisionsid")
        );
        if ($this->am->update("district", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "district", "refresh");
    }

}
