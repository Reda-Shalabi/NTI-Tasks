<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "tranning_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    else return $_SERVER['REMOTE_ADDR'];
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ip = getUserIP();
    $login_time = date("Y-m-d H:i:s");

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['success'] = "✅ Login success!";

            mysqli_query($conn, "INSERT INTO login_logs (name, email, ip_address, login_time, status)
                VALUES ('{$row['name']}', '$email', '$ip', '$login_time', 'success')");

            header("Location: dashboard.php");
            exit();
        } else {

            mysqli_query($conn, "INSERT INTO login_logs (name, email, ip_address, login_time, status)
                VALUES ('Unknown', '$email', '$ip', '$login_time', 'failed')");

            $_SESSION['error'] = "❌ Incorrect email or password!";
            header("Location: index.php");
            exit();
        }
    } else {
        
        mysqli_query($conn, "INSERT INTO login_logs (name, email, ip_address, login_time, status)
            VALUES ('Unknown', '$email', '$ip', '$login_time', 'failed')");

        $_SESSION['error'] = "❌ Incorrect email or password!";
        header("Location: index.php");
        exit();
    }
}
?>
