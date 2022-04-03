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
        <?php
        include("navigation.html");
    ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card" style="margin-top:  100px;">
                        <h2 class="card-header text-center">Enter Services Here</h2>
                        <p class="text-center text-danger" id="fail"></p>
                        <div class="card-body">
                            <form id="forms" method="post">
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" name="service" id="service" class="form-control" placeholder="Enter Service Name..">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price..">
                                </div>
                                <input type="submit" class="btn btn-outline-info" value="Create Service">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="styles/js/service.js"></script>
</html>