<!DOCTYPE html>
<html>
    <head>
        <title>Danity Tattoo's And Beauty Parlour</title>
        <link rel="stylesheet" href="styles/bootstrap-5.0.2-dist/css/bootstrap.css">
        <script src="styles/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
        <link rel="stylesheet" href="styles/css/main.css?v=5fefr">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                    ini_set('display_errors', 'On');
                    include("styles/php/db.php");
                    $stmt = $connection->prepare("SELECT name, dates FROM client WHERE bill_id = :id");
                    $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    foreach($data as $details) {
                    ?>
                    <div class="col-md-4">
                        <div class="card" style="margin-top: 50px;">
                            <div class="card-body">
                                <p class="card-title text-center">Danity's Tattoo And Beauty Parlour</p>
                                <img class="mx-auto d-block img-fluid" src="styles/images/danity Logo.png" style="width: 50px; height: 50px;">
                                <h2 class="card-title text-center">Bill No: <?php echo $_GET['id']; ?></h2>
                                <p class="card-text text-center">Client Name: <?php echo $details['name']; ?></p>
                                <p class="card-text text-center">Date & Time: <?php echo $details['dates']; ?></p>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                    <?php
                                     $phone = $connection->prepare("SELECT services, cost FROM cart_history WHERE bill_id = :id");
                                     $phone->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                                     $phone->execute();
                                     $datas = $phone->fetchAll();
                                     foreach($datas as $phone) {
                                ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $phone['services']; ?></td>
                                                <td><?php echo $phone['cost']; ?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                         }
                                         $bill = $connection->prepare("SELECT * FROM bill WHERE id = :id");
                                         $bill->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                                         $bill->execute();
                                         $datas = $bill->fetchAll();
                                         foreach($datas as $bill) {
                                             ?>
                                            <th>Total</th>
                                            <td><?php echo $bill['total']; ?></td>
                                             <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
        }   
                ?>
            </div>
        </div>
    </body>
</html>