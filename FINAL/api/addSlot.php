<?php
    
    include 'dbConn.php';
    
    $conn = get_database_connection("scheduler");
    
    $new_date =  $_POST["date"];
    $new_start_t =  $_POST["new_start_t"];
    $new_s_am_pm = $_POST["start_am_pm"];
    $new_e_am_pm = $_POST["end_am_pm"];
    $new_end_t =  $_POST["new_end_t"];
    $new_duration = $new_end_t - $new_start_t;
    
   
    
    
    $sql = "INSERT INTO `scheduler`.`appointment` 
            (`id`, `date`, `start_time`, `end_time`, `duration`, `booked_by`, `event_id`, `user_id`) 
            VALUES (NULL, '$new_date', '$new_start_t ' '$new_s_am_pm ', '$new_end_t ' '$new_s_am_pm','$new_duration', 'not booked', '2', '1');";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    
    echo "New record created successfully";




/*
INSERT INTO `scheduler`.`appointment` 
(`id`, `date`, `start_time`, `end_time`, `duration`, `booked_by`, `event_id`, `user_id`) 
VALUES (NULL, '05/14/2019', '1 PM', '7 PM', '6', 'not booked', '2', '1');


*/
?>