<?php
$conn = mysqli_connect("localhost", "root", "", "tranning_system");

$id = $_GET['id'];
$sql = "DELETE FROM courses WHERE id_course = $id";
mysqli_query($conn, $sql);

header("Location: courses.php");
exit();
