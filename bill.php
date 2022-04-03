<!DOCTYPE html>
<html>
    <head>
        <title>Danity Tattoo's And Beauty Parlour</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/bootstrap-5.0.2-dist/css/bootstrap.css">
        <script src="styles/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
        <link rel="stylesheet" href="styles/css/main.css?v=5fefr">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styles/datatables.min.css">
        <script type="text/javascript" charset="utf8" src="styles/datatables.min.js"></script>
    </head>
    <body style="background-color: #EFEFEF;" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
        <div class="container">
            <div class="row">
                <?php
                    ini_set('display_errors', 'On');
                    include("styles/php/db.php");
                    $stmt = $connection->prepare("SELECT phone, name FROM client WHERE id = :id");
                    $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    foreach($data as $details) {
                        $phone = $connection->prepare("SELECT bill_id FROM client WHERE phone = :phone");
                        $phone->bindParam(":phone", $details['phone'], PDO::PARAM_STR);
                        $phone->execute();
                        $datas = $phone->fetchAll();
                        foreach($datas as $phone) {
                            $bill = $connection->prepare("SELECT * FROM bill WHERE id = :id");
                            $bill->bindParam(":id", $phone['bill_id'], PDO::PARAM_STR);
                            $bill->execute();
                            $datas = $bill->fetchAll();
                            foreach($datas as $bill) {
                                ?>
                                <div class="col-md-4">
                                    <div class="card" style="margin-top: 50px;">
                                        <div class="card-body">
                                            <p class="card-title text-center">Danity's Tattoo And Unisex Beauty Parlour</p>
                                            <img class="mx-auto d-block img-fluid" src="styles/images/danity Logo.png" style="width: 50px; height: 50px;">
                                            <h2 class="card-title text-center">Bill No: <?php echo $bill['id']; ?></h2>
                                            <p class="card-text text-center">Time: <?php echo $bill['dates']; ?></p>
                                            <p class="card-text text-center">Client Name: <?php echo $details['name']; ?></p>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <?php
                                                            $bills = $connection->prepare("SELECT * FROM `cart_history` WHERE bill_id = :id");
                                                            $bills->bindParam(":id", $phone['bill_id'], PDO::PARAM_STR);
                                                            $bills->execute();
                                                            $datas = $bills->fetchAll();
                                                            foreach($datas as $history) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $history['services']; ?></td>
                                                                        <td><?php echo $history['cost']; ?></td>
                                                                    </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                        <tr>
                                                            <th>Total</th>
                                                            <td><?php echo $bill['total']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
            <a href="client.php"><button class="btn btn-outline-danger mt-3">Back</button></a>
        </div>
    </body>
    <script src="styles/js/user.js"></script>
</html>