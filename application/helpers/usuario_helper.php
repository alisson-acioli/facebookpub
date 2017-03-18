<?php
function usuario($column){

    $_this =& get_instance();

    if($_this->session->has_userdata('userid')){

        $id = $_this->session->userdata('userid');

        $_this->db->where('id', $id);
        $query = $_this->db->get('usuarios');

        if($query->num_rows() > 0){

            $row = $query->row();

            return $row->$column;
        }else{
            return 'Não encontrado';
        }
    }else{

        return 'Não encontrado';
    }
}

function checksession(){

    $_this =& get_instance();

    if(!$_this->session->has_userdata('userid')){

        redirect('login');
        exit;
    }
}
?>