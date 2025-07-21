<?php
session_start();

// Clear session
if (isset($_POST['clear'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// Remove specific user
if (isset($_POST['remove_user'])) {
    $index = $_POST['remove_user'];
    if (isset($_SESSION['users'][$index])) {
        unset($_SESSION['users'][$index]);
        $_SESSION['users'] = array_values($_SESSION['users']); // Re-index array
    }
}

// Save new user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['clear']) && !isset($_POST['remove_user'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    if ($name && $email) {
        $_SESSION['users'][] = ['name' => $name, 'email' => $email];
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>Regstration Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Regstration Form</h3>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Save</button>
                        </form>
                        <?php if (!empty($_SESSION['users'])): ?>
                            <div class="mt-4">
                                <form method="POST" class="mb-2">
                                    <button type="submit" name="clear" class="btn btn-danger w-100">Clear Session</button>
                                </form>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($_SESSION['users'] as $i => $user): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                                <td>
                                                    <form method="POST" style="display:inline;">
                                                        <button type="submit" name="remove_user" value="<?php echo $i; ?>" class="btn btn-warning btn-sm">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>