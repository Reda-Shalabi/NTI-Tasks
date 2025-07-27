<?php
$conn = mysqli_connect("localhost", "root", "", "tranning_system");

$id = $_POST['id_course'];
$title = $_POST['title'];
$price = $_POST['price'];
$hours = $_POST['hours'];

$sql = "UPDATE courses SET title='$title', price='$price', hours='$hours' WHERE id_course = $id";
mysqli_query($conn, $sql);

header("Location: courses.php");
exit();
