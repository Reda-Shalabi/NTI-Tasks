<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
$alowedExt = ["jpg", "jpeg"];
$allowedTypes = ["image", "wave"];
$allowedSize = 4 * 1024 * 1024;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_FILES['images'])) {
    foreach ($_FILES['images']['name'] as $k => $v) {
        $imageTmp = $_FILES['images']['tmp_name'][$k];
        $imageType = mime_content_type($imageTmp);
        $imageExt = strtolower(pathinfo($v, PATHINFO_EXTENSION));
        $imageSize = $_FILES['images']['size'][$k];
        if (!in_array($imageExt, $alowedExt)) {
            $errors[] = "file ($v) : Extension is not allowed  ($imageExt )";
        }
        if ($imageSize > $allowedSize) {
            $errors[] = "file ($v) : Size is longer than 4 MB  ($imageSize )";
        }

        $typeMain = explode("/", $imageType)[0];
        if (!in_array($typeMain, $allowedTypes)) {
            $errors[] = "file ($v) : Type is not allowed ($imageType)";
        }
    }
    if (!empty($errors)) {
        echo '<div class="alert alert-danger" >';
        echo "<strong>failed to upload files</strong> <br>";
        foreach ($errors as $error) {
            echo "$error<br>";
        }
        echo '</div>';
    } else {
        foreach ($_FILES['images']['name'] as $k => $v) {
            $tmpName = $_FILES['images']['tmp_name'][$k];
            $new_name = uniqid('img_', true) . '.' . $imageExt;
            move_uploaded_file($tmpName, "img/$new_name");
            echo "<img src='img/$new_name' class='img-thumbnail m-3' width='200' >";
        }
        echo '<div class="alert alert-success" >
                  <strong>images is uploaded successfully </strong> 
                  </div>';
    }
}
?>
<div class="container">


    <form class="bg-light p-5 " enctype="multipart/form-data" method="POST">
        <input class="form-control " type="file" id="formFile" name="images[]" multiple>

        <button type="submit" class="btn btn-success w-100 mt-3">Submit</button>
</div>

</form>