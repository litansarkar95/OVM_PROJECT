<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_select extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "candidate";
        $data['active_menu'] = "candidate";
        $this->load->helper("form");
        // $data['allPat']=$this->am->view_data("party_list","","id","desc");
        //$data['allCat'] = $this->am->view_data("district", "", "name", "desc");
        // $data['allDat'] = $this->am->view_data("divisions", "", "name", "desc");
        // $data['allScat'] = $this->am->view_data("candidate_area", "", "id", "desc");
        // $data['allCdt']=$this->am->view_data("candidate","","id","desc");
        $data['allCdt'] = $this->am->view_data("party_list", "", "id", "desc");
        $where = array("nid" => $this->session->userdata("mynid"));
        //$data['allData'] = $this->am->vieworder($where);
        $data['allPdt'] = $this->am->Voter_View($where);
        // $data['content'] = $this->load->view("election/candidate-select-new", $data, TRUE);
        // $this->load->view("front/master", $data);
        $data['content'] = $this->load->view("new_front/candidate-select-new", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }

    public function vote() {
        $data = array();

        $data['title'] = "candidate";
        $data['active_menu'] = "candidate";
        $this->load->helper("form");
        //$this->session->unset_userdata("myid");
        //$this->session->unset_userdata("mynid");
        // $this->session->unset_userdata("myemail");
        // $data['allPat']=$this->am->view_data("party_list","","id","desc");
        //$data['allCat'] = $this->am->view_data("district", "", "name", "desc");
        // $data['allDat'] = $this->am->view_data("divisions", "", "name", "desc");
        // $data['allScat'] = $this->am->view_data("candidate_area", "", "id", "desc");
        $where = "";
        $data['allCdt'] = $this->am->Candidate_View($where);
        $where = array("nid" => $this->session->userdata("mynid"));
        //$data['allData'] = $this->am->vieworder($where);
        $data['allPdt'] = $this->am->Voter_View($where);
        //$data['content'] = $this->load->view("election/candidate-select", $data, TRUE);
        //$this->load->view("front/master", $data);
        $data['content'] = $this->load->view("new_front/candidate-select", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }

}
