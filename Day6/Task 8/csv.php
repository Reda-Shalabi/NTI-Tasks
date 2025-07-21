<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['grade'])) {
    $name = $_POST['name'];
    $grade =  $_POST['grade'];



    $folder = "exports/" . date("Y-m-d");
    if (!file_exists($folder))
         mkdir($folder, 0777, true);

    $file = fopen("$folder/students.csv", "a");
    fputcsv($file, [$name, $grade]);
    fclose($file);

    echo "Saved to CSV.";
} else {
    echo "Missing values or wrong method.";
}
?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="p-5 bg-dark">
    <form action="csv.php" method="POST" class="was-validated w-50 ">
        <div class="input-group mb-3 ">
          <input type="text" id="name" name="name" required class="form-control" placeholder="student name" aria-label="Recipient’s username" aria-describedby="button-addon2">

          <input type="number" id="grade" name="grade" min="10" max="100" required class="form-control" placeholder="student grade min=10 & max=100" aria-label="Recipient’s username" aria-describedby="button-addon2">
     
          <button class="btn btn-outline-primary" id="button-addon2" type="submit" required>send</button>
          </div>
    </form>
</body>