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

    public function PostagensMes(){

        $userid = $this->session->userdata('userid');

        $mes = date('m');

        $query = $this->db->query("SELECT * FROM programacoes WHERE MONTH(data_programacao) = '".$mes."' AND status = '2' AND id_user = '".$userid."'");
        
        return $query->num_rows();
    }

    public function PostagensHoje(){

        $userid = $this->session->userdata('userid');
        
        $this->db->where('status != ', 4);
        $this->db->where('status != ', 3);
        $this->db->where('id_user', $userid);
        $this->db->where('data_programacao', date('Y-m-d'));

        $query = $this->db->get('programacoes');
        
        return $query->num_rows();
    }
}
?>