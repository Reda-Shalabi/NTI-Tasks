<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body class="bg-success">
    <?php
    $person = [
        "Name" => "Ahmed",
        "Job Title" => "Software Engineer",
        "Department" => "IT",
        "Salary" => "100,000 EGP"
    ];
    ?>
        <h2 class="text-white text-center mt-5">User Info</h2>
        <div class="container mt-5">
            <ul class="list-group">
                <?php foreach ($person as $key => $value): ?>
                    <li class="list-group-item">
                        <strong><?= $key ?>:</strong> <?= $value ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>