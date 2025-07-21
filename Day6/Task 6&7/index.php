<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
$images = glob("uploads/" . "*.{jpg,png,jpeg}", GLOB_BRACE);
?>

<div class="container m-5 p-5">

   <table class="table table-dark table-striped ">
      <thead>
         <tr>
            <th class="px-5">Image path</th>
            <th class="">Actions</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($images as $image): ?>
            <tr>
               <td class="px-5">
                  <img src="<?= $image ?>" width="50" class="mb-2"><br>
                  <p><?= $image ?></p>
               </td>
               <td>
                  <a href="delete.php?delete=<?= $image ?>" class="btn btn-danger">
                     delete
                  </a>
               </td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
</div>