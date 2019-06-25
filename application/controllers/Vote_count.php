<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_count extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();
        $data['title'] = "Vote Result";
        $data['allCdt'] = $this->am->view_data("party_list", "", "name", "asc");
        $data['allPdt'] = $this->am->view_data("candidate", "", "id", "asc");
        //$mycandidate_areaid = $this->session->userdata("mycandidate_areaid");
        // print_r($mycandidate_areaid);
        $where = array("candidate_areaid" => $this->session->userdata("mycandidate_areaid"));
        $data['allChat'] = $this->am->Candidate_View($where);

        $data['allChat'] = json_encode($data['allChat']);
        $data['allRdt'] = $this->am->Candidate_View($where);
        $data['content'] = $this->load->view("new_front/vote-result", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }

    public function start() {


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("id", "Vote Now", "required");
        if ($this->form_validation->run() == NULL) {

            $sdata['msg'] = "Please Select party ";
            $this->session->set_userdata($sdata);
            $mynid = $mynid = $this->session->userdata("mynid");

            redirect(base_url() . "candidate_select/vote/$mynid", "refresh");
        } else {
            $data = array(
                "id" => $this->input->post("id"),
                "status" => "1",
            );

            $status = $this->am->view_data("candidate", $data, "id", "asc");
            if ($status) {
                foreach ($status as $st) {
                    $votecount = $st->votecount;

                    $psdata = array(
                        "myid" => $st->id,
                        "mynid" => $st->nid,
                        "myfirst_name" => $st->first_name,
                        "mylast_name" => $st->last_name,
                        "mycandidate_areaid" => $st->candidate_areaid,
                        "mycontact" => $st->contact
                    );
                    $this->session->set_userdata($psdata);
                    $myid = $this->session->userdata("myid");
                    $mynid = $this->session->userdata("mynid");
                }

                $id = $this->input->post("id");
                $selPdt = $this->am->view_data("candidate", array("id" => $id), "id", "asc");


                $data = array(
                    "votecount" => $votecount + 1,
                );
                if ($this->am->update("candidate", $data, array("id" => $id))) {


                    $sdata['msg'] = "Vote Successful ";
                } else {


                    $sdata['msg'] = "Server to ....";
                }
                $this->session->set_userdata($sdata);
                redirect(base_url() . "vote_count", "refresh");
            } else {
                echo "err";
            }
        }
    }

}
