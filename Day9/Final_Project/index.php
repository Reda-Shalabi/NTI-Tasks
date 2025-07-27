<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "tranning_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: index.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email already exists.";
        header("Location: index.php");
        exit();
    }

    $query = "INSERT INTO admin (name, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$role')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Signup successful. You can now log in.";
    } else {
        $_SESSION['error'] = "Signup failed. Please try again.";
    }

    header("Location: index.php");
    exit();
}
?>

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <div class="wrapper  my-5 py-5">
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
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name="login" value="Login">
          </div>
          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger mt-2"><?= $_SESSION['error'];
                                                  unset($_SESSION['error']); ?></div>
          <?php endif; ?>
          <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success mt-2"><?= $_SESSION['success'];
                                                  unset($_SESSION['success']); ?></div>
          <?php endif; ?>
        </form>



        <form action="index.php" method="POST" enctype="multipart/form-data" class="signup">
          <div class="field">
            <input type="text" name="name" placeholder="name" required>
          </div>
          <div cla
            <div class="field">
            <input type="text" name="signup_email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="password" name="signup_password" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" name="confirm_password" placeholder="Confirm password" required>
          </div>

          <input type="hidden" name="role" value="user">

          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name="signup" value="Signup">
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="js/login.js"></script>


</body>

</html>