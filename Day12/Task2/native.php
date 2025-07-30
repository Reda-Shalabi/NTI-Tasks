<?php
$conn = mysqli_connect("localhost", "root", "", "tranning_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);

$email = "redavd12@gmail.com";

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    echo "Student Name: " . $row['name'] . "<br>";
} else {
    echo "Student not found.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
