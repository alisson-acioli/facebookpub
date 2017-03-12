<?php
function website_config($column){

    $_this =& get_instance();

    $query = $_this->db->query("SELECT * FROM website_config LIMIT 1");

    if($query->num_rows() > 0){

        $row = $query->row();

        if(isset($row->$column)){

            return $row->$column;
        
        }else{

            return 'Erro de configuração. Verifique!';
        }
    }
}

function StatusPostagem($id){

    switch($id){

        case 1:
            $status = 'Processando';
        break;

        case 2:
            $status = 'Publicado';
        break;

        case 3:
            $status = 'Cancelado';
        break;

        case 4:
            $status = 'Com problemas';
        break;

        default:
            $status = 'Com problemas';
        break;
    }

    return $status;
}
?>