<?php 
include 'navbar.php'; 
include 'db/db.php'; 

$studentResult = mysqli_query($econn, "SELECT COUNT(*) AS total FROM students");
$studentData = mysqli_fetch_assoc($studentResult);
$totalStudents = $studentData['total'];

$courseResult = mysqli_query($econn, "SELECT COUNT(*) AS total FROM courses");
$courseData = mysqli_fetch_assoc($courseResult);
$totalCourses = $courseData['total'];

$enrollResult = mysqli_query($econn, "SELECT COUNT(*) AS total FROM enrollments");
$enrollData = mysqli_fetch_assoc($enrollResult);
$totalEnrollments = $enrollData['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Training EX</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    .card {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }
    body {
        background-color: #f8f9fa;
    }
    .card-body h5 {
        font-weight: bold;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="mb-4">👋 Welcome to the Traning Management System</h1>

      <div class="col-md-3 mx-2">
          <div class="card">
              <div class="card-body text-center">
                  <h5>Students</h5>
                  <p>Total students: <strong><?php echo $totalStudents; ?></strong></p>
                  <a href="students/student.php" class="btn btn-primary">View Students</a>
              </div>
          </div>
      </div>

      <div class="col-md-3 mx-2">
          <div class="card">
              <div class="card-body text-center">
                  <h5>Courses</h5>
                  <p>Total courses: <strong><?php echo $totalCourses; ?></strong></p>
                  <a href="courses/courses.php" class="btn btn-success">View Courses</a>
              </div>
          </div>
      </div>

      <div class="col-md-3 mx-2">
          <div class="card">
              <div class="card-body text-center">
                  <h5>Enrollments</h5>
                  <p>Total enrollments: <strong><?php echo $totalEnrollments; ?></strong></p>
                  <a href="enrollments/enrollment.php" class="btn btn-warning text-white">View Enrollments</a>
              </div>
          </div>
      </div>

    </div>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
