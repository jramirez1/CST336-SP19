<?php
    
    include 'dbConn.php';
    
    $conn = get_database_connection("scheduler");
    
    $sql = "SELECT * FROM appointment WHERE user_id = 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);




?>