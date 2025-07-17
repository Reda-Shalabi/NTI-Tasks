<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<?php
$x = [
    [
        "name" => 'Labtop',
        "price" => 10000,
        "quantity" => 5
    ],
    [
        "name" => 'Phone',
        "price" => 7000,
        "quantity" => 3
    ],
    [
        "name" => 'Tablet',
        "price" => 3000,
        "quantity" => 7
    ]
];
?>
<body class="bg-success">
    <div class="container mt-5">
      <h2 class="text-success mb-4">Product Inventory</h2>
      <table class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>Name</th>
            <th>Price (EGP)</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($x as $value): ?>
            <?php if ($value['quantity'] < 7): ?>
            <tr>
              <td><?php echo $value['name']; ?></td>
              <td><?php echo $value['price']; ?></td>
              <td><?php echo $value['quantity']; ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
       </tbody>
      </table>
    </div>
</body>
</html>