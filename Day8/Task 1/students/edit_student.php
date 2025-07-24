<?php
include '../db/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Student ID is missing in the URL.");
}

$id = intval($_GET['id']);
$result = mysqli_query($econn, "SELECT * FROM students WHERE id = $id");
if (!$result || mysqli_num_rows($result) == 0) {
    die("Student not found.");
}
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<?php include("../navbar.php"); ?>

<div class="container mt-4">
  <h3>Edit Student</h3>
  <form action="update_student.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
    </div>

    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="<?= $row['phone'] ?>" required>
    </div>

    <div class="mb-3">
      <label>Date of Birth</label>
      <input type="date" name="dob" class="form-control" value="<?= $row['dob'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="student.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
