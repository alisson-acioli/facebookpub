<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Paginas extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function SalvaPagina(){

        $pages = $this->input->post('pages');
        $userid = $this->session->userdata('userid');

        $this->db->where('id_user', $userid);
        $this->db->update('paginas', array('status'=>0));

        if(!empty($pages)){

            foreach($pages as $page){

                $this->db->where('id_page', $page);
                $this->db->where('id_user', $userid);
                $queryPages = $this->db->get('paginas');

                if($queryPages->num_rows() > 0){

                    $this->db->where('id_user', $userid);
                    $this->db->where('id_page', $page);
                    $this->db->update('paginas', array('status'=>1));

                }else{

                    $this->db->insert('paginas', array('id_user'=>$userid, 'id_page'=>$page, 'status'=>1));
                }
            }
        }
    }
}
?>