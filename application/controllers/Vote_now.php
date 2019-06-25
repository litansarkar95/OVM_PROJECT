<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_now extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "candidate";
        $data['active_menu'] = "candidate";
        $this->load->helper("form");

        $data['content'] = $this->load->view("admin/candidate-new", $data, TRUE);
        $data = array(
            "seat_no" => $this->input->post("seat_no"),
            "party_listid" => $this->input->post("party_listid"),
            "status" => "1",
            "datetime" => date("Y-m-d H:i:s")
        );
        if ($this->am->save_data("vote_now", $data)) {

            $sdata['msg'] = "save Successful";
        } else {
            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "vote_now/view", "refresh");
    }

    public function view() {
        $data = array();

        $data['title'] = "candidate";
        $data['active_menu'] = "candidate";
        $this->load->helper("form");

        //  $data['content'] = $this->load->view("election/vote_now-view", $data, TRUE);
        $this->load->view("election/vote_now-view", $data);
    }

    public function votecount() {
        $data = array();

        $data['title'] = "candidate";
        $data['active_menu'] = "candidate";
        $this->load->helper("form");

        //  $data['content'] = $this->load->view("election/vote_now-view", $data, TRUE);
        $this->load->view("election/vote_now-view", $data);
    }

}
