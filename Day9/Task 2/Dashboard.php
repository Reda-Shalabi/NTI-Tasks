<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="bg-dark p-5">
  <div class="container d-flex justify-content-center p-5">
    <form class="bg-light w-50 p-5">
      <div class='alert alert-success mb-5'>
        <i class='bi bi-check-square-fill mx-2 text-success'></i>
        <strong>Welcome, <?php echo $_SESSION['email']; ?></strong>
      </div>
      <div class="row d-flex justify-content-between">
        <a href="index.php#signup" class="btn btn-primary mb-2 ">Create Account</a>
        <a href="logout.php" class="btn btn-primary mb-2">Logout</a>
      </div>
    </form>
  </div>
</body>

</html>