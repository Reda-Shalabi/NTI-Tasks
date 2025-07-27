<?php
include '../db/db.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied";
    exit();
}


$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM enrollments WHERE id = $id");

header("Location: enrollment.php");
exit();
?>
