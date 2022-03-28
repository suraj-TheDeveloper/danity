<?php
    include("styles/php/db.php");
    ini_set('display_errors', 'On');
    try {
        $stmt = $connection->prepare("DELETE FROM services WHERE id = :id"); 
        $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
        $stmt->execute();
        header("location:index.php");  
    } catch (Exception $e){
        echo "ERROR", $e;
    }
?>