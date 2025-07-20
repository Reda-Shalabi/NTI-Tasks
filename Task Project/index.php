<?php
$message = '';
$showCard = false;
$Name = $_POST['Name'] ?? '';
$email = $_POST['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $tmpName = $_FILES['image']['tmp_name'];
        $name1 = $_FILES['image']['name'];
        move_uploaded_file($tmpName, "img/$name1");
        $message = "<div class='alert alert-success'>Account Created Successfully</div>";
        $showCard = true;
    } else {
        $message = "<div class='alert alert-danger'>Please upload an image</div>";
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<body class="bg-dark">
<div class="container m-5 p-5 bg-dark">
    <?= $message ?>

    <?php if ($showCard): ?>
    <div class="row">
        <div class='card img-thumbnail col-md-3' width='200'>
            <img src='img/<?= htmlspecialchars($name1) ?>' class='card-img-top' alt="Profile Image">
            <div class='card-body'>
                <h5 class='card-title'><?= htmlspecialchars($Name) ?></h5>
                <p class='card-text'><?= htmlspecialchars($email) ?></p>
                <a href="#" class="btn btn-primary">Go Products</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" >
        <div>
            <label class="form-label text-light">Name</label>
            <input type="text" class="form-control mb-3" name="Name">
        </div>
        <div>
            <label class="form-label text-light">Email address</label>
            <input type="text" class="form-control mb-3" name="email">
        </div>
        <div>
            <label class="form-label text-light">Password</label>
            <input type="text" class="form-control mb-3" name="password">
        </div>
        <div class="col-md-12">
            <label class="form-label text-light">Profile image</label>
            <input class="form-control mb-5" type="file" id="formFile" name="image">
        </div>
        <button type="submit" class="btn btn-success w-100">Sign UP</button>
    </form>
</div>
    
</body>