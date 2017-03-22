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
            return $_this->lang->line('nada_encontrado');
        }
    }else{

        return $_this->lang->line('nada_encontrado');
    }
}

function checksession(){

    $_this =& get_instance();

    if(!$_this->session->has_userdata('userid')){

        redirect('login');
        exit;
    }
}

function StatusUsuario($id_status){

    $_this =& get_instance();

    switch($id_status){

        case 1:
            $status = $_this->lang->line('ativo');
        break;

        case 0:
            $status = $_this->lang->line('nao_ativo');
        break;

        case 2:
            $status = $_this->lang->line('bloqueado');
        break;

        default:
            $status = $_this->lang->line('ativo');;
        break;
    }

    return $status;
}
?>