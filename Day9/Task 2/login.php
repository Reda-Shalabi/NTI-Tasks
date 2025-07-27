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
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['email'] = $row['email'];
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='index.php';</script>";
        exit();
    }
}

if (isset($_POST['signup'])) {
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match'); window.location.href='index.php';</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email already exists'); window.location.href='index.php';</script>";
        exit();
    }

    $insert = "INSERT INTO admin (email, password) VALUES ('$email', '$hashed_password')";
    if (mysqli_query($conn, $insert)) {
        echo "<script>alert('Signup successful, please login now'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error while signing up'); window.location.href='index.php';</script>";
        exit();
    }
}
?>
