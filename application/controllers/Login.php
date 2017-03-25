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

	public function recover(){

		$data = array();

		$email = $this->input->get('email');
		$code = $this->input->get('code');

		if(empty($email)){
			$data['error'] = true;
			$data['message'] = '<div class="alert alert-danger text-center">'.$this->lang->line('email_invalido').'</div>';
		}elseif(empty($code)){
			$data['error'] = true;
			$data['message'] = '<div class="alert alert-danger text-center">'.$this->lang->line('codigo_invalido').'</div>';
		}

		if(!isset($data['error'])){

			$this->db->where('email', $email);
			$this->db->where('codigo', $code);
			$codigos = $this->db->get('codigos_recuperacao_senha');

			if($codigos->num_rows() > 0){

				$row = $codigos->row();

				if($row->expirado == 0){

					if($this->input->post('submit')){

						$data['message'] = $this->LoginModel->TrocaSenha($email);
					}

				}else{
					$data['error'] = true;
					$data['message'] = '<div class="alert alert-danger text-center">'.$this->lang->line('link_utilizado').'</div>';
				}

			}else{
				$data['error'] = true;
				$data['message'] = '<div class="alert alert-danger text-center">'.$this->lang->line('codigo_email_invalido').'</div>';
			}
		}

		$this->load->view('recover_password', $data);
	}
}
