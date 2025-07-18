<link href="css/bootstrap.min.css" rel="stylesheet">

<?php
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    // header("Location: denied.php");
    echo '<div class="alert alert-danger p-3 m-3 "> Access denied: Invalid host. </div>';
    exit;
} else {
    echo '<div class="alert alert-success p-3 m-3 "> Access Ok: Good host </div>';
}