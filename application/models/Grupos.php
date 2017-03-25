<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Grupos extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function TodosGrupos(){

        $userid = $this->session->userdata('userid');
        $groups = array();

        $this->db->where('id_user', $userid);
        $this->db->where('status', 1);
        $queryGroups = $this->db->get('grupos');

        if($queryGroups->num_rows() > 0){

            foreach($queryGroups->result() as $result){

                $groups[] = array('group'=>$this->facebook->NameGroup($result->group_id), 'group_id'=>$result->group_id);
            }

        }

        return $groups;
    }

    public function SalvaGrupo(){

        $groups = $this->input->post('groups');
        $userid = $this->session->userdata('userid');

        $this->db->where('id_user', $userid);
        $this->db->update('grupos', array('status'=>0));

        if(!empty($groups)){

            foreach($groups as $group){

                $this->db->where('group_id', $group);
                $this->db->where('id_user', $userid);
                $queryGroups = $this->db->get('grupos');

                if($queryGroups->num_rows() > 0){

                    $this->db->where('id_user', $userid);
                    $this->db->where('group_id', $group);
                    $this->db->update('grupos', array('status'=>1));

                }else{

                    $this->db->insert('grupos', array('id_user'=>$userid, 'group_id'=>$group, 'status'=>1));
                }
            }
        }
    }
}
?>