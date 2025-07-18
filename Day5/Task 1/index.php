<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <table class="table table-bordered table-striped">
                <tr><th>Key</th><th>Value</th></tr>
                <tr><td>PHP_SELF</td><td><?= $_SERVER['PHP_SELF'] ?></td></tr>
                <tr><td>SERVER_NAME</td><td><?= $_SERVER['SERVER_NAME'] ?></td></tr>
                <tr><td>HTTP_HOST</td><td><?= $_SERVER['HTTP_HOST'] ?></td></tr>
                <tr><td>HTTP_USER_AGENT</td><td><?= $_SERVER['HTTP_USER_AGENT'] ?></td></tr>
                <tr><td>REQUEST_METHOD</td><td><?= $_SERVER['REQUEST_METHOD'] ?></td></tr>
            </table>
        </div>
</div>
</body>
</html>