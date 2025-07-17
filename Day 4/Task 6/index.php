<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php
$Cources = ["HTML", "CSS", "JS", "PHP"];
array_push($Cources,"MYSQL") ;
array_unshift($Cources,"GIT");
array_shift($Cources);
?>
<body class="bg-success">
    
  <div class="container mt-5">
    <h1 class="text-dark">Available Cources</h1>
         <ul class="list-group">
             <?php foreach ($Cources as $c): ?>
                 <li class="list-group-item"><?= $c  ?></li>
             <?php endforeach ?>
         </ul>
     </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>