<?php
$message = '';
$Name = $_POST['Name'] ?? '';
$email = $_POST['email'] ?? '';



?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="p-5 bg-dark">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $tmpName = $_FILES['image']['tmp_name'];
            $name1 = $_FILES['image']['name'];
            move_uploaded_file($tmpName, "img/$name1");
            $message = " <div class='alert alert-success'>
                        <i class='bi bi-check-square-fill mx-2 text-success'></i>
                        Account Created Successfully </div>";

    ?>

            <form action="product.php" method="POST">

                <div class='row d-flex justify-content-center '>
                    <div class='card img-thumbnail col-md-3 ' width='200'>
                        <img src='img/<?= $name1 ?>' class='card-img-top' alt=''>
                        <div class='card-body'>
                            <h5 class='card-title'><?= $Name ?></h5>
                            <p class='card-text' name="email"><?= $email ?></p>
                            <button type="submit" class="btn btn-primary">Go To Products</a>

                        </div>
                    </div>
                </div>
            </form>
    <?php
        } else {
            $message = " <div class='alert alert-danger '> 
         <i class='bi bi-x-square-fill mx-2'></i>
        please upload an image </div>";
        }
    }
    ?>
    <div class="d-flex justify-content-center">

        <div class="container m-5 p-5 w-100">
            <div class="row ">
                <form method="POST" class='' enctype="multipart/form-data" class="">
                    <?= $message ?>
                    <div class="">
                        <label class="form-label text-light">Name</label>
                        <input type="text" class="form-control mb-3" name="Name">
                    </div>
                    <div class="">
                        <label class="form-label text-light">Email address</label>
                        <input type="text" class="form-control mb-3" name="email">
                    </div>
                    <div class="">
                        <label class="form-label text-light">Password</label>
                        <input type="password" class="form-control mb-3" name="password">
                    </div>
                    <div class="col-md-12">

                        <label class="form-label text-light ">Profile image</label>

                        <input class="form-control mb-5" type="file" id="formFile" name="image">
                    </div>
                    <button type="submit" class="btn btn-success w-100 ">Sign UP</button>

                </form>
            </div>
        </div>
    </div>
</body>