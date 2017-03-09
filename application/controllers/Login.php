<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('loginmodel', 'LoginModel');
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
