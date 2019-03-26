<?php

function get_database_connection($dbname = 'ottermart'){
    
    $host = 'localhost'; // cloud 9
    $username = 'root';
    $password = '';
    

    
     //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("mysql://bbc314c67abb43:b336bb73@us-cdbr-iron-east-03.cleardb.net/heroku_cef7aa65e0d770c?reconnect=true"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

    
    //creates database connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
    
    
    
    
    
    
    
    
    
    
    
}




?>