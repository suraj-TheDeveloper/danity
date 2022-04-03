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
            <div class="row justify-content-center">
                <?php
                    ini_set('display_errors', 'On');
                    include("styles/php/db.php");
                    $stmt = $connection->prepare("SELECT name, dates FROM client WHERE bill_id = :id");
                    $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    $id = $_GET['id'];
                    foreach($data as $details) {
                    ?>
                    <div class="col-md-6">
                        <div class="card" style="margin-top: 50px;">
                            <div class="card-body">
                                <h2 class="card-title text-center">Danity's Tattoo And Beauty Parlour</h2>
                                <p class='text-center'>No.9 GM complex v.p sindhan nagar, thanakkankulam, Madurai</p>
                                <p style='margin-top: 50px;'><span style='font-weight: bold;'>Owner Name:</span> V. Kaarthiyayini</p>
                                <p><span style='font-weight: bold;'>Phone:</span> +917010418327</p>
                                <img class="mx-auto d-block img-fluid" src="styles/images/danity Logo.png" style="width: 50px; height: 50px;">
                                <h2 class="card-title text-center"><b>Bill No:</b> <?php echo $_GET['id']; ?></h2>
                                <p class="card-text text-center"><b>Client Name:</b> <?php echo $details['name']; ?></p>
                                <p class="card-text text-center"><b>Date & Time:</b> <?php echo $details['dates']; ?></p>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Service</th>
                                                <th>Cost</th>
                                            </tr>
                                        <?php
                                        $phone = $connection->prepare("SELECT services, cost FROM cart_history WHERE bill_id = :id");
                                        $phone->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                                        $phone->execute();
                                        $datas = $phone->fetchAll();
                                        foreach($datas as $phone) {
                                    ?>
                                            
                                                <tr>
                                                    <td><?php echo $phone['services']; ?></td>
                                                    <td><?php echo $phone['cost']; ?></td>
                                                </tr>
                                            
                                            <?php
                                            }
                                            $bill = $connection->prepare("SELECT * FROM bill WHERE id = :id");
                                            $bill->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
                                            $bill->execute();
                                            $datas = $bill->fetchAll();
                                            foreach($datas as $bill) {
                                                ?>
                                                <tr>
                                                    <th>Total</th>
                                                    <td><?php echo $bill['total']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mx-auto">
                        <a href="dom.php?id=<?php echo $id; ?>"><button class="btn btn-outline-primary">Print</button></a>
                    </div>
                    <?php
        }   
                ?>
            </div>
        </div>
    </body>
    <script src="styles/js/user.js"></script>
</html>