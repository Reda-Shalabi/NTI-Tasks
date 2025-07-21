<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $folder = 'logs/' . date('Y-m-d') . '/';
  if (!file_exists($folder))
    mkdir($folder, 0777, true);

  $fileName = basename($_FILES['image']['name']);
  $ext = pathinfo($fileName, PATHINFO_EXTENSION);
  $new_name = uniqid('img_', true) . '.' . $ext;
  $target = $folder . $new_name;
  $allowed = ['image/jpeg', 'image/png'];
  if (in_array($_FILES['image']['type'], $allowed)) {
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    echo "<div class='alert alert-success'>Uploaded to $target </div>";
  } else {
    echo "<div class='alert alert-danger'>Invalid type of image check it out! </div>";
  }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container m-5">
  <form method="POST" enctype="multipart/form-data" class="was-validated">
    <div class="input-group mb-3">
      <input type="file" class="form-control" id="validationServer01" placeholder="Recipient’s username" aria-label="Recipient’s username" aria-describedby="button-addon2" name="image" required>
      <button class="btn btn-primary" type="submit" id="button-addon2">Button</button>
    </div>
  </form>

</div>