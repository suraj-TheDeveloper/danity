<?php
    include("db.php");
    ini_set('display_errors', 'On');
    try{
        $stmt = $connection->prepare("INSERT INTO services (name, price) VALUES (:service, :price)");
        $stmt->bindParam(":service", $_POST['service'], PDO::PARAM_STR);
        $stmt->bindParam(":price", $_POST['price'],  PDO::PARAM_STR);
        $stmt->execute();
        echo "Inserted";
    } catch (Exception $e) {
        echo "ERROR", $e;
    }
?>