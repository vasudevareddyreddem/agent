<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Agent_model');
		$this->load->library('session');
	    if($this->session->userdata('userdetails'))
			{
			$admindetails=$this->session->userdata('userdetails');
			$data['userdetails']=$this->Agent_model->get_all_agent_details($admindetails['e_id']);
			//echo'<pre>';print_r($data['userdetails']);exit;
			
			$this->load->view('html/header',$data);
			$this->load->view('html/sidebar',$data);
			}
		
	
  }

	public function index()
	{	
		if(!$this->session->userdata('userdetails'))
		{
			 $data['executive_list']=$this->Agent_model->executive_list_data();
				//echo'<pre>';print_r($data);exit;
			$this->load->view('html/login',$data);
			
		}else{
			
			redirect('agent/patient/');
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
			$login_deta=array('email_id'=>$post['email_id'],'password'=>md5($post['password']));
			//echo '<pre>';print_r($login_deta);exit;
			$check_login=$this->Agent_model->login_details($login_deta);
			//echo '<pre>';print_r($check_login);exit;
				$this->load->helper('cookie');

				if(count($check_login)>0){
				$login_details=$this->Agent_model->get_agent_details($check_login['e_id']);
				//echo '<pre>';print_r($login_details);exit;
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
			$this->load->view('html/forgotpasword');

		}else{
			redirect('agent');
		}
	}
	
	public function forgotpost(){
		$post=$this->input->post();
		$check_email=$this->Agent_model->check_email_exits($post['email_id']);
		//echo'<pre>';print_r($check_email);exit;
			if(count($check_email)>0){
				
				$data['details']=$check_email;
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->from($post['email_id']);
				$this->email->to('admin@grfpublishers.org');
				$this->email->subject('forgot - password');
				$body = $this->load->view('email/forgot',$data,TRUE);
				$this->email->message($body);
				//echo print_r($body);exit;
				$this->email->send();
				$this->session->set_flashdata('success','Check Your Email to reset your password!');
				redirect('agent');

			}else{
				$this->session->set_flashdata('error','The email you entered is not a registered email. Please try again. ');
				redirect('agent');	
			}
		
	}
	
	public function view()
	{
		
      $p_id=base64_decode($this->uri->segment(3));
      $location=base64_decode($this->uri->segment(4));

	$data['app_appointment_view_list']=$this->Agent_model->get_app_appointment_view_list($p_id,$location);
    //echo '<pre>';print_r($data);exit;
	$this->load->view('html/header');
	$this->load->view('agent/view-patient',$data);
	$this->load->view('html/footer');
   
					
   }
	
	
	public function patient()
	{	
	
	 if($this->session->userdata('userdetails'))
			{
	$admindetails=$this->session->userdata('userdetails');
	$user_details=$this->Agent_model->get_basic_agent_details_location($admindetails['e_id']);
	$data['location_wise_list']=$this->Agent_model->get_location_wise_patient_list($user_details['location']);
		
   //echo'<pre>';print_r($data);exit;
	
	
	$data['app_appointment_list']=$this->Agent_model->get_app_appointment_list();	
		//echo'<pre>';print_r($data);exit;
	$this->load->view('html/header');
	$this->load->view('agent/patient-list',$data);
	$this->load->view('html/footer');
			
	 }
	}
	public function patientlist()
	{
	 if($this->session->userdata('userdetails'))
			{
	$admindetails=$this->session->userdata('userdetails');	
	$app=$this->Agent_model->get_appointment_list($admindetails);
		//echo'<pre>';print_r($app);exit;
    $data['app_appointment_patient_history']=$this->Agent_model->get_app_appointment_patient_history($app['create_by']);
	//echo'<pre>';print_r($data['app_appointment_patient_history']);exit;
	
	
	$data['patient_history']=$this->Agent_model->patient_history_list();
	//echo'<pre>';print_r($data['patient_history']);exit;
	
	
	
	$this->load->view('html/header');
	
	$this->load->view('agent/patient-history',$data);
	$this->load->view('html/footer');
				
	}
	}
	public function finalappointment()
	{
		
	 if($this->session->userdata('userdetails'))
			{
	$admindetails=$this->session->userdata('userdetails');
	$user_details=$this->Agent_model->get_basic_agent_details_location($admindetails['e_id']);
	
    $data['appointments']=$this->Agent_model->get_appointment_list_data_patient($user_details['location']);
	//echo'<pre>';print_r($data);exit;
	
	
	
	$this->load->view('html/header');
	
	$this->load->view('agent/final-app-list',$data);
	$this->load->view('html/footer');
	
	}
	
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
	public function changepassword()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			      $this->load->view('html/header');
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
			$admin= $this->Agent_model->get_adminpassword_details($admindetails['e_id']);
			//echo'<pre>';print_r($admin);exit;
			if($admin['password']== md5($post['oldpassword'])){
				if(md5($post['password'])==md5($post['confirmpassword'])){
						$updateuserdata=array(
						'password'=>md5($post['confirmpassword']),
						'org_password'=>$post['confirmpassword'],
						'updated_at'=>date('Y-m-d H:i:s'),
						);
						//echo '<pre>';print_r($updateuserdata);exit;
						$upload= $this->Agent_model->update_admin_details($admindetails['e_id'],$updateuserdata);
						//echo '<pre>';print_r($upload);exit;
						if(count($upload)>0){
							$this->session->set_flashdata('success',"password successfully updated");
							redirect('agent/changepassword');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('agent/changepassword');
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
	
	public function profile()
	{	
		
	$admindetails=$this->session->userdata('userdetails');
	$data['agent_detail']= $this->Agent_model->get_agent_profile_details_data($admindetails['e_id']);
	//echo '<pre>';print_r($data);exit;
	 $this->load->view('html/header');
	$this->load->view('agent/profileview',$data);				
	 $this->load->view('html/footer');				
					
	
	}
	
	public function edit()
	{
		if($this->session->userdata('userdetails'))
		{
				
					$admindetails=$this->session->userdata('userdetails');
					$data['agent_detail']= $this->Agent_model->get_agent_profile_details_data($admindetails['e_id']);
	                //echo '<pre>';print_r($data);exit;
					 $this->load->view('html/header');
	                  
					$this->load->view('agent/profileedit',$data);
					$this->load->view('html/footer');
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('agent');
		}
	}
	public function editpost()
	{
		if($this->session->userdata('userdetails'))
		{
				
					$admindetails=$this->session->userdata('userdetails');
					$post=$this->input->post();
					$agent_detail= $this->Agent_model->get_admin_details_data($admindetails['e_id']);
					//echo'<pre>';print_r($agent_detail);exit;
					
					if($agent_detail['email_id']!= $post['email_id']){
						$emailcheck= $this->Agent_model->check_email_exits($post['email_id']);
						//echo'<pre>';print_r($emailcheck);exit;
					
								if(count($emailcheck)>0){
									$this->session->set_flashdata('error','Email id already exists.please use another Email id');
									redirect('agent/edit/'.base64_encode($admindetails['e_id']));
								}
								}	
								
								if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
										unlink("assets/adminprofilepic/".$agent_detail['profile_pic']);
										$temp = explode(".", $_FILES["profile_pic"]["name"]);
										$img = round(microtime(true)) . '.' . end($temp);
										move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/adminprofilepic/" . $img);
										}else{
										$img=$agent_detail['profile_pic'];
										}
									$details=array(
									'email_id'=>$post['email_id'],
									'name'=>$post['name'],
									'mobile'=>$post['mobile_number'],
									'profile_pic'=>$img
									);
									//echo'<pre>';print_r($details);exit;
									
									
								$update= $this->Agent_model->update_agent_details($admindetails['e_id'],$details);
								//echo'<pre>';print_r($update);exit;
								if(count($update)>0){
										$this->session->set_flashdata('success',"Profile details successfully updated.");
										redirect('agent/profile');
									}else{
											$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
											redirect('agent/edit/'.base64_encode($admindetails['e_id']));
									}
								}
					
	
	
		}

	
	
	public function logout()
	{
		$admindetails=$this->session->userdata('userdetails');
		$up_details=array('e_id'=>0);
		$update=$this->Agent_model->update_login_details($admindetails['a_id'],$up_details);
		$userinfo = $this->session->userdata('userdetails');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect('agent');
	}
	
	
  }

?>
