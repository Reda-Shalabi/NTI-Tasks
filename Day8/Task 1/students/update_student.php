<?php
include '../db/db.php';

if (isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['dob'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    $q = "UPDATE students SET name='$name', email='$email', phone='$phone', dob='$dob' WHERE id=$id";
    mysqli_query($econn, $q);

    header("Location: student.php");
    exit();
} else {
    
    echo "⚠️ Error: Missing required fields.";
}
?>
