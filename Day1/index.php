<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Document</title>
  </head>
  <body style="background: #3f993fff">
    <div class="container">
      <div class="row justify-content-center align-items-center vh-100">
          
       <div class="card p-4">
    <h4 class="mb-3">User Information</h4>
    <form method="POST" action="card.php">
        <div class="mb-2">
            <label>Full Name</label>
            <input type="text" name="w" class="form-control" required />
        </div>
        <div class="mb-2">
            <label>Email</label>
            <input type="email" name="x" class="form-control" required />
        </div>
        <div class="mb-2">
            <label>Age</label>
            <input type="number" name="y" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>City</label>
            <input type="text" name="z" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

    <script src="js/bootstrap.bundle.js"></script>
  </body>
</html>