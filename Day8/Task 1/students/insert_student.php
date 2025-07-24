<?php
include '../db/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];

$q = "INSERT INTO students (name, email, phone, dob) VALUES ('$name', '$email', '$phone', '$dob')";
mysqli_query($econn, $q);

header("Location: student.php");
exit();
?>
