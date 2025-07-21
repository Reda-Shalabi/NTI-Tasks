<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

    <?php
    if (isset($_GET['delete'])) {
        $target = $_GET['delete'];
        if (file_exists($target)) {
            unlink($target);
            echo '<div class="alert alert-success ">deleted image in path  ' . $target . '<a href="Task6.php"> go to images table</a></div>';
        } else {
            echo '<div class="alert alert-warning ">image not found  <a href="Task6.php"> go to images table</a></div>';
        }
    } else {
        echo '<div class="alert alert-danger ">No images sent to this page <a href="Task6.php"> go to images table</a></div>';
    }
    ?>

</div>