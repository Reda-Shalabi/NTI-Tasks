<?php
session_start();
include 'navbar.php';
include 'db/db.php';

if (!isset($_SESSION['role'])) {
    header("Location: index.php");
    exit();
}

$role = $_SESSION['role'];
$name = $_SESSION['name'] ?? 'User';

$studentResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$totalStudents = mysqli_fetch_assoc($studentResult)['total'];

$courseResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM courses");
$totalCourses = mysqli_fetch_assoc($courseResult)['total'];

$enrollResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM enrollments");
$totalEnrollments = mysqli_fetch_assoc($enrollResult)['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    body {
        background-color: #000000ff;
    }
  </style>
</head>
<body>
    
<div class="container mt-5">
  <h2 class="mb-4 text-center text-light">📊 Welcome, <?= htmlspecialchars($name) ?> | Role: <?= htmlspecialchars($role) ?></h2>
  <div class="row justify-content-center">

    <div class="col-md-3 mx-2">
        <div class="card">
            <div class="card-body text-center">
                <h5>👨‍🎓 Students</h5>
                <p>Total students: <strong><?= $totalStudents ?></strong></p>
                <a href="students/student.php" class="btn btn-primary">View Students</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mx-2">
        <div class="card">
            <div class="card-body text-center">
                <h5>📚 Courses</h5>
                <p>Total courses: <strong><?= $totalCourses ?></strong></p>
                <a href="courses/courses.php" class="btn btn-success">View Courses</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mx-2">
        <div class="card">
            <div class="card-body text-center">
                <h5>📝 Enrollments</h5>
                <p>Total enrollments: <strong><?= $totalEnrollments ?></strong></p>
                <a href="enrollments/enrollment.php" class="btn btn-warning text-white">View Enrollments</a>
            </div>
        </div>
    </div>
        <?php if ($role == 'admin'): ?>
<div class="text-center mt-4">
    <a href="login_info.php" class="btn btn-success">🔍 View Login Info</a>
</div>
<?php endif; ?>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
