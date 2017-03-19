<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Linguagem extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index($lang = 'pt-br'){

        $ref = $this->input->get('ref');

        $this->session->set_userdata('lingua', $lang);

        redirect($ref);
    }
}
