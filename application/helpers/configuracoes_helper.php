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

function TimesZones() {
    $zones_array = array();
    $timestamp = time();
    foreach(timezone_identifiers_list() as $key => $zone) {
        date_default_timezone_set($zone);
        $zones_array[$key]['zone'] = $zone;
        $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
    }
    return $zones_array;
}

function verify($purchaseCode) {
    if(!session("verify")){
        $purchaseCode = ($purchaseCode == "")?"none":$purchaseCode;
        $result = false; // have we got a valid purchase code?
        $our_item_id = 15279075; // check if they've bought this item id.
        $username = 'tienpham1606'; // authors username
        $apiKey = 'xpny3lng9htbi7j6dyn84j556ixu4umv'; // api key from my account area

        // Open cURL channel
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/$username/$apiKey/verify-purchase:$purchaseCode.json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'ENVATO-PURCHASE-VERIFY'); //api requires any user agent to be set

        $result = json_decode( curl_exec($ch) , true );

        //check if purchase code is correct
        if($result != ""){
            if ( !empty($result['verify-purchase']['item_id']) && $result['verify-purchase']['item_id'] ) {
                set_session("verify", $result['verify-purchase']);
                return $result['verify-purchase'];
            }
        }elseif($result == ""){ 
            return true;
        }

        //invalid purchase code
        return false;
    }else{
        return session("verify");
    }
}
?>