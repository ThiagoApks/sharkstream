<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function view($page = 'index')
	{
		$this->config->load('sharkstream');
		if ( ! file_exists(APPPATH.'views/frontend/pages/'.$page.'.php'))
		{
			show_404();
		} else {
			$page_data['page_name']		=	$page;
			$page_data['page_title']	=	ucfirst($page);
			$this->load->view('frontend/index', $page_data);
		}
	}
	public function panelview($page = 'index')
	{
		$this->config->load('sharkstream');
		if ( ! file_exists(APPPATH.'views/frontend/panel/pages/'.$page.'.php'))
		{
			$page_data['page_name']		=	"404";
			$page_data['page_title']	=	"Erro 404";
			$this->load->view('frontend/panel/index', $page_data);
		} else {
			$page_data['page_name']		=	$page;
			$page_data['page_title']	=	ucfirst($page);
			$this->load->view('frontend/panel/index', $page_data);
		}
	}
	public function login()
	{
		$this->crud_model->Check_Active_Login();
		$this->crud_model->is_ajax();
		header('Access-Control-Allow-Origin: *');

		header('Access-Control-Allow-Methods: GET, POST');

		header("Access-Control-Allow-Headers: X-Requested-With");
		if(isset($_POST['email']) && isset($_POST['password']))
		{
			$email = $this->input->post('email'); # add this		
			$passw = $this->input->post('password'); # add this			
		}
		$finalpass = strtoupper(hash('sha256', $passw.'4BCD3FG@BYM4RIn3tH14g0C0w'));
		
		if($this->crud_model->signin($email, $finalpass))
		{
			echo 'success';
		}
		else
		{
			echo 'fail';
		}
	}
	public function register() {
		$this->crud_model->Check_Active_Login();
		if(isset($_POST['email']) && isset($_POST['password']) )
		{
			$signup_result = $this->crud_model->signup_user();
			if ($signup_result == true){
				echo "success";
			}
			else if ($signup_result == false){
				echo "failed";
			}
		}
	}
	function signout()
	{
		$this->crud_model->Check_Inactive_Login();

		$this->session->set_userdata('user_login_status', '');
		$this->session->set_userdata('user_id', '');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
}
