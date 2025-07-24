<?php
include '../db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    $sql = "UPDATE enrollments SET student_id='$student_id', course_id='$course_id', grade='$grade' WHERE id=$id";

    if (mysqli_query($econn, $sql)) {
        header("Location: enrollment.php");
        exit();
    } else {
        echo "Error updating enrollment: " . mysqli_error($econn);
    }
}
?>
