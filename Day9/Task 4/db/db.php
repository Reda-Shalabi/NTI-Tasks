<?php
$econn = mysqli_connect("localhost", "root", "", "login_project");
if (!$econn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
