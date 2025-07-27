<?php
include '../db/db.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied";
    exit();
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("⚠️ Invalid request. Course ID is missing.");
}

$id = intval($_GET['id']);

$result = mysqli_query($conn, "SELECT * FROM courses WHERE id_course = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    die("⚠️ Course not found.");
}

$course = mysqli_fetch_assoc($result);
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
                        <a class="nav-link active" href="../courses/courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../enrollments/enrollment.php">Enrollments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-danger" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Edit Course</h2>
        <form method="post" action="update_course.php">
            <input type="hidden" name="id_course" value="<?= $course['id_course'] ?>">
            <div class="mb-3">
                <label class="form-label">Course Title</label>
                <input type="text" name="title" class="form-control" value="<?= $course['title'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" step="0.01" class="form-control" value="<?= $course['price'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hours</label>
                <input type="number" name="hours" class="form-control" value="<?= $course['hours'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
