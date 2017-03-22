<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Administracaomodel extends CI_Model{

    public function __construct(){
        parent::__construct();

        if($this->session->has_userdata('lingua')){
          $lang = $this->session->userdata('lingua');
        }else{
          $lang = website_config('linguagem');
          $this->session->set_userdata('lingua', $lang);
        }

        $this->lang->load($lang, $lang);
    }

    public function TodosUsuarios(){

        $this->db->order_by('nome', 'ASC');
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }

        return false;
    }
}
?>