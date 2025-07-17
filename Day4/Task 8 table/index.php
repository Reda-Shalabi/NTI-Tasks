     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <?php
        $Employees = ["Reda" => 10000, "Ahmed" => 7000, "Ziad" => 6000, "7mada" => 4000, "ali" => 3500];
        ?>

     <body class="bg-success p-5">


         <div class="container ">
             <h1 class="text-white">High Salary Employees</h1>
             


             </ul>
             <table class="table  table-striped table-bordered ">
                 <thead>
                     <tr>

                         <th scope="col" class="bg-dark text-white">Name</th>
                         <th scope="col" class="bg-dark text-white">Salary</th>


                     </tr>
                 </thead>


                 <tbody>
                     <?php
                        foreach ($Employees as $k => $v) :
                        ?>
                         <?php if ($v > 5000) : ?>
                             <tr>
                                 <td> <span><?= $k ?></span>
                                 <td> <span class="badge text-bg-dark rounded-pill"><?= $v ?> EGP</span></td>


                             </tr>


                         <?php endif ?>

                     <?php endforeach ?>
                 </tbody>
             </table>
         </div>

     </body>