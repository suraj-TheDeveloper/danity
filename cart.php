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
    <?php
        include("navigation.html");
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card" style="margin-top: 140px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                    include("styles/php/db.php");
                                    $stmt = $connection->prepare("SELECT * FROM cart");
                                    $stmt->execute();
                                    $data = $stmt->fetchAll();
                                    if(!empty($data)){
                                ?>
                                    <table id="table" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="p-3">id</th>
                                                <th class="p-3">Service Name</th>
                                                <th class="p-3">Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include("styles/php/db.php");
                                                $stmt = $connection->prepare("SELECT * FROM cart");
                                                $stmt->execute();
                                                $data = $stmt->fetchAll();
                                                foreach($data as $details) {
                                                    echo "
                                                        <tr>
                                                            <td class='p-3'>".$details['id']."</td>
                                                            <td class='p-3'>".$details['services']."</td>
                                                            <td class='p-3'>Rs.".$details['cost']."</td>
                                                        </tr>
                                                    ";
                                                }
                                                $stmt = $connection->prepare("SELECT SUM(cost) AS total FROM cart");
                                                $stmt->execute();
                                                $data = $stmt->fetchAll();
                                                foreach($data as $details) {
                                                    echo "
                                                        <tr>
                                                            <td></td>
                                                            <th class='p-3'>Total</th>
                                                            <td class='p-3'>Rs.".$details['total']."</td>
                                                        </tr>
                                                    ";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                    } else {
                                        ?>
                                        <p class="text-center p-5">No Items In Cart</p>
                                        <?php
                                    }
                                ?>
                                <div class="d-flex justify-content-between">
                                    <a href="index.php"><button class="btn btn-outline-success">Add More</button></a>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">Proceed</button>
                                </div>
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Enter Client Details</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="user" method="post">
                                                <p class="text-center text-danger" id="fail"></p>
                                                <p class="text-center text-success" id="success"></p>
                                                <div class="mb-3 mt-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name..">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label class="form-label">Phone</label>
                                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone..">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" name="address" id="address" cols="5" rows="5" placeholder="Enter Address.."></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-outline-info float-end">Proceed</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="styles/js/user.js"></script>
</html>