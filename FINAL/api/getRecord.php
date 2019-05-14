<?php
    
    include 'dbConn.php';
    
    $conn = get_database_connection("scheduler");
    $id =  $_POST["id_to_delete"];
    
    $sql = "SELECT * FROM appointment WHERE id = '$id'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);




?>