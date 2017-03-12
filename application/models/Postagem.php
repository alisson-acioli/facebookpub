<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Postagem extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function TodasProgramacoes(){

        $userid = $this->session->userdata('userid');

        $this->db->order_by('data_criacao', 'DESC');
        $this->db->where('id_user', $userid);
        $programacoes = $this->db->get('programacoes');

        if($programacoes->num_rows() > 0){

            return $programacoes->result();
        }

        return false;
    }
}
?>