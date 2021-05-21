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
			if($row->role < 1) return false;
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
		if($this->session->userdata('user_login_status'))
			redirect(base_url(), 'refresh');
	}
	function Check_Inactive_Login()
	{
		if(!$this->session->userdata('user_login_status'))
			redirect(base_url(), 'refresh');
	}

	function Check_Active_LoginEx()
	{
		if($this->session->userdata('user_login_status'))
			return true;
		else return false;
	}
	function Check_Inactive_LoginEx()
	{
		if(!$this->session->userdata('user_login_status'))
			return 1;
		else
			return 0;
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
		$user_detail=	$this->db->	get_where('usuarios', array('id'=>$user_id))->row();
		return $user_detail;
	}
	function getRoleName($role_type)
	{
		switch ($role_type) {
			case 2:
			$role = "Administrador";
			break;

			case 1:
			$role = "Revendedor";
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

	// contar
	function countClientes($revendedor = null)
	{
		if($revendedor == null)
			$query = $this->db->get('usuarios');
		else 
			$query = $this->db->get_where('usuarios', array('revendedor_id'=>$revendedor));
		return $query->num_rows();
	}
	function countRevendedores()
	{
		$query = $this->db->get_where('usuarios', array('role'=>1));
		return $query->num_rows();
	}
	function countAdmins()
	{
		$query = $this->db->get_where('usuarios', array('role'=>2));
		return $query->num_rows();
	}
	function countCategorias()
	{
		$query = $this->db->get('categorias');
		return $query->num_rows();
	}
	function countLinks()
	{
		$query = $this->db->get('links');
		return $query->num_rows();
	}
	function countListas()
	{
		$query = $this->db->get('listas');
		return $query->num_rows();
	}

	// listar os negocios
	function getUltimosLinks()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('links', 5);
		return $query->result_array();
	}
	function getUltimasCategorias()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('categorias', 5);
		return $query->result_array();
	}

	function getCategorias()
	{
		$this->db->order_by('nomecategoria', 'ASC');
		$query = $this->db->get('categorias');
		return $query->result_array();
	}

	function getAcessos($usuario)
	{
		$this->db->order_by('acesso_expira', 'DESC');
		$query = $this->db->get_where('lista_acessos', array('id_usuario'=>$usuario));
		return $query->result_array();
	}

	function checkCliente($id)
	{
		$query = $this->db->get_where('usuarios', array('id'=>$id,'revendedor_id'=>$this->crud_model->getUserInfo()->id));
		return $query->num_rows();
	}

	function getUsuarios($revendedor = null)
	{
		if($revendedor == null)
			$query = $this->db->get('usuarios');
		else 
			$query = $this->db->get_where('usuarios', array('revendedor_id'=>$revendedor));
		return $query->result_array();
	}

	function getLinks()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('links');
		return $query->result_array();
	}

	function getListas()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('listas');
		return $query->result_array();
	}

	function getLinksCategoria($cat)
	{
		$this->db->select('*');
		$this->db->from('links');
		$this->db->join('categorias', 'links.categoria = categorias.id AND links.categoria = '.$cat);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getLinksLista($idlista)
	{
		$this->db->select('*');
		$this->db->from('listas_categorias');
		$this->db->join('listas', 'listas.id = listas_categorias.id_lista AND listas.id = '.$idlista);
		$query = $this->db->get();
		return $query->result_array();
	}

	function checkCategoriaLista($idlista, $idcategoria)
	{
		$query = $this->db->get_where('listas_categorias', array('id_categoria='=>$idcategoria, 'id_lista'=>$idlista));
		return $query->num_rows();
	}

	// get info dos negocios
	function getListaInfo($id)
	{
		$query = $this->db->get_where('listas', array('id'=>$id));
		return $query->row();
	}
	function getLinkInfo($id)
	{
		$query = $this->db->get_where('links', array('id'=>$id));
		return $query->row();
	}

	function getCatInfo($id)
	{
		$query = $this->db->get_where('categorias', array('id'=>$id));
		return $query->row();
	}

	function getRole()
	{
		$info = $this->crud_model->getUserInfo();
		return $info->role;
	}

	//Adicionar
	// adicionar link
	function addLink($nome, $logo, $link, $categoria)
	{
		$data['nome'] = $nome;
		$data['logo'] = $logo;
		$data['link'] = $link;
		$data['categoria'] = $categoria;
		if($this->db->insert('links' , $data))
			return true;
	}
	function updateLink($id, $nome, $logo, $link, $categoria)
	{
		$data['nome'] = $nome;
		$data['logo'] = $logo;
		$data['link'] = $link;
		$data['categoria'] = $categoria;
		$this->db->where('id', $id);
		if($this->db->update('links' , $data))
			return true;
	}
	// adicionar link
	function addLista($nome)
	{
		$data['nome'] = $nome;
		if($this->db->insert('listas' , $data))
			return true;
	}
	function updateLista($id, $nome)
	{
		$data['nome'] = $nome;
		$this->db->where('id', $id);
		if($this->db->update('listas' , $data))
			return true;
	}
	// adicionar categoria
	function addCate($nome)
	{
		$data['nomecategoria'] = $nome;
		if($this->db->insert('categorias' , $data))
			return true;
	}
	function updateCate($id, $nome)
	{
		$data['nomecategoria'] = $nome;
		$this->db->where('id', $id);
		if($this->db->update('categorias' , $data))
			return true;
	}
	// adicionar categoria
	function addUsuario($emailuser, $senha, $nameuser, $cargo)
	{
		$data['email'] = $emailuser;
		$data['password'] = $senha;
		$data['name'] = $nameuser;
		$data['role'] = $cargo;
		$data['revendedor_id'] = $this->crud_model->getUserInfo()->id;
		if($this->db->insert('usuarios' , $data))
			return true;
	}
	function updateUsuario($id, $emailuser, $nameuser, $cargo, $senha = " ")
	{
		$data['name'] = $nameuser;
		$data['email'] = $emailuser;
		$data['role'] = $cargo;
		if($senha !== " ")
			$data['password'] = strtoupper(hash('sha256', $senha.'4BCD3FG@BYM4RIn3tH14g0C0w'));
		$this->db->where('id', $id);
		if($this->db->update('usuarios' , $data))
			return true;
	}

	function isLocal(){
		if ((isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))) {
			if (strtolower(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST)) != strtolower($_SERVER['HTTP_HOST'])) {
				return false;
			} else {
				return true;
			}
		}
	}

	// cors
	function cors() {
		if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');
		}

		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
				header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
				header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

			exit(0);
		}
	}
}
