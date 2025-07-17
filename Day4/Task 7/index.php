     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <?php
        $products = ["Monitor" => 1200, "Chair" => 1000, "Headset" => 400, "Keyboard" => 300, "Mouse" => 150];
        arsort($products);
        ?>

     <body class="bg-dark p-5">


         <div class="container">
             <h1 class="text-success">Product arsort</h1>

             <ul class="list-group">
                 <?php foreach ($products as $k => $v) : ?>

                     <li class="list-group-item d-flex justify-content-between ">
                         <span><?= $k ?></span>
                         <span class="badge text-bg-danger rounded-pill"><?= $v ?>EGP</span>
                     </li>

                 <?php endforeach ?>
             </ul>
             <?php
                asort($products);
                ?>

             <h1 class="text-success">Product asort</h1>

             <ul class="list-group">
                 <?php foreach ($products as $k => $v) : ?>

                     <li class="list-group-item d-flex justify-content-between ">
                         <span><?= $k ?></span>
                         <span class="badge text-bg-danger rounded-pill"><?= $v ?>EGP</span>
                     </li>

                 <?php endforeach ?>


                 <?php

                ksort($products);
                ?>

             <h1 class="text-success">Product ksort</h1>

             <ul class="list-group">
                 <?php foreach ($products as $k => $v) : ?>

                     <li class="list-group-item d-flex justify-content-between ">
                         <span><?= $k ?></span>
                         <span class="badge text-bg-danger rounded-pill"><?= $v ?>EGP</span>
                     </li>

                 <?php endforeach ?>

                 <?php
                rsort($products);
                ?>

             <h1 class="text-success">Product rsort</h1>

             <ul class="list-group">
                 <?php foreach ($products as $k => $v) : ?>

                     <li class="list-group-item d-flex justify-content-between ">
                         <span><?= $k ?></span>
                         <span class="badge text-bg-danger rounded-pill"><?= $v ?>EGP</span>
                     </li>

                 <?php endforeach ?>
                 
                 <?php
                sort($products);
                ?>

             <h1 class="text-success">Product sort</h1>

             <ul class="list-group">
                 <?php foreach ($products as $k => $v) : ?>

                     <li class="list-group-item d-flex justify-content-between ">
                         <span><?= $k ?></span>
                         <span class="badge text-bg-danger rounded-pill"><?= $v ?>EGP</span>
                     </li>

                 <?php endforeach ?>
         </div>

     </body>