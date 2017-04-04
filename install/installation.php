<?php

ini_set('max_execution_time', 300); //300 seconds 

function verify($purchasecode){

    $usernameCodecanyon = 'php4fun';
    $apiKeyCodecanyon = 't328ywj13ddlhc3q61iy2zm5f9mevj3q';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/$usernameCodecanyon/$apiKeyCodecanyon/verify-purchase:$purchasecode.json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'ENVATO-PURCHASE-VERIFY'); //api requires any user agent to be set

    $result = json_decode( curl_exec($ch) , true );

    if($result != ""){
        if ( !empty($result['verify-purchase']['item_id']) && $result['verify-purchase']['item_id'] ) {
            return $result['verify-purchase'];
        }else{
            return false;
        }
    }else{
        return false;
    }
}

if (isset($_POST)) {
    $host = $_POST["host"];
    $dbuser = $_POST["dbuser"];
    $dbpassword = $_POST["dbpassword"];
    $dbname = $_POST["dbname"];

    $fullname = $_POST["name"];
    $email = $_POST["email"];
    $login = $_POST['login'];
    $login_password = $_POST["password"] ? $_POST["password"] : "";

    $appID = $_POST['app_id'];
    $appSecret = $_POST['app_secret'];

    $purchasecode = $_POST['purchasecode'];


    //check required fields
    if (!($host && $dbuser && $dbname && $purchasecode && $fullname && $login && $email && $login_password)) {
        echo json_encode(array("success" => false, "message" => "Please enter all fields."));
        exit();
    }

    //check for valid email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo json_encode(array("success" => false, "message" => "Please enter a valid email."));
        exit();
    }
    

    //check for valid database connection
    $mysqli = @new mysqli($host, $dbuser, $dbpassword, $dbname);

    if (mysqli_connect_errno()) {
        echo json_encode(array("success" => false, "message" => $mysqli->connect_error));
        exit();
    }


    //all input seems to be ok. check required fiels
    if (!is_file('database.sql')) {
        echo json_encode(array("success" => false, "message" => "The database.sql file could not found in install folder!"));
        exit();
    }

    if (!verify($purchasecode)) {
        echo json_encode(array("success" => false, "message" => "Purchase Code invalid!"));
        exit();
    }

    /*
     * check the db config file
     * if db already configured, we'll assume that the installation has completed
     */

    // set random enter_encryption_key
    $database_file_path = "../application/config/database.php";
    $database_file = file_get_contents($database_file_path);

    $config_file_path = "../application/config/config.php";
    $config_file = file_get_contents($config_file_path);

    $is_installed = strpos($database_file, "DB-HOST");

    if (!$is_installed) {
        echo json_encode(array("success" => false, "message" => "Seems this app is already installed! You can't reinstall it again."));
        exit();
    }

    //start installation
    $sql = file_get_contents("database.sql");

    $sql = str_replace('NOME-USER', $fullname, $sql);
    $sql = str_replace('EMAIL-USER', $email, $sql);
    $sql = str_replace('LOGIN-USER', $login, $sql);
    $sql = str_replace('SENHA-USER', md5($login_password), $sql);
    $sql = str_replace('DATA-CADASTRO', time(), $sql);
    $sql = str_replace('APP-ID', $appID, $sql);
    $sql = str_replace('APP-SECRET', $appSecret, $sql);
    $sql = str_replace('PURCHASE-CODE', $purchasecode, $sql);

    //create tables in datbase 
    $mysqli->multi_query($sql);
    do {
        
    } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli));

    $mysqli->close();
    // database created
    // set the database config file
    $database_file = str_replace('DB-HOST', $host, $database_file);
    $database_file = str_replace('DB-USER', $dbuser, $database_file);
    $database_file = str_replace('DB-PASSWORD', $dbpassword, $database_file);
    $database_file = str_replace('DB-NAME', $dbname, $database_file);

    $index_file_path = "../index.php";
    $index_file = file_get_contents($index_file_path);
    $index_file = preg_replace('/installation/', 'production', $index_file, 1); //replace the first occurence of 'pre_installation'
    file_put_contents($index_file_path, $index_file);

    $dashboard_url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
    $dashboard_url = preg_replace('/install.*/', '', $dashboard_url); //remove everything after index.php
    if (!empty($_SERVER['HTTPS'])) {
        $dashboard_url = 'https://' . $dashboard_url;
    } else {
        $dashboard_url = 'http://' . $dashboard_url;
    }

    $config_file = str_replace('BASE-URL', $dashboard_url, $config_file);

    file_put_contents($database_file_path, $database_file);
    file_put_contents($config_file_path, $config_file);

    echo json_encode(array("success" => true, "message" => "Installation successfull."));
    exit();
}

