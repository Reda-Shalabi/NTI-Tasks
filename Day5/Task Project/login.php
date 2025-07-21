

<?php
session_start();

// بيانات الإدمن التجريبية
$correct_email = "admin@example.com";
$correct_password = "123456";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($email === $correct_email && $password === $correct_password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_email'] = $email;
        $_SESSION['username'] = "Admin";

        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Wrong email or password'); window.location.href='index.php';</script>";
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
