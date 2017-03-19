<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('loginmodel', 'LoginModel');

		if($this->session->has_userdata('lingua')){
			$lang = $this->session->userdata('lingua');
		}else{
			$lang = 'pt-br';
		}

		$this->lang->load($lang, $lang);
	}

	public function index(){

		$data = array();

		if($this->input->post('submitLogin')){

			$data['messageLogin'] = $this->LoginModel->Logar();
		}

		if($this->input->post('submitCadastrar')){

			$data['messageCadastrar'] = $this->LoginModel->Cadastrar();
		}

		$this->load->view('login', $data);
	}
}
