<?php

 include '../dbConnection.php';
    
    $conn = get_database_connection("cinder");

    $sql = "toDO";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);


?>