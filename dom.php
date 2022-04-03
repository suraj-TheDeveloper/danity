<?php
ob_start();
ini_set('display_errors', 'On');
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
ini_set('display_errors', 'On');
include("styles/php/db.php");
$mpdf->SetWatermarkText("DANITY-S TATTOO AND BEAUTY PARLOUR");
$mpdf->showWatermarkText = true;
$stmt = $connection->prepare("SELECT name, dates FROM client WHERE bill_id = :id");
$stmt->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
$stmt->execute();
$data = $stmt->fetchAll();
foreach($data as $details) {
$data .= "
<html>
    <head>
        <title>Danity Tattoo's And Beauty Parlour</title>
        <link rel='stylesheet' href='styles/bootstrap-5.0.2-dist/css/bootstrap.css'>
        <script src='styles/bootstrap-5.0.2-dist/js/bootstrap.js'></script>
        <link rel='stylesheet' href='styles/css/main.css?v=5fefr'>
    </head>
    <body>
        <div class='container'>
            <div class='row justify-content-center'>
                <div class='col-md-4'>
                    <div class='card' style='margin-top: 50px;'>
                        <div class='card-body'>
                            <h1 class='text-center' style='font-size: 20px; font-weight: bold;'>Danity-s Tattoo And Beauty Parlour</h1>
                            <p class='text-center'>No.9 GM complex v.p sindhan nagar, thanakkankulam, Madurai</p>
                            <p style='float: right; margin-top: 50px;'><span style='font-weight: bold;'>Owner Name:</span> V. Kaarthiyayini</p>
                            <p style='float: right;'><span style='font-weight: bold;'>Phone:</span> +917010418327</p>
                            <h2 style='font-size: 20px; font-weight: bold; margin-top: 30px;' class='text-center'>Bill No:".$_GET['id']." </h2>
                            <p class='card-text text-center'>Client Name: ".$details['name']." </p>
                            <p class='card-text text-center'>Date & Time: ".$details['dates']. "</p>
                            <div class='table-responsive'>
                                <table style='margin-top: 40px; border: 1px;' class='table table-bordered'>
                                <tbody>
                                    <tr>
                                        <th style='padding: 20px;'>Service</th>
                                        <th style='padding: 20px;'>Cost</th>
                                    </tr>
                                    ";
                                    $phone = $connection->prepare("SELECT services, cost FROM cart_history WHERE bill_id = :id");
                                    $phone->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                                    $phone->execute();
                                    $datas = $phone->fetchAll();
                                    foreach($datas as $phone) { 
                                $data .= "
                                        <tr>
                                            <td style='padding: 20px;'>".$phone['services']."</td>
                                            <td style='padding: 20px;'>".$phone['cost']. "</td>
                                        </tr>";
                                    }
                                        $bill = $connection->prepare("SELECT * FROM bill WHERE id = :id");
                                        $bill->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                                        $bill->execute();
                                        $datas = $bill->fetchAll();
                                        foreach($datas as $bill) {
                                        $data .=     "
                                        <tr>
                                            <th style='padding: 20px;'>Total</th>
                                            <td style='padding: 20px;'>".$bill['total']. "</td>
                                        </tr>
                                         ";
                                        }
                                    $data .="
                                    </tbody>.
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>";
$mpdf->WriteHtml($data);
$mpdf->SetDisplayMode('fullpage');
}
// $mpdf->stream("final1.php", array("Attachment" => false));
// $mpdf->render();
ob_get_clean();
$mpdf->Output();
?>