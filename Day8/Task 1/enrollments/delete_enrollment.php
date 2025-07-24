<?php
include '../db/db.php';

$id = $_GET['id'];
mysqli_query($econn, "DELETE FROM enrollments WHERE id = $id");

header("Location: enrollment.php");
exit();
?>
