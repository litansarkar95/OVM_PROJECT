<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
        $data['content'] = $this->load->view("report/candidate-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function vote() {
        $data = array();

        $data['title'] = "candidate";
        $data['active_menu'] = "candidate";
        $this->load->helper("form");
        $data['allPat'] = $this->am->view_data("party_list", "", "id", "desc");
        $data['allCat'] = $this->am->view_data("district", "", "name", "desc");
        $data['allDat'] = $this->am->view_data("divisions", "", "name", "desc");
        $data['allScat'] = $this->am->view_data("candidate_area", "", "id", "desc");

        $sub = $this->input->post("sub");
        if ($sub != NULL) {
            $data['allChat'] = $this->am->searchResult(
                    $this->input->post("scid"), $this->input->post("cat")
                    // $this->input->post("edate"),
                    // $this->input->post("scat"),
                    //  $this->input->post("cat")
            );
            /**
              echo "<pre>";
              print_r($data['allChat']);

              echo "</pre>";
             * */
            $data['allChat'] = json_encode($data['allChat']);
        }

        $data['content'] = $this->load->view("report/vote-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function vote_details() {
        $data = array();

        $data['title'] = "vote_details";
        $data['active_menu'] = "vote_details";
        $this->load->helper("form");
        $data['allPat'] = $this->am->view_data("party_list", "", "id", "desc");
        $data['allCat'] = $this->am->view_data("district", "", "name", "asc");
        $data['allDat'] = $this->am->view_data("divisions", "", "name", "asc");
        $data['allScat'] = $this->am->view_data("candidate_area", "", "id", "asc");

        $sub = $this->input->post("sub");
        if ($sub != NULL) {
            $data['allChat'] = $this->am->search_Vote_details(
                    $this->input->post("scid"), $this->input->post("cat"), $this->input->post("dat")
                    // $this->input->post("edate"),
                    // $this->input->post("scat"),
                    //  $this->input->post("cat")
            );
            /**
              echo "<pre>";
              print_r($data['allChat']);

              echo "</pre>";
             * */
        }
        //$data['allChat'] = json_encode($data['allChat']);
        $data['content'] = $this->load->view("report/vote_details-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function voter_vote() {
        $data = array();
        $data['title'] = "voter_vote";
        $data['active_menu'] = "voter_vote";
        $this->load->helper("form");
        $data['allPdt'] = $this->am->Voter_vote();
         $data['content'] = $this->load->view("report/voter_vote-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

}
