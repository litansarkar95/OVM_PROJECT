<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }


	public function index()
	{
		 $data=array();
        
         $data['title']="Home";
         //$data['active_menu']="dashboard";
          //$this->load->helper("form");
           
         //  $data['allPdt']=$this->am->view_data("pgroup","","id","desc");
         //$data['content']=$this->load->view("front/home",$data,TRUE);
        // $this->load->view("front/master",$data);
         $data['slide']=$this->load->view("new_front/slide",$data,TRUE);
         $data['content']=$this->load->view("new_front/home",$data,TRUE);
        $this->load->view("new_front/master",$data);
	}
}
