<?php
include '../db/db.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied";
    exit();
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("⚠️ Invalid request. Enrollment ID is missing.");
}

$id = intval($_GET['id']);

$result = mysqli_query($conn, "SELECT * FROM enrollments WHERE id = $id");
if (!$result || mysqli_num_rows($result) == 0) {
    die("❌ Enrollment not found.");
}
$row = mysqli_fetch_assoc($result);

$students = mysqli_query($conn, "SELECT id, name FROM students");
$courses = mysqli_query($conn, "SELECT id_course AS id, title FROM courses");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    mysqli_query($conn, "UPDATE enrollments SET student_id='$student_id', course_id='$course_id', grade='$grade' WHERE id=$id");

    header("Location: enrollment.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Enrollment</title>
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
  <h2>Edit Enrollment</h2>
  <form method="post" class="row g-3">
    <div class="col-md-4">
      <label class="form-label">Student</label>
      <select class="form-select" name="student_id" required>
        <?php while ($s = mysqli_fetch_assoc($students)) { ?>
          <option value="<?= $s['id'] ?>" <?= $s['id'] == $row['student_id'] ? 'selected' : '' ?>><?= $s['name'] ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="col-md-4">
      <label class="form-label">Course</label>
      <select class="form-select" name="course_id" required>
        <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
          <option value="<?= $c['id'] ?>" <?= $c['id'] == $row['course_id'] ? 'selected' : '' ?>><?= $c['title'] ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="col-md-4">
      <label class="form-label">Grade</label>
      <input type="text" class="form-control" name="grade" value="<?= $row['grade'] ?>" required>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="enrollment.php" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
