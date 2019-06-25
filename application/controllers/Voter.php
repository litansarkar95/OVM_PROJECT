<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Voter extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "voter";
        $data['active_menu'] = "voter";
        $this->load->helper("form");
        $data['allCat'] = $this->am->view_data("divisions", "", "name", "asc");
        $data['allScat'] = $this->am->view_data("district", "", "name", "asc");
        $data['allSit'] = $this->am->view_twodata("candidate_area", "district", "districtid", "", "name", "asc");
        ;

        $data['content'] = $this->load->view("admin/voter-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fname", "canidate_no", "required");
        $this->form_validation->set_rules("nid", "nid", "required");
        if ($this->form_validation->run() == NULL) {
            $data = array();

            $data['title'] = "voter";
            $data['active_menu'] = "voter";
            $this->load->helper("form");
            $data['allCat'] = $this->am->view_data("divisions", "", "name", "asc");
            $data['allScat'] = $this->am->view_data("district", "", "name", "asc");
            $data['allSit'] = $this->am->view_twodata("candidate_area", "district", "districtid", "", "name", "asc");
            ;

            $data['content'] = $this->load->view("admin/voter-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $ext = "";
            if ($_FILES['pic']['name'] != "") {
                $ext = pathinfo($_FILES['pic']['name']);
                $ext = strtolower($ext['extension']);
            }

            $data = array(
                "nid" => $this->input->post("nid"),
                "first_name" => $this->input->post("fname"),
                "last_name" => $this->input->post("lname"),
                "father_name" => $this->input->post("fathername"),
                "candidate_areaid" => $this->input->post("setid"),
                "address" => $this->input->post("address"),
                "contact" => $this->input->post("contact"),
                "education" => $this->input->post("education"),
                "picture" => $ext,
                "gender" => $this->input->post("gender"),
                "dob" => $this->input->post("start_date"),
                "email" => $this->input->post("email"),
                "nationality" => $this->input->post("nationality"),
                "religion" => $this->input->post("religion"),
                "status" => "1",
                "date" => date("Y-m-d")
            );

            if ($this->am->save_data("voter", $data)) {

                $id = $this->am->Id;

                if ($ext != "") {
                    $config = array();
                    $config['upload_path'] = "./images/voter/";   //destination of image folder --'./product/'
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                    $config['max_size'] = 2024;   //Maximum size in kilo bite -- '10000'
                    $config['max_width'] = 2000;   // image width -- '2000'
                    $config['max_height'] = 1500;  // image height -- '1500'
                    $config['file_name'] = "voter-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
                    $this->load->library('upload');
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload("pic"); // upload image file
                }

                $sdata['msg'] = "save Successful";
            } else {
                $sdata['msg'] = "Server to ....";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "voter", "refresh");
        }
    }

    public function view() {
        $data = array();

        $data['title'] = "voterview";
        $data['active_menu'] = "voterview";
        $this->load->helper("form");
        $data['allCat'] = $this->am->view_data("divisions", "", "name", "desc");
        $data['allScat'] = $this->am->view_data("district", "", "id", "desc");
        $where = "";
        $data['allPdt'] = $this->am->Voter_View($where);
        $data['content'] = $this->load->view("admin/voter-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function delete($id) {

        $selPdt = $this->am->view_data("voter", array("id" => $id), "id", "asc");


        $data = array(
            "status" => "0"
        );
        if ($this->am->update("voter", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "voter", "refresh");
    }

    public function edit($id) {
        $data = array();

        $data['title'] = "voterview";
        $data['active_menu'] = "voterview";
        $this->load->helper("form");
        $data['allCat'] = $this->am->view_data("divisions", "", "name", "asc");
        $data['allScat'] = $this->am->view_data("district", "", "name", "asc");
        $data['allSit'] = $this->am->view_twodata("candidate_area", "district", "districtid", "", "name", "asc");
       
      
        $data['allPdt'] = $this->am->view_data("voter", array("id" => $id), "id", "asc");
        $data['content'] = $this->load->view("admin/voter-edit", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function update() {
        $id = $this->input->post("id");
        $selPdt = $this->am->view_data("voter", array("id" => $id), "id", "asc");


        $data = array(
            "name" => $this->input->post("name")
        );
        if ($this->am->update("voter", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "voter", "refresh");
    }

}
