<?php

    include '../dbConnection.php';
    $conn = get_database_connection("ottermart");
    
    $namedParameters = array();
    
    $sql = "SELECT * FROM om_product WHERE 1";
    
    //check if the user has typed something in the "product" text box
    if(!empty($_GET['product'])){
        $sql .= " AND productName LIKE :productName OR productDescription LIKE :productName";
        $namedParameters[":productName"] = "%" . $_GET['product']. "%";
    }
    // check if the user has selected a category of product
    if(!empty($_GET['category'])) {
        $sql .= " AND catId = :categoryId";
        $namedParameters[":categoryId"] = $_GET['category'];
    }
    //check if the user has typed any price ranges
    if(!empty($_GET['priceFrom'])) {
        $sql .= " AND price >= :priceFrom";
        $namedParameters[":priceFrom"] = $_GET['priceFrom'];
    }
    if(!empty($_GET['priceTo'])) {
        $sql .= " AND price <= :priceTo";
        $namedParameters[":priceTo"] = $_GET['priceTo'];
    }
    if(isset($_GET['orderBy'])) {
        if($_GET['orderBy'] == "price"){
            $sql .= " ORDER BY price";
        }
        else if($_GET['orderBy'] == "name"){
            $sql .= " ORDER BY name";
        }
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters); // We NEED to include $namedParameters here
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($records);

    


?>  