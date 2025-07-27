<?php
include("../db/db.php"); 
$students = mysqli_query($conn, "SELECT id, name FROM students");
$courses = mysqli_query($conn, "SELECT id_course AS id, title FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Enrollment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            <a class="nav-link active"" href="../courses/courses.php">Courses</a>
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
  <h2>Add New Enrollment</h2>
  <form action="insert_enrollment.php" method="POST" class="row g-3">
    <div class="col-md-6">
      <label>Student</label>
      <select name="student_id" class="form-select" required>
        <option value="">Select Student</option>
        <?php while($s = mysqli_fetch_assoc($students)) { ?>
          <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="col-md-6">
      <label>Course</label>
      <select name="course_id" class="form-select" required>
        <option value="">Select Course</option>
        <?php while($c = mysqli_fetch_assoc($courses)) { ?>
          <option value="<?= $c['id'] ?>"><?= $c['title'] ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="col-md-6">
      <label>Grade</label>
      <input type="text" name="grade" class="form-control" required />
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-success">Add Enrollment</button>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
