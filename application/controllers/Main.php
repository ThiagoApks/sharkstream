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
	public function playlist($acesso = null)
	{
		if($acesso == null)
			exit("Acesso negado");
		$buscar = $this->db->get_where("lista_acessos", array('token' => $acesso));
		if($buscar->num_rows() == 0) {
			exit("Acesso negado");
		}
		else {
			$expiracao = date_range(now(), $buscar->row()->acesso_expira);
			echo "################################### SharkStream v1.0 ###################################";
			echo "#";
			echo '#PLAYLISTV: pltv-logo="'.base_url("assets/logo_light.png").'" pltv-name="SharkStream" pltv-description="Canais de TV e filmes gratuitos" pltv-site="'.base_url().'""';
			echo "#";
			echo "#";
			echo "# Esta lista é particular e tem uma data de expiração. Não compartilhe-a com desconhecidos!";
			echo "# Data de expiração: ".$buscar->row()->acesso_expira."";
			if($expiracao != false)
				echo "# Expirará em: ".count($expiracao)." dias";
			else {
				echo "# Este acesso está expirado.";
				exit();
			}
			if(!$this->crud_model->getUserInfo($buscar->row()->id_usuario))
				exit();
			$userinfo = $this->crud_model->getUserInfo($buscar->row()->id_usuario);
			echo "# Lista gerada para: ".$userinfo->email."";
			echo "# Cliente: ".$userinfo->name."";
			echo "# Revendedor: ".$this->crud_model->getUserInfo($buscar->row()->gerado_por)->name."";
			if($expiracao == false) {
				for ($i=0; $i < 10; $i++)
				{
					echo '#EXTINF:0 tvg-logo="'.base_url('assets/logo_light.png').'" tvg-name="Expirado" group-title="Seu acesso expirou", Seu acesso expirou';
					echo "";
				}
				exit();
			}
			$lista = $this->crud_model->getLinksLista($buscar->row()->id_lista);
			foreach($lista as $sublist)
			{
				$links = $this->crud_model->getLinksCategoria($sublist['id_categoria']);
				foreach ($links as $row) {
					echo "#EXTM3U
#EXTINF:0 tvg-logo=".$row['logo']." group-title='".$this->crud_model->getCatInfo($row['categoria'])->nomecategoria."',  ".$row['nome']."
			".$row['link'];
				}
			}
		}
	}
	public function redirect($url = null) {
		$this->crud_model->cors();
		if ($url !== null) {
			header("Location: ".base64_decode($url));
		} else {
			show_404();
		}
	}
	public function ajaxlogin()
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
	function signout()
	{
		$this->crud_model->Check_Inactive_Login();

		$this->session->set_userdata('user_login_status', '');
		$this->session->set_userdata('user_id', '');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	// funcoes links 
	function add_link()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_POST['nomelink']) || !isset($_POST['logolink']) || !isset($_POST['link']))
			exit("Dados incompletos");
		if($this->crud_model->addLink($_POST['nomelink'], $_POST['logolink'], $_POST['link'], $_POST['categoria'])) {
			redirect(base_url("links"), "refresh");
		}
	}
	function update_link()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_POST['nomelink']) || !isset($_POST['idlink']) || !isset($_POST['logolink']) || !isset($_POST['link']))
			exit("Dados incompletos");
		if($this->crud_model->updateLink($_POST['idlink'], $_POST['nomelink'], $_POST['logolink'], $_POST['link'], $_POST['categoria'])) {
			redirect(base_url("links"), "refresh");
		}
	}
	function delete_link()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_GET['id']))
			exit("Dados incompletos");
		$this->db->delete('links', array('id' => $_GET['id']));
		redirect(base_url("links"), "refresh");
	}
	// funcoes categorias
	function add_cate()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_POST['nomecate']))
			exit("Dados incompletos");
		if($this->crud_model->addCate($_POST['nomecate'])) {
			redirect(base_url("categorias"), "refresh");
		}
	}
	function update_cate()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_POST['nomecate']))
			exit("Dados incompletos");
		if($this->crud_model->updateCate($_POST['idcate'], $_POST['nomecate'])) {
			redirect(base_url("edit_cat?id=".$_POST['idcate']), "refresh");
		}
	}
	function delete_cate()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_GET['id']))
			exit("Dados incompletos");
		$this->db->delete('categorias', array('id' => $_GET['id']));
		$this->db->delete('links', array('categoria' => $_GET['id']));
		$this->db->delete('listas_categorias', array('id_categoria' => $_GET['id']));
		redirect(base_url("categorias"), "refresh");
	}
	// funcoes categorias
	function add_lista()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_POST['nomelista']))
			exit("Dados incompletos");
		if($this->crud_model->addLista($_POST['nomelista'])) {
			redirect(base_url("listas"), "refresh");
		}
	}
	function update_lista()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_POST['nomelista']))
			exit("Dados incompletos");
		if($this->crud_model->updateCate($_POST['idlista'], $_POST['nomelista'])) {
			redirect(base_url("edit_lista?id=".$_POST['idlista']), "refresh");
		}
	}
	function delete_lista()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if(!isset($_GET['id']))
			exit("Dados incompletos");
		$this->db->delete('listas', array('id' => $_GET['id']));
		redirect(base_url("listas"), "refresh");
	}
	function add_categoria_lista()
	{
		if(!isset($_POST['idcategoria']) || !isset($_POST['idlista']))
			exit("Dados incompletos");
		$idcate = $_POST['idcategoria'];
		$idlista = $_POST['idlista'];
		$data['id_lista'] = $idlista;
		$data['id_categoria'] = $idcate;
		if($this->db->insert("listas_categorias", $data))
			redirect(base_url("edit_lista?id=".$idlista));
	}
	function remove_categoria_lista()
	{
		if(!isset($_POST['idcategoria']) || !isset($_POST['idlista']))
			exit("Dados incompletos");
		$idcate = $_POST['idcategoria'];
		$idlista = $_POST['idlista'];
		$data['id_lista'] = $idlista;
		$data['id_categoria'] = $idcate;
		if($this->db->delete("listas_categorias", $data))
			redirect(base_url("edit_lista?id=".$idlista));
	}
	// funcoes usuarios
	function add_usuario()
	{
		$this->crud_model->Check_Inactive_Login();
		if(!isset($_POST['nameuser']))
			exit("Dados incompletos");

		if($_POST['cargo'] > $this->crud_model->getUserInfo()->role)
			redirect(base_url(), "refresh");

		$senha = strtoupper(hash('sha256', $_POST['senhauser'].'4BCD3FG@BYM4RIn3tH14g0C0w'));
		if($this->crud_model->addUsuario($_POST['emailuser'], $senha, $_POST['nameuser'], $_POST['cargo'])) {
			redirect(base_url("usuarios"), "refresh");
		}
	}
	function update_usuario()
	{
		$this->crud_model->Check_Inactive_Login();
		if($this->crud_model->getUserInfo($_POST['iduser'])->role > $this->crud_model->getUserInfo()->role)
			redirect(base_url(), "refresh");
		if(!isset($_POST['nomeuser']))
			exit("Dados incompletos");
		if($this->crud_model->updateUsuario($_POST['iduser'], $_POST['emailuser'], $_POST['nomeuser'], $_POST['cargo'])) {
			redirect(base_url("edit_user?id=".$_POST['iduser']), "refresh");
		}
	}
	function delete_usuario()
	{
		$this->crud_model->Check_Inactive_Login();
		if(!isset($_GET['iduser']))
			exit("Dados incompletos");
		if($this->crud_model->checkCliente($_GET['iduser']) < 1 && $this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		if($this->crud_model->getUserInfo($_GET['iduser'])->role > $this->crud_model->getUserInfo()->role)
			redirect(base_url(), "refresh");
		$this->db->delete('usuarios', array('id' => $_GET['iduser']));
		$this->db->delete('lista_acessos', array('id_usuario' => $_GET['iduser']));
		redirect(base_url("usuarios"), "refresh");
	}
	function suspender_user() {
		$this->crud_model->Check_Inactive_Login();
		if(!isset($_GET['id']))
			exit("Dados incompletos");
		if($this->crud_model->checkCliente($_GET['id']) < 1 && $this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		$data['acesso_expira'] = unix_to_human(time());
		$this->db->where('idacesso', $_GET['id']);
		if($this->db->update('lista_acessos' , $data))
			redirect(base_url("usuarios"));
	}
	function gerarlinkuser() {
		$this->crud_model->Check_Inactive_Login();
		if(!isset($_POST['expiracao']) || !isset($_POST['listaid']) || !isset($_POST['iduser']))
			exit("Dados incompletos");
		$data['id_lista'] = $_POST['listaid'];
		if($this->crud_model->checkCliente($_POST['iduser']) < 1 && $this->crud_model->getRole() < 2)
			redirect(base_url(), "refresh");
		$data['acesso_expira'] = $_POST['expiracao'];
		$data['id_usuario'] = $_POST['iduser'];
		$data['gerado_por'] = $this->crud_model->getUserInfo()->id;
		$userinfo = $this->crud_model->getUserInfo($_POST['iduser']);
		$data['token'] = md5($userinfo->email.":".$userinfo->password.time());
		if($this->db->insert("lista_acessos", $data))
		{
			redirect(base_url("gerar_link_user?id=".$_POST['iduser']));
		} else {
			exit("Falha");
		}
	}
}
