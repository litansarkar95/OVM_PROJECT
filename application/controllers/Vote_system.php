<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_system extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "Home";
        //$data['active_menu']="dashboard";
        //$this->load->helper("form");
        //  $data['allPdt']=$this->am->view_data("pgroup","","id","desc");
        //$data['content']=$this->load->view("front/home",$data,TRUE);
        // $this->load->view("front/master",$data);

        $data['content'] = $this->load->view("new_front/vote-new", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }

    public function voter_code() {
        $data = array();

        $data['title'] = "Home";
        $data['allCdt'] = $this->am->view_data("party_list", "", "name", "asc");
        $data['content'] = $this->load->view("new_front/voter_code-new", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }

    /**   Start  verify  * */
    public function verify() {

        $this->load->helper("form");
        $data = array(
            "code" => $this->input->post("code"),
            "nid" => $this->input->post("nid"),
        );
        $status = $this->am->view_data("voter_verify", $data, "id", "asc");

        if ($status) {
            $nid = $this->input->post("nid");
            $selPdt = $this->am->view_data("voter_verify", array("nid" => $nid), "id", "asc");


            $data = array(
                "code" => " ",
                "status" => "1"
            );
            if ($this->am->update("voter_verify", $data, array("nid" => $nid))) {
                foreach ($status as $st) {

                    $sdata = array(
                        "myid" => $st->id,
                        "mynid" => $st->nid,
                    );

                    $myid = $this->session->userdata("myid");
                    $mynid = $this->session->userdata("mynid");
                    $this->session->set_userdata($sdata);
                    redirect(base_url() . "candidate_select?nid=$mynid", "refresh");
                }
            } else {
                $sdata['msg'] = "Code Error ";
                $this->session->set_userdata($sdata);
                $mynid = $this->input->post("nid");
                redirect(base_url() . "candidate_select?nid=$mynid", "refresh");
            }
        } else {
            $sdata['msg'] = "Code Error ";
            $this->session->set_userdata($sdata);
            $mynid = $this->input->post("nid");
            redirect(base_url() . "vote_system/voter_code?nid=$mynid", "refresh");
        }
    }

    /**   end verify  * */
    public function code() {
        $this->load->helper("form");
        $this->load->library("form_validation");

        $this->form_validation->set_rules("nid", "Nid", "required");
        $this->form_validation->set_rules("mobile", "Mobile", "required");
        if ($this->form_validation->run() == NULL) {

            $data = array();

            $data['title'] = "Home";
            $data['content'] = $this->load->view("new_front/login", $data, TRUE);
            $this->load->view("new_front/master", $data);
        } else {

            $data = array(
                "nid" => $this->input->post("nid"),
                "contact" => $this->input->post("mobile")
            );
            $status = $this->am->view_data("voter", $data, "id", "asc");
            if ($status) {
                foreach ($status as $st) {
                    //  if($st->status == ""){
                    if ($st->status == 1) {

                        $psdata = array(
                            "myid" => $st->id,
                            "mynid" => $st->nid,
                            "myfirst_name" => $st->first_name,
                            "mylast_name" => $st->last_name,
                            "myfather_name" => $st->father_name,
                            "mycandidate_areaid" => $st->candidate_areaid,
                            "mycontact" => $st->contact
                        );
                        $this->session->set_userdata($psdata);
                        $myid = $this->session->userdata("myid");
                        $mynid = $this->session->userdata("mynid");

                        $sdata = array(
                            "nid" => $this->input->post("nid")
                        );

                        $sstatus = $this->am->view_data("voter_verify", $sdata, "id", "asc");
                        if ($sstatus) {
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
                            $sdata['msg'] = "You Alreay Vote";
                            $this->session->set_userdata($sdata);
                            $data['content'] = $this->load->view("new_front/vote-result", $data, TRUE);
                            $this->load->view("new_front/master", $data);
                        } else {
                            /** verify Code start   * */
                            /**   Voter Table Code * */
                            $code = rand(1000, 999999);
                            $ssdata = array(
                                "code" => $code,
                                "nid" => $this->input->post("nid"),
                                "date" => date("Y-m-d H:i:s ")
                            );
                            $status = $this->am->view_data("voter_verify", $ssdata, "id", "asc");
                            if ($this->am->save_data("voter_verify", $ssdata)) {
                                /** mail Check * */
                                //live server mail
                                //$to = "$email";
/**
                                $to = "$contact";
                                $subject = "Password Recovery";
                                $txt = "Hi! Please This Code Use Only One Time . Your Code $code . Thank You";
                                $headers = "From: info@shajcorner.com" . "\r\n" .
                                        "CC: ";

                                mail($to, $subject, $txt, $headers);
                                //end live server mail
                                
                                **/
                                redirect(base_url() . "vote_system/voter_code?nid=$mynid", "refresh");
                            }
                            /** verify Code end   * */
                        }
                    }
                }
            } else {

                //echo "<script>alert('Email or Password Wrong');</script>";
                $sdata['msg'] = "NID OR Mobile number Wrong";
                $this->session->set_userdata($sdata);
                redirect(base_url() . "vote_system", "refresh");
            }
        }
    }

}
