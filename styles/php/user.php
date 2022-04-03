<?php
    include("db.php");
    // ini_set('display_errors', 'On');
    try{
        $name_arr = array();
        $cost_arr = array();
        $stmt = $connection->prepare("INSERT INTO client (name, phone, address) VALUES (:name, :phone, :address)");
        $stmt->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $_POST['phone'],  PDO::PARAM_STR);
        $stmt->bindParam(":address", $_POST['address'],  PDO::PARAM_STR);
        $stmt->execute();
        $user_id = $connection->lastInsertId();
        $statement = $connection->prepare("SELECT * FROM cart");
        $statement->execute();
        $output = $statement->fetchAll();
        foreach($output as $data) {
            array_push($name_arr, $data['services']);
            array_push($cost_arr, $data['cost']);
        }
        $userbill = $connection->prepare("SELECT SUM(cost) AS total FROM cart");
        $userbill->execute();
        $outputs = $userbill->fetchAll();
        foreach($outputs as $datas) {
            $total = $datas['total'];
            $insq = $connection->prepare("INSERT INTO bill (services, cost, total, dates) VALUES (:services, :cost, :total, :dates)");
            $insq->bindParam(":services", serialize($name_arr));
            $insq->bindParam(":cost", serialize($cost_arr));
            $insq->bindParam(":total", $total);
            date_default_timezone_set("Asia/kolkata");
            $date = date("Y-m-d H:i:s");
            $insq->bindParam(":dates", $date);
            $insq->execute();
            $last_id = $connection->lastInsertId();
            $bill = $connection->prepare("UPDATE client SET bill_id = :billid, dates = :dates WHERE id = :id");
            $bill->bindParam(":billid", $last_id, PDO::PARAM_STR);
            $bill->bindParam(":dates", $date);
            $bill->bindParam(":id", $user_id, PDO::PARAM_STR);
            $bill->execute();
            $userbill = $connection->prepare("SELECT * FROM cart");
            $userbill->execute();
            $output = $userbill->fetchAll();
            foreach($output as $detail) {
                $biller = $connection->prepare("INSERT INTO cart_history (services, cost, bill_id) VALUES (:services, :cost, :bill_id)");
                $biller->bindParam(":services", $detail['services'], PDO::PARAM_STR);
                $biller->bindParam(":cost", $detail['cost'], PDO::PARAM_STR);
                $biller->bindParam(":bill_id", $last_id, PDO::PARAM_STR);
                $biller->execute();
            }
            $delete = $connection->prepare("DELETE FROM cart");
            $delete->execute();
            echo $last_id;
        }
    } catch (Exception $e) {
        echo "ERROR", $e;
    }
?>