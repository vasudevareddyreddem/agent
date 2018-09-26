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
			 $data['executive_list']=$this->Agent_model->executive_list_data();
				//echo'<pre>';print_r($data);exit;
			$this->load->view('html/login',$data);
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
			 $data['executive_list']=$this->Agent_model->executive_list_data();
				//echo'<pre>';print_r($data);exit;
			$login_deta=array('email'=>$post['email'],'password'=>md5($post['password']));
			//echo '<pre>';print_r($login_deta);exit;
			$check_login=$this->Agent_model->login_details($login_deta);
			//echo '<pre>';print_r($check_login);exit;
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
		if($this->session->userdata('userdetails'))
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
	public function changepassword()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			      $this->load->view('html/header');
	              $this->load->view('html/sidebar');
				 $this->load->view('html/changepassword');
				$this->load->view('html/footer');
			
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('agent');
		}
	}
	
	public function changepasswordpost(){
	 
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			$post=$this->input->post();
			$admin_details = $this->Agent_model->get_adminpassword_details($admindetails['a_id']);
			if($admin_details['a_password']== md5($post['oldpassword'])){
				if(md5($post['password'])==md5($post['confirmpassword'])){
						$updateuserdata=array(
						'a_password'=>md5($post['confirmpassword']),
						'a_org_password'=>$post['confirmpassword'],
						'a_updated_at'=>date('Y-m-d H:i:s'),
						);
						//echo '<pre>';print_r($updateuserdata);exit;
						$upddateuser = $this->Agent_model->update_admin_details($admindetails['a_id'],$updateuserdata);
						if(count($upddateuser)>0){
							$this->session->set_flashdata('success',"password successfully updated");
							redirect('agent');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('agent');
						}
					
				}else{
					$this->session->set_flashdata('error',"Password and Confirm password are not matched");
					redirect('agent/changepassword');
				}
				
			}else{
				$this->session->set_flashdata('error',"Old password are not matched");
				redirect('agent/changepassword');
			}
				
			
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
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
	
	public function view()
	{
		
    $b_id=base64_decode($this->uri->segment(3));
	$data['app_appointment_view_list']=$this->Agent_model->get_app_appointment_view_list(base64_decode($this->uri->segment(3)));
	//echo '<pre>';print_r($data);exit;
	$this->load->view('html/header');
	$this->load->view('html/sidebar');
	$this->load->view('agent/view-patient',$data);
	$this->load->view('html/footer');
   
					
   }
	
	public function patientlist()
	{	
	
	$data['app_appointment_patient_history']=$this->Agent_model->get_app_appointment_patient_history();
	$this->load->view('html/header');
	$this->load->view('html/sidebar');
	$this->load->view('agent/patient-history',$data);
	$this->load->view('html/footer');
				
	}
	public function finalappointment()
	{
	$data['app_appointment_accept_list']=$this->Agent_model->get_app_appointment_accept_list();
	//echo '<pre>';print_r($data);exit; 
		
	
	$this->load->view('html/header');
	$this->load->view('html/sidebar');
	$this->load->view('agent/final-app-list',$data);
	$this->load->view('html/footer');
	
	}
	public function status()
	{	
		
					$b_id=base64_decode($this->uri->segment(3));
					$event_status=base64_decode($this->uri->segment(4));
					if($event_status==1){
						$statu=2;
					}else{
						$statu=1;
					}
					if($b_id!=''){
						$stusdetails=array(
							'event_status'=>$statu,
							'create_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Agent_model->update_final_app_list_details($b_id,$stusdetails);
							//echo'<pre>';print_r($statusdata);exit;
							//echo $this->db->last_query();exit;	
							if(count($statusdata)>0){
								if($event_status==1){
								$this->session->set_flashdata('success',"Patient history successfully Not Received.");
								}else{
									$this->session->set_flashdata('success',"Patient history successfully Received.");
								}
								redirect('agent/finalappointment/');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('agent/finalappointment/');
							}
					
		
	      }
	}
	
	
	public function logout()
	{
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
