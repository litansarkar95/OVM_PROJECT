<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page_not_found extends CI_Controller {

    public function index() {
        $data = array();
        $data['title_page'] = "home";
        $data['active_bar']="home";
       
       
        $data['content'] = $this->load->view("new_front/page-404", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }

}
