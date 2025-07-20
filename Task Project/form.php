    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <?php
    $email = "admin@example.com";
    $password = "123456";
    if (isset($_GET['email']) &&  isset($_GET['password'])) {

        if ($_GET['email'] == $email && $_GET['password'] == $password) {
            header("Location: login.php");
        } else {
            $message = '<div class="alert alert-danger" >
        <i class="bi bi-exclamation-triangle-fill text-warning-emphasis"></i>
                  wrong user or pass 
                  </div>';
        }
    }

    ?>

    <body class="bg-dark">
        <div class="container m-5 p-5 ">
            <div class=" row d-flex justify-content-center">

                <form method="GET" class='was-validated w-50 '>
                    <?= $message ?>

                    <div class="mb-3 mt-3">
                        <label for="validationServer01" class="form-label text-light">Email address</label>
                        <input type="text" class="form-control mb-3" id="validationServer01" required name="email">
                    </div>
                    <div class="mb-3">
                        <label for="validationServer02" class="form-label text-light">Password</label>
                        <input type="text" class="form-control mb-3" id="validationServer02" required name="password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">login</button>
                </form>
            </div>
        </div>
    </body>