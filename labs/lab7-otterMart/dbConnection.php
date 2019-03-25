<?php

function get_database_connection($dbname = 'ottermart'){
    
    $host = 'localhost'; // cloud 9
    $username = 'root';
    $password = '';
    
    //creates database connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
    
    
    
    
    
    
    
    
    
    
    
}




?>