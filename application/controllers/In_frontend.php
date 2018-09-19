<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In_frontend extends CI_Controller {

	
	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->library('zend');
		$this->load->model('Agent_model');
		
			if($this->session->userdata('userdetails'))
			{
				$details=$this->session->userdata('userdetails');
				
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('html/header',$data);
			}
	}
	
	
}
