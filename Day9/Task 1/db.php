<?php
$econn = mysqli_connect("localhost", "root", "", "my_login_system");
if (!$econn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
