<?php
    
    include '../dbConnection.php';
    
    $conn = get_database_connection("cinder");
    
    $sql = "SELECT * FROM user WHERE id NOT IN (SELECT match_user_id FROM `match`) AND id NOT IN (SELECT user_id FROM `match`)";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);




?>