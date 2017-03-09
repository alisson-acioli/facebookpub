<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('login');
	}
}
