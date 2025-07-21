    <?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
}
?>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <body class="bg-dark p-5">

        <div class="container d-flex justify-content-center p-5 ">

            <form class="bg-light-emphasis w-50 p-5">
                <?php
                echo " <div class='alert alert-success mb-5 ' >
                <i class='bi bi-check-square-fill mx-2 text-success'></i>
                  <strong>welcome, Admin(Admin) </strong> 
                  </div> "; ?>
                <div class="row d-flex justify-content-between ">
                    <a href="index.php" class="btn btn-primary col-lg-3">logout</a>
                    <a href="product.php" class="btn btn-primary col-lg-3">products</a>
                    <a href="index.php#signup" class="btn btn-primary col-lg-3">create account</a>
                </div>
            </form>
        </div>
    </body>