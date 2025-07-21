<?php
if (array_key_exists('admin', $_GET)) {
    $name = $_GET['name'];
    $email = $_GET['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        img {
            display: inline;
        }
        .product-card {
            max-width: 500px;
            margin: auto;
        }
        .product-img {
            height: 200px;
            object-fit: cover;
        }
        .card-body small {
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="bg-dark text-white">

    <div class="container mt-5">

        <!-- ✅ نموذج إدخال منتج -->
        <form class="bg-secondary p-4 rounded" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="proName" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Product Images</label>
                <input class="form-control" type="file" name="image[]" multiple required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>

        <hr class="my-5 border-light">


        <?php
        $email = $_GET['email'] ?? 'Unknown';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $proname = $_POST['proName'] ?? '';
            $desc = $_POST['description'] ?? '';

            if (!is_dir("product-images")) {
                mkdir("product-images");
            }

            $len = count($_FILES['image']['name']);
            $files = [];

            for ($i = 0; $i < $len; $i++) {
                $files[] = [
                    'name' => $_FILES['image']['name'][$i],
                    'type' => $_FILES['image']['type'][$i],
                    'tmp_name' => $_FILES['image']['tmp_name'][$i],
                    'size' => $_FILES['image']['size'][$i],
                ];
            }

            $errors = [];
            foreach ($files as $file) {
                $type = explode("/", $file['type'])[0];
                $size = $file['size'];

                if ($type !== 'image') {
                    $errors[] = "{$file['name']} is not an image.";
                } elseif ($size > 2097152)
                 {
                    $errors[] = "{$file['name']} is larger than 2MB.";
                }
            }

            if (count($errors)) {
                echo "<div class='alert alert-warning w-100'>
                    Please fix the following file errors:
                    <ul class='list-group'>";
                foreach ($errors as $error) {
                    echo "<li class='list-group-item'>$error</li>";
                }
                echo "</ul></div>";
            } else {
                foreach ($files as $file) {
                    $name = $file['name'];
                    move_uploaded_file($file['tmp_name'], "./product-images/$name");

                    echo "
                    <div class='card product-card mb-4 bg-light text-dark shadow-sm'>
                        <div class='row g-0'>
                            <div class='col-md-5'>
                                <img src='./product-images/$name' class='img-fluid rounded-start product-img'>
                            </div>
                            <div class='col-md-7'>
                                <div class='card-body'>
                                    <h6 class='card-title'>Product Info</h6>
                                    <ul class='list-group list-group-flush small'>
                                        <li class='list-group-item'>Name: $proname</li>
                                        <li class='list-group-item'>Description: $desc</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
        ?>

    </div>
</body>

</html>
