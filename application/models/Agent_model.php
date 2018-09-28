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
	
	public  function get_app_appointment_list(){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->where('appointment_bidding_list.status !=',2);
		return $this->db->get()->result_array();
	}
	
	
		public function get_app_appointment_view_list($b_id){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
	   $this->db->where('appointment_bidding_list.b_id',$b_id);
		return $this->db->get()->row_array();
	}
	
	
	public function get_app_appointment_patient_history(){
	$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
	    $this->db->where('appointment_bidding_list.status',1);
	    return $this->db->get()->result_array();
	}
	
	public function get_app_appointment_accept_list(){
	$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
	    $this->db->where('appointment_bidding_list.status',1);
	    return $this->db->get()->result_array();
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
	
	
	
	
}