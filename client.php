<!DOCTYPE html>
<html>
    <head>
        <title>Danity Tattoo's And Unisex Beauty Parlour</title>
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
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top shadow">
            <a href="#" class="navbar-brand p-4"><img src="styles/images/danity Logo.png" style="width: 50px; height: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span style="color: white;" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Service List</a>
                    </li>
                    <li class="nav-item">
                        <a href="create.html" class="nav-link">Add Service</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link">Cart List</a>
                    </li>
                    <li class="nav-item">
                        <a href="business.php" class="nav-link">Business Report</a>
                    </li>
                    <li class="nav-item">
                        <a href="client.php" class="nav-link activate text-white">Client List</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="card" style="margin-top: 140px;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="p-3">id</th>
                                    <th class="p-3">Client Name</th>
                                    <th class="p-3">Phone</th>
                                    <th class="p-3">Address</th>
                                    <th class="p-3">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("styles/php/db.php");
                                $stmt = $connection->prepare("SELECT * FROM `client` GROUP BY name");
                                $stmt->execute();
                                $data = $stmt->fetchAll();
                                foreach($data as $details) {
                                    echo "
                                        <tr>
                                            <td class='p-3'>".$details['id']."</td>
                                            <td class='p-3'>".$details['name']."</td>
                                            <td class='p-3'>".$details['phone']."</td>
                                            <td class='p-3'>".$details['address']."</td>
                                            <td class='p-3'>
                                                <a href='services.php?id=".$details['id']."'><button class='btn btn-outline-info'>View</button></a>
                                            </td>
                                        </tr>
                                    ";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="p-3">id</th>
                                    <th class="p-3">Client Name</th>
                                    <th class="p-3">Phone</th>
                                    <th class="p-3">Address</th>
                                    <th class="p-3">View</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="styles/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="styles/DataTables-1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="styles/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="styles/Responsive-2.2.9/js/responsive.bootstrap5.js"></script>
    <script src="styles/Buttons-2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="styles/Buttons-2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script src="styles/Buttons-2.2.2/js/buttons.html5.min.js"></script>
    <script src="styles/Buttons-2.2.2/js/buttons.print.min.js"></script>
    <script src="styles/Buttons-2.2.2/js/buttons.colVis.min.js"></script>
    <script src="styles/js/carts.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable( {
                "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
            });
        });
    </script>
</html>