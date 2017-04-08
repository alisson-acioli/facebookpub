<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

if(!is_null(website_config('timezone'))){
    date_default_timezone_set(website_config('timezone'));
}

class Perfils extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function TodosPerfils($todos = false){

        $userid = $this->session->userdata('userid');
        $perfils = array();

        $this->db->where('id_user', $userid);
        if(!$todos){
            $this->db->where('status', 1);
        }
        $queryPerfils = $this->db->get('usuarios_perfils');

        if($queryPerfils->num_rows() > 0){

            foreach($queryPerfils->result() as $result){

                $perfils[] = array('perfil'=>$this->facebook->getNameProfile($result->id_conta), 'perfil_id'=>$result->id_conta, 'status'=>$result->status);
            }

        }

        return $perfils;
    }

    public function SalvaPerfil(){

        $perfils = $this->input->post('perfils');
        $userid = $this->session->userdata('userid');

        $this->db->where('id_user', $userid);
        $this->db->update('usuarios_perfils', array('status'=>0));

        if(!empty($perfils)){

            foreach($perfils as $perfil){

                $this->db->where('id_conta', $perfil);
                $this->db->where('id_user', $userid);
                $queryPerfil = $this->db->get('usuarios_perfils');

                if($queryPerfil->num_rows() > 0){

                    $this->db->where('id_user', $userid);
                    $this->db->where('id_conta', $perfil);
                    $this->db->update('usuarios_perfils', array('status'=>1));

                }else{

                    $this->db->insert('usuarios_perfils', array('id_user'=>$userid, 'id_conta'=>$perfil, 'status'=>1));
                }
            }
        }
    }
}
?>