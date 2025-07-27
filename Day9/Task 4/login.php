<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "login_project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password');window.location='index.php';</script>";
    }
}

if (isset($_POST['signup'])) {
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match');window.location='index.php';</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $name = "User"; // Default name
    $role = "user"; // Default role

    $check = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email already exists');window.location='index.php';</script>";
    } else {
        $insert = "INSERT INTO admin (name, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$role')";
        mysqli_query($conn, $insert);
        echo "<script>alert('Signup successful! You can now log in.');window.location='index.php';</script>";
    }
}
?>
