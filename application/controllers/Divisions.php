<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Divisions extends CI_Controller {

    public function index() {
        $data = array();

        $data['title'] = "Divisions";
        $data['active_menu'] = "divisions";
        $this->load->helper("form");
      $data['allCdt']=$this->am->view_data("divisions","","id","desc");
        $data['content'] = $this->load->view("admin/divisions-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "name", "required");
        if ($this->form_validation->run() == NULL) {


            $data = array();

            $data['title'] = "Divisions";
            $data['active_menu'] = "divisions";
            $this->load->helper("form");
            $data['allCdt']=$this->am->view_data("divisions","","id","desc");
            $data['content'] = $this->load->view("admin/divisions-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $data = array(
                "name" => $this->input->post("name"),
                "code" => $this->input->post("code"),
                "status"=>"1",
                "date" => date("Y-m-d")
            );
          
            if ($this->am->save_data("divisions", $data)) {

                $sdata['msg'] = "save Successful";
           } else {
                $sdata['msg'] = "Server to ....";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "divisions", "refresh");
        }
    }


    public function delete($id) {
       
        $selPdt = $this->am->view_data("divisions", array("id" => $id), "id", "asc");
      
       
        $data = array(
            "status"=>"0"
        );
        if ($this->am->update("divisions", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "divisions", "refresh");
    }

    public function update() {
        $id = $this->input->post("id");
        $selPdt = $this->am->view_data("divisions", array("id" => $id), "id", "asc");
      
       
        $data = array(
            "code" => $this->input->post("code"),
			 "name" => $this->input->post("name")
        );
        if ($this->am->update("divisions", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "divisions", "refresh");
    }

}
