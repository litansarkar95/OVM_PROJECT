<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_area extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "candidate_area";
        $data['active_menu'] = "candidate_area";
        $this->load->helper("form");
        $data['allCat'] = $this->am->view_data("divisions", "", "name", "desc");
        $data['allScat'] = $this->am->view_data("district", "", "id", "desc");

        // $data['allPdt']=$this->am->view_data("divisions","","name","asc");
        $data['allCdt'] = $this->am->view_twodata("candidate_area", "district", "districtid", "", "id", "desc");
        $data['content'] = $this->load->view("admin/candidate_area-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("seat_name", "seat_name", "required");
        if ($this->form_validation->run() == NULL) {


            $data = array();

            $data['title'] = "candidate_area";
            $data['active_menu'] = "candidate_area";
            $this->load->helper("form");
            $data['allPdt'] = $this->am->view_data("divisions", "", "name", "asc");
            $data['allCdt'] = $this->am->view_data("candidate_area", "", "id", "desc");
            $data['content'] = $this->load->view("admin/candidate_area-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $data = array(
                "seat_no" => $this->input->post("seat_no"),
                "seat_name" => $this->input->post("seat_name"),
                "candidate_area" => $this->input->post("candidate_area"),
                "districtid" => $this->input->post("districtid"),
                "status" => "1",
                "date" => date("Y-m-d")
            );

            if ($this->am->save_data("candidate_area", $data)) {

                $sdata['msg'] = "save Successful";
            } else {
                $sdata['msg'] = "Server to ....";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "candidate_area", "refresh");
        }
    }

    public function delete($id) {

        $selPdt = $this->am->view_data("candidate_area", array("id" => $id), "id", "asc");


        $data = array(
            "status" => "0"
        );
        if ($this->am->update("candidate_area", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "candidate_area", "refresh");
    }

    public function update() {
        $id = $this->input->post("id");
        $selPdt = $this->am->view_data("candidate_area", array("id" => $id), "id", "asc");


        $data = array(
            "name" => $this->input->post("name"),
            "divisionsid" => $this->input->post("divisionsid")
        );
        if ($this->am->update("candidate_area", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "candidate_area", "refresh");
    }

}
