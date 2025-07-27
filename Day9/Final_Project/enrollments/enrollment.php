<?php
include '../db/db.php';
session_start();

if (!isset($_SESSION['role'])) {
  header("Location: ../index.php");
  exit();
}

$is_admin = ($_SESSION['role'] === 'admin');

$q = "SELECT * FROM enrollments";
$res = mysqli_query($conn, $q);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $grade = $_POST['grade'];
  $date = date("Y-m-d");

  $query = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date)
              VALUES ('$student_id', '$course_id', '$grade', '$date')";
  mysqli_query($conn, $query);

  header("Location: enrollment.php");
  exit();
}

$students = mysqli_query($conn, "SELECT id, name FROM students");
$courses = mysqli_query($conn, "SELECT id_course AS id, title FROM courses");
$enrollments = mysqli_query($conn, "
    SELECT enrollments.id, students.name AS student_name, courses.title AS course_title,
           enrollments.grade, enrollments.enrollment_date
    FROM enrollments
    JOIN students ON enrollments.student_id = students.id
    JOIN courses ON enrollments.course_id = courses.id_course
");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Enrollments</title>
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
    <h3>Enrollment List</h3>
    <?php if ($is_admin): ?>

      <a href="add_enrollment.php" class="btn btn-success mb-3">+ Add Enrollment</a>
    <?php endif; ?>

    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>Student</th>
          <th>Course</th>
          <th>Grade</th>
          <th>Enrollment Date</th>
          <?php if ($is_admin): ?>
            <th>Actions</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($enrollments)) { ?>
          <tr>
            <td><?= $row['student_name'] ?></td>
            <td><?= $row['course_title'] ?></td>
            <td><?= $row['grade'] ?></td>
            <td><?= $row['enrollment_date'] ?></td>
            <?php if ($is_admin): ?>
            <td>
                <a href="edit_enrollment.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_enrollment.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
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