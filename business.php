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
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="styles/js/jquery-3.6.0.js"></script>
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
                        <a href="business.php" class="nav-link activate text-white">Business Report</a>
                    </li>
                    <li class="nav-item">
                        <a href="client.php" class="nav-link">Client List</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card" style="margin-top:  100px;">
                        <h2 class="card-header text-center">Edit Services Here</h2>
                        <p class="text-center text-danger" id="fail"></p>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="styles/js/update.js"></script>
</html>