<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');
use \InfinityFree\MofhClient\Client;


class Crud_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function signin($email, $password) 
	{
		$credential = array('email' => $email, 'password' => $password);
		$query = $this->db->get_where('usuarios', $credential);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('user_login_status', '1');
			$this->session->set_userdata('user_id', $row->id);
			return true;
		}
		else {
			return false;
		}
	}	
	function signup_user() 
	{
		$data['email'] 		= strtolower($this->input->post('email'));
		$passw = $this->input->post('password'); 
		$data['name'] = $this->input->post('name');
		$data['password'] = strtoupper(hash('sha256', $passw.'4BCD3FG@BYM4RIn3tH14g0C0w'));
		
		$this->db->where('email' , $data['email']);
		$this->db->from('usuarios');
		$total_number_of_matching_user = $this->db->count_all_results();
		// validate if duplicate email exists
		if ($total_number_of_matching_user == 0) {
			$this->db->insert('usuarios' , $data);
			
			$this->signin($data['email'] , $data['password']);
			
			return true;
		}
		else {
			return false;
		}
		
	}
	function Check_Active_Login()
	{
		if($this->session->userdata('user_login_status') == 1)
			redirect(base_url(), 'refresh');
	}
	function Check_Inactive_Login()
	{
		if($this->session->userdata('user_login_status') != 1)
			redirect(base_url(), 'refresh');
	}

	function Check_Active_LoginEx()
	{
		if($this->session->userdata('user_login_status') == 1)
			return true;
		else return false;
	}
	function Check_Inactive_LoginEx()
	{
		if($this->session->userdata('user_login_status') != 1)
			return true;
		else return false;
	}
	function checkAdminRole()
	{
		$role = $this->crud_model->getUserInfo()->role;
		if($role <= 0)
			redirect(base_url(), 'refresh');
	}
	function getUserInfo($user_id = null)
	{
		if($user_id == null) $user_id = $this->session->userdata('user_id');
		$user_detail=	$this->db->get_where('usuarios', array('id'=>$user_id))->row();
		return $user_detail;
	}
	function getRoleName($role_type)
	{
		switch ($role_type) {
			case 1:
			$role = "Administrador";
			break;
			
			default:
			$role = "Membro";
			break;
		}
		return $role;
	}
	// only ajax request 
	function is_ajax() { 
		if (!$this->input->is_ajax_request()) { 
			exit('Nada de acessar nossos ajax, lindinho.'); 
		} 
	} 

	function getFWord($string)
	{
		$arr = explode(' ',trim($string));
		return $arr[0];
	}
	//
	
	function convertMinutes($time, $format = '%02dh, %02dm') {
		if ($time < 1) {
			return;
		}
		$hours = floor($time / 60);
		$minutes = ($time % 60);
		return sprintf($format, $hours, $minutes);
	}
	function getYear($date)
	{
		$date=date_create($date);
		return date_format($date, "Y");
	}
	
	function getImage($image, $quality = 500)
	{
		if(is_null($image)) {
			return base_url("assets/img/placeholder_poster.jpg");
		} else {
			return "https://image.tmdb.org/t/p/w".$quality.$image;
		}
	}
	function getBackdrop($image)
	{
		if(is_null($image)) {
			return base_url("assets/img/placeholder_backdrop.jpg");
		} else {
			return "https://image.tmdb.org/t/p/w1280".$image;
		}
	}
	function shortSinopse($string, $max=100)
	{
		if($max == -1) return $string;
		$tok=strtok($string,' ');
		$string='';
		while($tok!==false && strlen($string)<$max)
		{
			if (strlen($string)+strlen($tok)<=$max)
				$string.=$tok.' ';
			else
				break;
			$tok=strtok(' ');
		}
		return str_replace('"', "'", trim($string).'...');
	}
}
