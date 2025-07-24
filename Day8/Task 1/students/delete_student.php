<?php
include '../db/db.php';
$id = $_GET['id'];
$q = "DELETE FROM students WHERE id = $id";
mysqli_query($econn, $q);
header("Location: student.php");
exit();
?>
