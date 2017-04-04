<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Politica extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->has_userdata('lingua')){
            $lang = $this->session->userdata('lingua');
        }else{
            $lang = 'pt-br';
        }

        $this->lang->load($lang, $lang);
    }

    public function index(){

        $this->load->view('politica_privacidade');
    }
}
