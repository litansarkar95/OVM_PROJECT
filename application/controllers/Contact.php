<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {
        $data = array();

        $data['title'] = "Contact";

        $data['content'] = $this->load->view("new_front/contact", $data, TRUE);
        $this->load->view("new_front/master", $data);
    }

}
