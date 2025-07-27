<?php
include '../db/db.php';

session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "❌ Access Denied";
    exit();
}


$id = $_GET['id'];
$sql = "DELETE FROM courses WHERE id_course = $id";
mysqli_query($conn, $sql);

header("Location: courses.php");
exit();
