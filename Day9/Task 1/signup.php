<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];  

    $check = mysqli_query($econn, "SELECT * FROM admin WHERE email = '$email'");
    
    if (mysqli_num_rows($check) > 0) {
        echo '<div class="alert alert-danger">Email already exists!</div>';
    } else {
        $sql = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($econn, $sql)) {
            echo '<div class="alert alert-success">Account created successfully!</div>';
        } else {
            echo '<div class="alert alert-danger">Error: ' . mysqli_error($econn) . '</div>';
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
<h2>Signup</h2>
<form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
    <button type="submit" class="btn btn-primary">Signup</button>
</form>
<a href="login.php">Already have an account? Login</a>
</body>
</html>

