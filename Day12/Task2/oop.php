<?php
$conn = new mysqli("localhost", "root", "", "tranning_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

$email = "redavd12@gmail.com";

$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "Student Name: " . $row['name'] . "<br>";
} else {
    echo "Student not found.";
}

$stmt->close();
$conn->close();
?>

