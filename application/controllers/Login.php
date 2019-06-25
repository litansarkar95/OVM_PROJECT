<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();
        $data['title'] = "Home";
        $this->load->helper("form");
        $data['content'] = $this->load->view("new_front/login-new", $data, TRUE);
        $this->load->view("new_front//master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        if ($this->form_validation->run() == NULL) {

            $data = array();
            $data['title'] = "Home";
            $this->load->helper("form");
            $data['content'] = $this->load->view("new_front/login-new", $data, TRUE);
            $this->load->view("new_front/master", $data);
        } else {
            //  $this->load->helper("form");
            $data = array(
                "email" => $this->input->post("email"),
                "password" => md5($this->input->post("password")),
            );
            $status = $this->am->view_data("registration", $data, "id", "asc");
            if ($status) {




                foreach ($status as $st) {
                    //  if($st->status == ""){
                    if ($st->active == 1) {

                        $sdata = array(
                            "myid" => $st->id,
                            "myfullname" => $st->fullname,
                            "myemail" => $st->email,
                            "mypassword" => $st->password,
                            "mytype" => $st->type
                        );
                        $this->session->set_userdata($sdata);
                        $myid = $this->session->userdata("myid");
                        redirect(base_url() . "dashboard", "refresh");
                    } else {
                        $sdata['msg'] = "Your Account Deactive Please Contact Admin";
                        $this->session->set_userdata($sdata);
                        redirect(base_url() . "login", "refresh");
                    }
                }

//else{
//echo "please Verifi Account";
//}
            } else {
                //echo "<script>alert('Email or Password Wrong');</script>";
                $sdata['msg'] = "Email or Password Wrong";
                $this->session->set_userdata($sdata);
                redirect(base_url() . "login", "refresh");
            }
        }
    }

    public function logout() {

        $this->session->unset_userdata("myid");
        $this->session->unset_userdata("myfname");
        $this->session->unset_userdata("myemail");
        $this->session->unset_userdata("mytype");
        $sdata['msg'] = "Logout Please keep Login";
        $this->session->set_userdata($sdata);
        redirect(base_url(), "refresh");
    }

}
