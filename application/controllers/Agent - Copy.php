<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Agent_model');
		
	
	}

	public function index()
	{	
		if(!$this->session->userdata('userdetails'))
		{
			$this->load->view('html/login');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('agent/patientlist/');
		}
	}

	public function loginpost()
	{
		if(!$this->session->userdata('userdetails'))
		{
			$post=$this->input->post();
			//echo '<pre>';print_r($post);
			$login_deta=array('email'=>$post['email'],'password'=>md5($post['password']));
			$check_login=$this->Agent_model->login_details($login_deta);
				$this->load->helper('cookie');

		
			if(count($check_login)>0){
				$login_details=$this->Agent_model->get_agent_details($check_login['a_id']);
				$this->session->set_userdata('userdetails',$login_details);
				redirect('agent');
			}else{
				$this->session->set_flashdata('loginerror',"Invalid Email Address or Password!");
				redirect('agent');
			}
		}
	}
	public function forgotpassword()
	{	
		if(!$this->session->userdata('userdetails'))
		{
			$post=$this->input->post();
			$check_login=$this->Agent_model->email_check_details($post['forgot_password_email']);
			if(count($check_login)>0){
				
					$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->to($check_login['a_email_id']);
					$this->email->from('customerservice@gmail.com');
					$body = "<b> Your Account login Password is </b> : ".$check_login['a_org_password'];
					 $this->email->message($body);
					if ($this->email->send())
					{
						$this->session->set_flashdata('success',"Password sent to your registered email address. Please check your registered email address");
						redirect('agent');
					}else{
						$this->session->set_flashdata('error'," In Localhost mail  didn't sent");
						redirect('agent');
					}
			}else{
				$this->session->set_flashdata('error',"Invalid login details. Please try again once");
				redirect('agent');
			}
		}
	}
	
	
				

	
	
	
	
	public function patient()
	{	
	$data['app_appointment_list']=$this->Agent_model->get_app_appointment_list();
	//echo '<pre>';print_r($data['app_appointment_list']);exit; 
	$this->load->view('html/header');
	$this->load->view('html/sidebar');
	$this->load->view('agent/patient-list',$data);
	$this->load->view('html/footer');
				
	}
	public function patientlist()
	{	
	//$data['app_appointment_list']=$this->Agent_model->get_app_appointment_list();
	//echo '<pre>';print_r($data['app_appointment_list']);exit; 
	
	$this->load->view('html/header');
	$this->load->view('html/sidebar');
	$this->load->view('agent/patient-history');
	$this->load->view('html/footer');
				
	}
	public function changepassword()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
				$this->load->view('html/changepassword');
				$this->load->view('html/footer');
			
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	public function logout(){
		$admindetails=$this->session->userdata('userdetails');
		$up_details=array('a_id'=>0);
		$update=$this->Agent_model->update_login_details($admindetails['a_id'],$up_details);
		$userinfo = $this->session->userdata('userdetails');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect('agent');
	}
	
	
	
}

?>