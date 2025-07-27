<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$admin = $_SESSION['admin'];
$loginTime = $_SESSION['login_time'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </div>
<?php endif; ?>

<h3>Welcome, <?= $admin['name'] ?>!</h3>
<p>Email: <?= $admin['email'] ?></p>
<p>Login Time: <?= $loginTime ?></p>
<a href="logout.php" class="btn btn-danger">Logout</a>
</body>
</html>
