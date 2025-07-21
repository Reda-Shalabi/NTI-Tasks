<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Log File</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h3>Logs</h3>
    <pre>
    <?php
    session_unset();
    session_destroy();
    header("Location : index.php");
    ?></pre>
</body>

</html>