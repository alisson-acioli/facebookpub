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

    switch($id_status){

        case 1:
            $status = 'Ativo';
        break;

        case 0:
            $status = 'Não Ativo';
        break;

        case 2:
            $status = 'Bloqueado';
        break;

        default:
            $status = 'Ativo';
        break;
    }

    return $status;
}
?>