     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <?php
        $Employees = ["Reda" => 10000, "Ahmed" => 7000, "7amada" => 6000, "niraa" => 4000, "Ali" => 3500];
        ?>

     <body class="bg-danger p-5">


         <div class="container">
             <h1 class="text-dark">High Salary Employees</h1>

             <ul class="list-group bg- mt-4">
                 <?php foreach ($Employees as $k => $v) : ?>
                     <?php if ($v > 5000): ?>

                         <li class="list-group-item d-flex justify-content-between ">
                             <span><?= $k ?></span>
                             <span class="badge text-bg-dark rounded-pill"><?= $v ?> EGP</span>
                         </li>
                     <?php endif ?>

                 <?php endforeach ?>
             </ul>

         </div>

     </body>