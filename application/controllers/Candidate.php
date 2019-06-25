<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "candidate";
        $data['active_menu'] = "candidate";
        $this->load->helper("form");
        $data['allPat'] = $this->am->view_data("party_list", "", "id", "desc");
        $data['allCat'] = $this->am->view_data("district", "", "name", "desc");
        $data['allDat'] = $this->am->view_data("divisions", "", "name", "desc");
        $data['allScat'] = $this->am->view_data("candidate_area", "", "id", "desc");
        // $data['allCdt']=$this->am->view_data("candidate","","id","desc");
        $data['content'] = $this->load->view("admin/candidate-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("canidate_no", "canidate_no", "required");
        if ($this->form_validation->run() == NULL) {
            $data = array();

            $data['title'] = "candidate";
            $data['active_menu'] = "candidate";
            $this->load->helper("form");
            $data['allCdt'] = $this->am->view_data("candidate", "", "id", "desc");
            $data['content'] = $this->load->view("admin/candidate-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $ext = "";
            if ($_FILES['pic']['name'] != "") {
                $ext = pathinfo($_FILES['pic']['name']);
                $ext = strtolower($ext['extension']);
            }

            $data = array(
                "candidate_no" => $this->input->post("canidate_no"),
                "first_name" => $this->input->post("fname"),
                "last_name" => $this->input->post("lname"),
                "nid" => $this->input->post("nid"),
                "contact" => $this->input->post("contact"),
                "education" => $this->input->post("education"),
                "picture" => $ext,
                "gender" => $this->input->post("gender"),
                "party_listid" => $this->input->post("party"),
                "dob" => $this->input->post("start_date"),
                "email" => $this->input->post("email"),
                "candidate_areaid" => $this->input->post("districtid"),
                "nationality" => $this->input->post("nationality"),
                "religion" => $this->input->post("religion"),
                "status" => "1",
                "date" => date("Y-m-d")
            );

            if ($this->am->save_data("candidate", $data)) {

                $id = $this->am->Id;

                if ($ext != "") {
                    $config = array();
                    $config['upload_path'] = "./images/candidate/";   //destination of image folder --'./product/'
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                    $config['max_size'] = 2024;   //Maximum size in kilo bite -- '10000'
                    $config['max_width'] = 2000;   // image width -- '2000'
                    $config['max_height'] = 1500;  // image height -- '1500'
                    $config['file_name'] = "candidate-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
                    $this->load->library('upload');
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload("pic"); // upload image file
                }

                $sdata['msg'] = "save Successful";
            } else {
                $sdata['msg'] = "Server to ....";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "candidate", "refresh");
        }
    }

    public function view() {
        $data = array();

        $data['title'] = "vcandidateview";
        $data['active_menu'] = "candidateview";
        $this->load->helper("form");
        $data['allCat'] = $this->am->view_data("divisions", "", "name", "desc");
        $data['allScat'] = $this->am->view_data("district", "", "id", "desc");
        $where = "";
        $data['allPdt'] = $this->am->Candidate_View($where);
        $data['content'] = $this->load->view("admin/candidate-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function delete($id) {

        $selPdt = $this->am->view_data("candidate", array("id" => $id), "id", "asc");


        $data = array(
            "status" => "0"
        );
        if ($this->am->update("candidate", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "candidate", "refresh");
    }

    public function update() {
        $id = $this->input->post("id");
        $selPdt = $this->am->view_data("candidate", array("id" => $id), "id", "asc");


        $data = array(
            "name" => $this->input->post("name")
        );
        if ($this->am->update("candidate", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "candidate", "refresh");
    }

}
