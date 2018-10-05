<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_agent_details($e_id){
		$this->db->select('executive_list.e_id,executive_list.email_id')->from('executive_list');		
		$this->db->where('e_id', $e_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	
	}
	public function login_details($data){
		$sql = "SELECT * FROM executive_list WHERE (email_id ='".$data['email_id']."' AND password='".$data['password']."' AND status=1)";
		return $this->db->query($sql)->row_array();	
	}
	public function email_check_details($email_id){
		$sql = "SELECT * FROM executive_list WHERE email_id ='".$email_id."'";
		return $this->db->query($sql)->row_array();	
	}
	
	public function update_login_details($e_id,$data){
		$this->db->where('e_id',$e_id);
    	return $this->db->update("executive_list",$data);
	}
	
	public  function check_email_exits($email_id){
		$this->db->select('*')->from('executive_list');
		$this->db->where('email_id',$email_id);
		$this->db->where('status !=',2);
		return $this->db->get()->row_array();
	}
	
	
	
	
	
	
	
	public function update_final_app_list_details($b_id,$data){
		$this->db->where('b_id',$b_id);
		return $this->db->update('appointment_bidding_list',$data);
	}
	
	
	 public function executive_list_data(){
		$this->db->select('executive_list.*')->from('executive_list');
		$this->db->where('executive_list.status !=',2);
        return $this->db->get()->result_array();
	}
	
	public function get_adminpassword_details($e_id){
		$this->db->select('executive_list.e_id,executive_list.password')->from('executive_list');
		$this->db->where('e_id', $e_id);
		$this->db->where('status', 1);
		return $this->db->get()->row_array();	
	}
	
	public function update_admin_details($e_id,$data){
		$this->db->where('e_id',$e_id);
    	return $this->db->update("executive_list",$data);
	}
	
	public function get_agent_profile_details_data($e_id){
	$this->db->select('*')->from('executive_list');
		$this->db->where('e_id', $e_id);
		return $this->db->get()->row_array();	
	}
	
	public function get_admin_details_data($e_id){
		$this->db->select('*')->from('executive_list');
		$this->db->where('e_id', $e_id);
		return $this->db->get()->row_array();	
	}
	public function update_agent_details($e_id,$data){
		$this->db->where('e_id',$e_id);
    	return $this->db->update("executive_list",$data);
	}
	
	public function get_all_agent_details($e_id){
		$this->db->select('executive_list.e_id,executive_list.email_id,executive_list.name,executive_list.profile_pic')->from('executive_list');		
		$this->db->where('e_id', $e_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	
	}
	public function executive_list_data_row_login_details(){
	$this->db->select('executive_list.*')->from('executive_list');
		$this->db->where('executive_list.status !=',2);
        return $this->db->get()->row_array();
	}
	
	public function get_all_agent_details_location($e_id){
	$this->db->select('executive_list.*')->from('executive_list');		
		$this->db->where('e_id', $e_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	 
	}
	public function get_basic_agent_details_location($e_id){
	$this->db->select('location,e_id')->from('executive_list');		
		$this->db->where('e_id', $e_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	 
	}
	public  function appointment_list(){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->where('appointment_bidding_list.status !=',2);
		return $this->db->get()->result_array();
	}
	
	public function location_wise_list(){
		$this->db->select('*')->from('appointment_bidding_list');
		$this->db->where('appointment_bidding_list.status !=',2);
		return $this->db->get()->result_array();
	}
	
	
	
	
	
	/* patient  list purposer*/
	public  function get_app_appointment_list(){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->where('appointment_bidding_list.status !=',2);
		return $this->db->get()->result_array();
	}
	
	
	
	public function get_app_appointment_view_list($b_id){
		$this->db->select('appointment_bidding_list.city,appointment_bidding_list.b_id,appointment_bidding_list.hos_id,appointment_bidding_list.department,appointment_bidding_list.specialist,appointment_bidding_list.patinet_name,appointment_bidding_list.mobile,appointment_bidding_list.date,appointment_bidding_list.time,treament.t_name,specialist.specialist_name,appointment_bidding_list.create_by,appointment_bidding_list.status')->from('appointment_bidding_list');
		//$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
	   $this->db->where('appointment_bidding_list.b_id',$b_id);
		$return=$this->db->get()->row_array();

		$lists=$this->get_hospital_names_with_id($b_id,$return['city']);
			//echo '<pre>';print_r($lists);exit;
		$data=$return;
		$data['hospital_list']=$lists;
		if(!empty($data)){
			
			return $data;
			
		}
		
	}
	
	public  function get_hospital_names_with_id($b_id,$city){
		$this->db->select('hospital.hos_bas_name,appointment_bidding_list.status')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->where('appointment_bidding_list.b_id',$b_id);
		$this->db->where('appointment_bidding_list.city',$city);
		return $this->db->get()->result_array();
	}
	
	
	
	public  function get_location_wise_patient_list($location){
		$this->db->select('appointment_bidding_list.b_id,appointment_bidding_list.hos_id,appointment_bidding_list.department,appointment_bidding_list.specialist,appointment_bidding_list.patinet_name,appointment_bidding_list.mobile,appointment_bidding_list.date,appointment_bidding_list.time,treament.t_name,specialist.specialist_name,appointment_bidding_list.create_by')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		
		$this->db->where('appointment_bidding_list.city',$location);
		$this->db->group_by('appointment_bidding_list.patinet_name');
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$lists=$this->get_hospital_names($list['patinet_name'],$location);
			//echo '<pre>';print_r($lists);exit;
			$data[$list['b_id']]=$list;
			$data[$list['b_id']]['hospital_list']=$lists;
			
		}
		
		if(!empty($data)){
			
			return $data;
			
		}
	}
	
	
	public  function get_hospital_names($name,$loca){
		$this->db->select('hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->where('appointment_bidding_list.patinet_name',$name);
		$this->db->where('appointment_bidding_list.city',$loca);
		return $this->db->get()->result_array();
	}
	/* patient  list purposer*/
		
	
	
	public function get_app_appointment_accept_list(){
   $this->db->select('appointments.*,appointment_bidding_list.create_by')->from('appointments');
		$this->db->join('appointment_bidding_list', 'appointment_bidding_list.b_id = appointments.create_by', 'left');
		
		$this->db->group_by('appointments.patinet_name');
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$lists=$this->get_app_names($list['patinet_name']);
			//echo '<pre>';print_r($lists);exit;
			$data[$list['id']]=$list;
			$data[$list['id']]['hospital_list']=$lists;
			
		}
		
		if(!empty($data)){
			
			return $data;
			
		}
	}
	
	
	public  function get_app_names($name){
		$this->db->select('hospital.hos_bas_name')->from('appointments');
		$this->db->join('treament', 'treament.t_id = appointments.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointments.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointments.hos_id', 'left');
		$this->db->where('appointments.patinet_name',$name);
		
		return $this->db->get()->result_array();
	}
	
	
	
	public function get_appointment_list($b_id)
	{
	$this->db->select('appointment_bidding_list.b_id,appointment_bidding_list.create_by')->from('appointment_bidding_list');
	//$this->db->where('appointment_bidding_list.b_id',$b_id);
	$this->db->where('appointment_bidding_list.status',1);
		return $this->db->get()->row_array();
	}
	
	public function get_appointment_list_data_patient($create_by){
	$this->db->select('appointments.id,appointments.hos_id,appointments.department,appointments.specialist,appointments.patinet_name,appointments.mobile,appointments.status,appointments.date,appointments.time,treament.t_name,hospital.hos_bas_name,specialist.specialist_name,appointments.create_by')->from('appointments');
	$this->db->join('treament', 'treament.t_id = appointments.department', 'left');
	$this->db->join('specialist', 'specialist.s_id = appointments.specialist', 'left');
	$this->db->join('hospital', 'hospital.hos_id = appointments.hos_id', 'left');
	$this->db->join('appointment_bidding_list', 'appointment_bidding_list.b_id = appointments.create_by', 'left');
	$this->db->where('appointments.create_by',$create_by);
	$this->db->where('appointments.status',1);
	$this->db->where('appointments.create_by',$create_by);
	return $this->db->get()->result_array();
	}
	
	
	public function get_app_appointment_patient_history($create_by){
	$this->db->select('appointments.id,appointments.hos_id,appointments.department,appointments.specialist,appointments.patinet_name,appointments.mobile,appointments.status,appointments.date,appointments.time,treament.t_name,hospital.hos_bas_name,specialist.specialist_name,appointments.create_by')->from('appointments');
	$this->db->join('treament', 'treament.t_id = appointments.department', 'left');
	$this->db->join('specialist', 'specialist.s_id = appointments.specialist', 'left');
	$this->db->join('hospital', 'hospital.hos_id = appointments.hos_id', 'left');
	$this->db->join('appointment_bidding_list', 'appointment_bidding_list.b_id = appointments.create_by', 'left');
	$this->db->where('appointments.create_by',$create_by);
	$this->db->where('appointments.status',1);
	$this->db->where('appointments.patient_id !=',0);
	$this->db->where('appointments.create_by',$create_by);
	return $this->db->get()->result_array();
	}
	
	
	
		
	
  }