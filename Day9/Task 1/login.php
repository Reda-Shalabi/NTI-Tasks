<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($econn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = mysqli_fetch_assoc($result);
        $_SESSION['login_time'] = date("Y-m-d H:i:s");
        $_SESSION['success'] = "Login successful!";
        header("Location: Dashboard.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Invalid email or password!</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
<h2>Login</h2>
<form method="POST">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
    <button type="submit" class="btn btn-success">Login</button>
</form>
<a href="signup.php">Don't have an account? Signup</a>
</body>
</html>
