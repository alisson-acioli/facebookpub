<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Conta extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $data['titulo'] = 'Página inicial';
        
        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/dashboard/index');
        $this->load->view('conta/templates/footer');
    }
}
