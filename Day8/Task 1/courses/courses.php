<?php
include '../db/db.php';;
$conn = mysqli_connect("localhost", "root", "", "tranning_system");
$result = mysqli_query($conn, "SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Courses</title>
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
        <h3>Courses List</h3>
        <a href="add_course.php" class="btn btn-success mb-3">+ Add Course</a>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id_course'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['hours'] ?></td>
                        <td>
                            <a href="edit_course.php?id=<?= $row['id_course'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_course.php?id=<?= $row['id_course'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>