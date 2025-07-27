<?php
include("../db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];
    $enroll_date = date("Y-m-d");

    $sql = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date) 
            VALUES ('$student_id', '$course_id', '$grade', '$enroll_date')";

    if (mysqli_query($conn, $sql)) {
        header("Location: enrollment.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($econn);
    }
}
?>
