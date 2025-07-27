<?php
session_start();
var_dump($_SESSION);
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION['name'];
$role = $_SESSION['role'];
$login_time = $_SESSION['login_time'] ?? 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - <?php echo ucfirst($role); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .dashboard-header {
            background: #343a40;
            color: white;
            padding: 20px 0;
        }
        .dashboard-header h2 {
            margin: 0;
        }
        .card {
            border-radius: 16px;
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>

    <div class="dashboard-header text-center mb-4">
        <div class="container">
            <h2>Welcome, <?php echo htmlspecialchars($name); ?> (<?php echo htmlspecialchars($role); ?>)</h2>


        </div>
    </div>

    <div class="container">
        <div class="text-end mb-4">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <div class="row g-4">

            <?php if ($role === 'admin'): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Admin Panel</h5>
                            <p class="card-text">Manage users, settings, and access detailed reports.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Go to Panel</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Shared block -->
            <div class="col-md-4">
                <div class="card shadow-sm bg-white">
                    <div class="card-body">
                        <h5 class="card-title text-success">Profile</h5>
                        <p class="card-text">Update your info, change password, and manage preferences.</p>
                        <a href="#" class="btn btn-outline-success btn-sm">Edit Profile</a>
                    </div>
                </div>
            </div>

            <?php if ($role === 'user'): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title text-info">User Area</h5>
                            <p class="card-text">Browse available services, tools, and content for users.</p>
                            <a href="#" class="btn btn-outline-info btn-sm">Explore</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>
