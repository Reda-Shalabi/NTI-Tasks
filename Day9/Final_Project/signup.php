<?php
session_start();
include 'db/db.php';

if (isset($_POST['signup'])) {
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: index.php");
        exit();
    }

    // تأمين الباسورد
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // افتراضيًا خليه "user"
    $role = 'user';

    // تأكد إن الإيميل مش موجود قبل كده
    $check = mysqli_query($econn, "SELECT * FROM admin WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email already exists!";
        header("Location: index.php");
        exit();
    }

    $insert = mysqli_query($econn, "INSERT INTO admin (email, password, created_at, role) VALUES ('$email', '$hashedPassword', NOW(), '$role')");

    if ($insert) {
        $_SESSION['success'] = "Account created successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Signup failed!";
        header("Location: index.php");
        exit();
    }
}
?>

