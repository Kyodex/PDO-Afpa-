<?php
require 'header.php';
require '../controllers/bdd_index_controller.php';
?>
   
<table class="table table-dark table responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tilte</th>
        <th>Year</th>
        <th>Picture</th>
        <th>Label</th>
        <th>Genre</th>
        <th>Prix</th>
        <th>Artist id</th>
    </tr>
    </thead>
       <?php foreach($tableauart as $disc){ ?>
    <tr>
        <td><?=$disc->disc_id?></td>
        <td><?=$disc->disc_title?></td>
        <td><?=$disc->disc_year?></td>
        <td><img src="../assets/pictures/<?=$disc->disc_picture?>" height="150px" width="150px" ></td>
        <td><?=$disc->disc_label?></td>
        <td><?=$disc->disc_genre?> Music</td>
        <td><?=$disc->disc_price?>$</td>
        <td><?=$disc->artist_id.$disc->artist_name?></td>
        <td><a href="read.php" class="btn btn-outline-primary" role="button">Read</a>
            <a href="edit.php" class="btn btn-outline-primary" role="button">Edit</a></td>
    </tr>
       <?php } ?>
</table>
<ul>
  <li>
    <a href="create.php"><strong>Create</strong></a> - add
  </li>
</ul>

<?php
require 'footer.php';
?>