<?php
session_start();
include 'db/db.php';
include 'navbar.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM login_logs ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Logs</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        h2 {
            padding: 15px;
            text-align: center;           
        }
    </style>
</head>

<body>

    <h2>Login Logs</h2>
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>IP Address</th>
                <th>Status</th>
                <th>Login Time</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= $row['ip_address'] ?></td>
                    <td class="<?= $row['status'] === 'success' ? 'bg-success text-dark' : 'bg-danger text-black' ?>">
                        <?= ucfirst($row['status']) ?>
                    </td>

                    </td>
                    <td><?= $row['login_time'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>