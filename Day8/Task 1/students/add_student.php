<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
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
        <h3>Add New Student</h3>
        <form action="insert_student.php" method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>DOB</label>
                <input type="date" name="dob" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
            <a href="student.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>