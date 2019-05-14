<?php
    //DELETE FROM table_name WHERE condition;
    include 'dbConn.php';
    $id =  $_POST["id_to_delete"];
    
    $conn = get_database_connection("scheduler");
    
    $sql = "DELETE FROM appointment WHERE id = '$id';";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
   




?>