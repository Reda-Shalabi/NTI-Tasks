<?php
$conn = mysqli_connect("localhost", "root", "", "login_project");

$admin_pass = password_hash("admin123", PASSWORD_DEFAULT);
$user_pass = password_hash("user123", PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO admin (name, email, password, role) 
    VALUES ('Admin', 'admin@example.com', '$admin_pass', 'admin')");

mysqli_query($conn, "INSERT INTO admin (name, email, password, role) 
    VALUES ('User', 'user@example.com', '$user_pass', 'user')");

echo "Done!";
?>
