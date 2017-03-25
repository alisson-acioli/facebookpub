<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Cron extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cronjobs');
    }

    public function posts(){

        $this->cronjobs->FazerPostagem();
    }

    public function likes_page(){
        $this->cronjobs->VerificarCurtidasPaginas();
    }

    public function pages_manager(){
        $this->cronjobs->ProprietarioPagina();
    }

    public function groups_manager(){
        $this->cronjobs->ProprietarioGrupo();
    }
}