<?php
$conn = mysqli_connect("localhost", "root", "", "tranning_system");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM courses WHERE id_course = $id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Course</title>
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
    <div class="container mt-5">
        <h2>Edit Course</h2>
        <form method="post" action="update_course.php">
            <input type="hidden" name="id_course" value="<?= $row['id_course'] ?>">
            <div class="mb-3">
                <label class="form-label">Course Title</label>
                <input type="text" name="title" class="form-control" value="<?= $row['title'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" step="0.01" class="form-control" value="<?= $row['price'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hours</label>
                <input type="number" name="hours" class="form-control" value="<?= $row['hours'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>