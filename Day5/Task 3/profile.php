<?php
(isset($_GET['name'])) ? $name = $_GET['name'] : $name = '';
$email = $_GET['email'] ?? '';
$age = $_GET['age'] ?? '';
$city = $_GET['city'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .alert,
        span {
            font-weight: bold;
        }

        form {
            border-radius: 7px;
        }
    </style>
</head>

<body>

    <body class="bg-success ">
        <div class="container ">

            <div class="row justify-content-center">

                <div class="col-lg-5 col-md-8 col-xs-12 mt-5">
                    <form class=" bg-light w-100 p-4">
                        <h3 class="d-flex justify-content-center mb-4">User Profile</h3>
                        <div class="alert alert-success">Welcome, <?= $name ?></div>
                        <div class="card ">
                            <h4 class="p-3">User Information</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>Full name: </span><?= $name ?></li>
                                <li class="list-group-item"><span>Email: </span> <?= $email ?></li>
                                <li class="list-group-item"><span>Age: </span> <?= $age ?></li>
                                <li class="list-group-item"><span>City: </span> <?= $city ?></li>
                            </ul>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class=" btn btn-primary ">Back to form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>

        <script src="js/bootstrap.bundle.js"></script>
    </body>

</html>