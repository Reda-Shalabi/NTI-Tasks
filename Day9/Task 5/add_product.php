<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $price = $_POST['price'];

    $image_name = $_FILES['image']['name'];
    $tmp_name   = $_FILES['image']['tmp_name'];
    $folder     = "uploads/" . $image_name;

    if (move_uploaded_file($tmp_name, $folder)) {
        $encoded_path = base64_encode($folder);

        $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$encoded_path')";
        mysqli_query($conn, $sql);

        header("Location: product.php");
        exit();
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Product</h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" class="form-control" name="price" id="price" required>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image:</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>
                
                <button type="submit" name="submit" class="btn btn-success">Add Product</button>
                <a href="product.php" class="btn btn-secondary">Back to Products</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
