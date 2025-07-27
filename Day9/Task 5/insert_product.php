<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $unique_name = time() . '_' . $image_name;
    $image_path = $targetDir . $unique_name;

    $imageFileType = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($image_tmp, $image_path)) {
            $encoded_image_path = base64_encode($image_path);

            $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$encoded_image_path')";
            if (mysqli_query($conn, $sql)) {
                header("Location: product.php");
                exit();
            } else {
                echo "Database error: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Invalid image file type.";
    }
} else {
    echo "Invalid request.";
}
?>
