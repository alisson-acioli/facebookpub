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
?>