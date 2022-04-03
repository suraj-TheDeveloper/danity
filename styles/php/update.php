<?php
    include("db.php");
    ini_set('display_errors', 'On');
    try {
        $stmt = $connection->prepare("UPDATE services SET name = :name, price = :price WHERE id = :id"); 
        $stmt->bindParam(":name", $_POST['service'], PDO::PARAM_STR);
        $stmt->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $_POST['id'], PDO::PARAM_STR);
        $stmt->execute();
        echo "Updated";
    } catch (Exception $e){
        echo "ERROR", $e;
    }
?>