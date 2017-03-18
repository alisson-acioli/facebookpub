<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Cron extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cronjobs');
    }

    public function post(){

        $this->cronjobs->FazerPostagem();
    }

    public function relatorio_curtidas(){
        $this->cronjobs->VerificarCurtidasPaginas();
    }
}