<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_agent_details($agent_id){
		$this->db->select('agent.a_id,agent.a_email_id')->from('agent');		
		$this->db->where('a_id', $agent_id);
		$this->db->where('a_status', 1);
        return $this->db->get()->row_array();	
	}
	public function login_details($data){
		$sql = "SELECT * FROM agent WHERE (a_email_id ='".$data['email']."' AND a_password='".$data['password']."' AND a_status=1) OR (a_username ='".$data['email']."' AND a_password='".$data['password']."' AND a_status=1)";
		return $this->db->query($sql)->row_array();	
	}
	public function email_check_details($email){
		$sql = "SELECT * FROM admin WHERE a_email_id ='".$email."'";
		return $this->db->query($sql)->row_array();	
	}
	
	public function update_login_details($a_id,$data){
		$this->db->where('a_id',$a_id);
    	return $this->db->update("hospital",$data);
	}
	
	public  function get_app_appointment_list(){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
		$this->db->where('appointment_bidding_list.status !=',2);
		return $this->db->get()->result_array();
	}
	 public function executive_list_data(){
		$this->db->select('executive_list.*')->from('executive_list');
		$this->db->where('executive_list.status !=',2);
        return $this->db->get()->result_array();
	}
	public  function get_appointment_list(){
		$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
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
	public function get_app_appointment_patient_history(){
	$this->db->select('appointment_bidding_list.*,treament.t_name,specialist.specialist_name,hospital.hos_bas_name')->from('appointment_bidding_list');
		$this->db->join('treament', 'treament.t_id = appointment_bidding_list.department', 'left');
		$this->db->join('specialist', 'specialist.s_id = appointment_bidding_list.specialist', 'left');
		$this->db->join('hospital', 'hospital.hos_id = appointment_bidding_list.hos_id', 'left');
	    $this->db->where('appointment_bidding_list.status',1);
	    return $this->db->get()->result_array();
	}
	
	
	
	
	
	
}