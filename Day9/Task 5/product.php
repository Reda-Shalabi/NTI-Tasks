<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Product List</h2>
    <a href="add_product.php" class="btn btn-secondary">Add Product</a>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
  </div>

  <div class="row">
    <?php while ($product = mysqli_fetch_assoc($result)): ?>
      <?php $image_path = base64_decode($product['image']); ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="<?php echo htmlspecialchars($image_path); ?>" class="card-img-top" alt="Product Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
            <p class="card-text">Price: $<?php echo htmlspecialchars($product['price']); ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

</body>
</html>
