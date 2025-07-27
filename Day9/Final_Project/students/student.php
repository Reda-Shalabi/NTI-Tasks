<?php
include '../db/db.php';
session_start();

if (!isset($_SESSION['role'])) {
  header("Location: ../index.php");
  exit();
}

$is_admin = ($_SESSION['role'] === 'admin');

$q = "SELECT * FROM students";
$res = mysqli_query($conn, $q);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Student List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Training System</a>
      <?php if (isset($_SESSION['name'])): ?>
        <li class="nav-item">
          <span class="nav-link text-white">Welcome, <?= $_SESSION['name']; ?> (<?= $_SESSION['role']; ?>)</span>
        </li>
      <?php endif; ?>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="../dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../students/student.php">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"" href=" ../courses/courses.php">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../enrollments/enrollment.php">Enrollments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active bg-danger" href="../logout.php">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container mt-4">
    <h3>Student List</h3>
    <a href="add_student.php" class="btn btn-success mb-3">+ Add Student</a>
    <table class="table table-bordered text-center">
      <thead class="table-dark">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>DOB</th>
          <?php if ($is_admin): ?>
            <th>Actions</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
          <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['dob'] ?></td>
            <?php if ($is_admin): ?>

              <td>
                <a href="edit_student.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="delete_student.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
              <?php endif; ?>
              </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>