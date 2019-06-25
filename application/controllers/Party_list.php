<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Party_list extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "party_list";
        $data['active_menu'] = "party_list";
        $this->load->helper("form");
       $data['allCdt']=$this->am->view_data("party_list","","id","desc");
        $data['content'] = $this->load->view("admin/party_list-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "name", "required");
        if ($this->form_validation->run() == NULL) {


            $data = array();

            $data['title'] = "party_list";
            $data['active_menu'] = "party_list";
            $this->load->helper("form");
            $data['allCdt']=$this->am->view_data("party_list","","id","desc");
            $data['content'] = $this->load->view("admin/party_list-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $ext = "";
            if ($_FILES['pic']['name'] != "") {
                $ext = pathinfo($_FILES['pic']['name']);
                $ext = strtolower($ext['extension']);
            }

            $data = array(
                "name" => $this->input->post("name"),
                "symbol_name" => $this->input->post("symbol"),
                "president" => $this->input->post("president"),
                "status"=>"1",
                "picture" => $ext,
                "date" => date("Y-m-d")
            );
          
            if ($this->am->save_data("party_list", $data)) {
                $id = $this->am->Id;
            
                if ($ext != "") {
                    $config = array();
                    $config['upload_path'] = "./images/party/";   //destination of image folder --'./product/'
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                    $config['max_size'] = 2024;   //Maximum size in kilo bite -- '10000'
                    $config['max_width'] = 2000;   // image width -- '2000'
                    $config['max_height'] = 1500;  // image height -- '1500'
                    $config['file_name'] = "party-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
                    $this->load->library('upload');
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload("pic"); // upload image file
                }

                $sdata['msg'] = "save Successful";
           } else {
                $sdata['msg'] = "Server to ....";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "party_list", "refresh");
        }
    }


    public function delete($id) {
       
        $selPdt = $this->am->view_data("party_list", array("id" => $id), "id", "asc");
      
       
        $data = array(
            "status"=>"0"
        );
        if ($this->am->update("party_list", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "party_list", "refresh");
    }

    public function update() {
           $id = $this->input->post("id");
        $selPdt = $this->am->view_data("party_list", array("id" => $id), "id", "desc");
        foreach ($selPdt as $pdt) {
            $old_ext = $pdt->picture;
        }
        if ($_FILES['pic']['name'] != "") {
            $ext = pathinfo($_FILES['pic']['name']);
            $ext = strtolower($ext['extension']);
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/party//party-{$id}.{$old_ext}")) {
                    unlink("images/party//party-{$id}.{$old_ext}");
                }
                $config = array();
                $config['upload_path'] = "./images/party/";   //destination of image folder --'./product/'
                $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                $config['max_size'] = 2024;   //Maximum size in kilo bite -- '10000'
                $config['max_width'] = 3000;   // image width -- '2000'
                $config['max_height'] = 1500;  // image height -- '1500'
                $config['file_name'] = "party-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
                $this->load->library('upload');
                $this->upload->initialize($config); //upload image data
                $this->upload->do_upload("pic"); // upload image file
            }
        } else {
            $ext = $old_ext;
        }

        $data = array(
            "name" => $this->input->post("name"),
            "symbol_name"  => $this->input->post("symbol_name"),
            "president" => $this->input->post("president"),
            "picture" => $ext
           
        );
        if ($this->am->update("party_list", $data, array("id" => $id))) {

            $sdata['msg'] = "Update Successful ";
        } else {

            $sdata['msg'] = "Server to ....";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "party_list", "refresh");
    }
    
      public function politacal_party() {
        $data = array();

        $data['title'] = "party_list";
        $data['active_menu'] = "party_list";
        $this->load->helper("form");
       $data['allCdt']=$this->am->view_data("party_list","","id","desc");
        $data['content'] = $this->load->view("new_front/politacal-party-view", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }
    

}
