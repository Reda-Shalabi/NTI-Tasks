<?php
if (array_key_exists('admin', $_GET)) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    header("location:admin.php?name=$name&email=$email");
}

?>

<head>
    <style>
        img {
            display: inline;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container mt-5 w-50">

        <form class="row p-5" method="POST" enctype="multipart/form-data">

            <div class="col-md-6">
                <label class="form-label text-light">Product Name</label>
                <input type="text" class="form-control mb-3" name="proName" required>

            </div>

            <div class="col-md-6">
                <label class="form-label text-light ">Description</label>

                <input type="tel" class="form-control mb-5" name="description" required>

            </div>
            <div class="col-md-12">

                <label class="form-label text-light ">Product images</label>

                <input class="form-control mb-5" type="file" id="formFile" name="image[]" multiple required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50 mb-3 ">Add Product</button>
            </div>
        </form>
        <hr class="text-white mb-5">


        <?php
        // the success code 
        $email = $_GET['email'];

        if (array_key_exists("hasSended", $_POST)) {
            $len = count($_FILES['images']['name']);

            $files = [];

            for ($i = 0; $i < $len; $i++) {

                $files[] = [
                    'name' => $_FILES['images']['name'][$i],
                    'type' => $_FILES['images']['type'][$i],
                    'tem-name' => $_FILES['images']['tmp_name'][$i],
                    'size' => $_FILES['images']['size'][$i],
                ];
            }

            $errors = [];
            foreach ($files as $file) {
                $type = (explode("/", $file['type']))[0];
                $size = $file['size'];
                if ($type != 'image' && $size <= '186619') {
                    $errors[] = "" . $file['name'] . "  Not an image";
                } else if ($type == 'image' && $size > '186619') {
                    $errors[] = "" . $file['name'] . "  Size is more than 18k ";
                }
            };

            if (count($errors)) {
                echo "<div class='alert alert-warning w-100'  type='alert'>
    Pleace change this files To fixe this errors :
    <ul class='list group'>";
                foreach ($errors as $error) {
                    echo "<li class='list-group-items'>" . $error . "</li>";
                }

                echo "</ul> </div>";
            } else {
                foreach ($files as $file) {
                    $name = $file['name'];
                    move_uploaded_file($file['tem-name'], "./product-images/$name");
                    //             echo "<img src='product-images/" . $name . "'alt='error' class='img-fluid rounded shadow mx-auto d-block mt-3'
                    // style='max-height: 300px; object-fit: contain;'> <br>";
                    $proname = $_POST['name'];
                    $desc = $_POST['disc'];
                    echo "
                        
                    <div class='card over bg-linear w-45 w-sm-100 border-0 myShadow ' style='    max-height: fit-content;' '>
                        <div class='row'>
                            <div class='col-lg-6 col-sm-12 col-md-12 me-0 p-0'><img src='./product-images/$name'  
                                    alt='error' class='img-fluid rounded shadow '
                                    style='height: 300px;width: 100%; object-fit: containt; margin: -1px !important;'>
                            </div>
                            <div class='col-lg-6 col-sm-12 col-md-12 p-4 '>
                                <h3 class='text-light fw-bold text-center mx-auto '>Product INfo</h3>
                                <ul class='list-group w-100 '>
                                    <li class='list-group-item w-100 d-flex justify-content-between fw-bold'>Name :
                                        <span>$proname </span>
                                    </li>
                                    <li class='list-group-item w-100 fw-bold'>Descroption :
                                        <span>$desc</span>
                                    </li>
                                    <li class='list-group-item w-100 d-flex justify-content-between fw-bold'>Add by :
                                        <span>$email</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                        
                       
                        
                        
                        ";
                }
            }
        }

        ?>


    </div>

    </div>
    </div>
    </div>
    </div>
</body>

</html>