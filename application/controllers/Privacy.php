<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {
	 public function __construct(){
		 parent::__construct();
    }
	function policy()
	{
        $this->load->view('policy');
	}
	
	function privacypolicy()
	{
        $this->load->view('privacypolicy');
	}
}
