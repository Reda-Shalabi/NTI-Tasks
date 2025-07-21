<?php
$message = '';
$Name = $_POST['Name'] ?? '';
$email = $_POST['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $tmpName = $_FILES['image']['tmp_name'];
    $name1 = $_FILES['image']['name'];
    move_uploaded_file($tmpName, "img/$name1");
    $message = "<div class='alert alert-success'>Account Created Successfully</div>";
  } else {
    $message = "<div class='alert alert-danger'>Please upload an image</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>


  <div class="wrapper my-5 py-5">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="login.php" method="POST" class="login">
          <div class="field">
            <input type="text" name="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login">
          </div>
          <div class="alert alert-secondary mt-3 p-2 text-center" style="font-size: 0.9rem;">
            🔐 <strong>Admin Login</strong><br>
            Email: <code>admin@example.com</code><br>
            Password: <code>123456</code>
          </div>


        </form>

        <form action="#signup" class="signup">
          <div class="field">
            <input type="text" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Confirm password" required>
          </div>
          <div class="field mb-4">
            <label class="form-label text-light">Profile image</label>
            <input class="form-control mb-5" type="file" id="formFile" name="image">
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Signup">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="JS/login.js"></script>


</body>

</html>