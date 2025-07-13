<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Document</title>
</head>
<body>

<?php
$name = $email = $age = $city = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['w'] ?? '';
    $email = $_POST['x'] ?? '';
    $age = $_POST['y'] ?? '';
    $city = $_POST['z'] ?? '';
}
?>

<div class="container mt-5">
  <div class="card p-4">
      <h4 class="mb-3">User Profile</h4>
      <div class="alert alert-success">
          Welcome, <strong><?php echo $name; ?></strong>!
      </div>
      <ul class="list-group">
          <li class="list-group-item"><strong>Full Name:</strong> <?php echo $name; ?></li>
          <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
          <li class="list-group-item"><strong>Age:</strong> <?php echo $age; ?></li>
          <li class="list-group-item"><strong>City:</strong> <?php echo $city; ?></li>
      </ul>
      <a href="index.php" class="btn btn-primary mt-3">Back to Form</a>
  </div>
</div>

</body>
</html>
