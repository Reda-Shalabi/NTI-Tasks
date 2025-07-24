<?php
include '../db/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];
    $date = date("Y-m-d");

    $query = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date)
              VALUES ('$student_id', '$course_id', '$grade', '$date')";
    mysqli_query($econn, $query);

    header("Location: enrollment.php");
    exit();
}

$students = mysqli_query($econn, "SELECT id, name FROM students");
$courses = mysqli_query($econn, "SELECT id_course AS id, title FROM courses");
$enrollments = mysqli_query($econn, "
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto d-flex">
                    <a class="text-white me-3" href="../index.php">Home</a>
                    <a class="text-white me-3" href="../students/student.php">Students</a>
                    <a class="text-white me-3" href="../courses/courses.php">Courses</a>
                    <a class="text-white me-3" href="../enrollments/enrollment.php">Enrollments</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3>Enrollment List</h3>
        <a href="add_enrollment.php" class="btn btn-success mb-3">+ Add Enrollment</a>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <th>Enrollment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($enrollments)) { ?>
                    <tr>
                        <td><?= $row['student_name'] ?></td>
                        <td><?= $row['course_title'] ?></td>
                        <td><?= $row['grade'] ?></td>
                        <td><?= $row['enrollment_date'] ?></td>
                        <td>
                            <a href="edit_enrollment.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete_enrollment.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>