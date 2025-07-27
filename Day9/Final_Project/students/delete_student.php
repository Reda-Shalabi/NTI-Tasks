<?php
include '../db/db.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied";
    exit();
}

$id = $_GET['id'];
$q = "DELETE FROM students WHERE id = $id";
mysqli_query($conn, $q);
header("Location: student.php");
exit();
?>
