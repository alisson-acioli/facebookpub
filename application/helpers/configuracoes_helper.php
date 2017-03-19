<?php
function website_config($column){

    $_this =& get_instance();

    $query = $_this->db->query("SELECT * FROM website_config LIMIT 1");

    if($query->num_rows() > 0){

        $row = $query->row();

        if(isset($row->$column)){

            return $row->$column;
        
        }else{

            return $_this->lang->line('erro_configuracao');
        }
    }
}

function StatusPostagem($id){

    $_this =& get_instance();

    switch($id){

        case 1:
            $status = $_this->lang->line('processando');
        break;

        case 2:
            $status = $_this->lang->line('publicado');
        break;

        case 3:
            $status = $_this->lang->line('cancelado');
        break;

        case 4:
            $status = $_this->lang->line('com_problemas');
        break;

        default:
            $status = $_this->lang->line('com_problemas');
        break;
    }

    return $status;
}
?>