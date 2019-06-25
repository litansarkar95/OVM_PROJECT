<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "Dashboard";
        $data['active_menu'] = "dashboard";
        $this->load->helper("form");
        $this->load->helper("form");
        $data['allData'] = $this->am->MyDashboard();
        $data['allCat'] = $this->am->view_data("divisions", "", "name", "desc");
        $data['allScat'] = $this->am->view_data("district", "", "id", "desc");

        // $data['allPdt']=$this->am->view_data("divisions","","name","asc");
        $data['allCdt'] = $this->am->view_twodata("candidate_area", "district", "districtid", "", "id", "desc");
        //  $data['allPdt']=$this->am->view_data("pgroup","","id","desc");
        $data['content'] = $this->load->view("admin/dashboard", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

}
