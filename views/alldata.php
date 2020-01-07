<?php
require 'header.php';
require '../controllers/bdd_index_controller.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <table class="table table-dark table responsive">
                <thead>
                    <tr>
                        <th>Tilte</th>
                        <th>Year</th>
                        <th>Picture</th>
                        <th>Label</th>
                        <th>Genre</th>
                        <th>Prix</th>
                        <th>Artist Name</th>
                    </tr>
                </thead>
                <?php foreach ($tableauart as $disc) { ?>
                    <tr>

                        <td><?= $disc->disc_title ?></td>
                        <td><?= $disc->disc_year ?></td>
                        <td><img src="../assets/pictures/<?= $disc->disc_picture ?>" height="150px" width="150px" ></td>
                        <td><?= $disc->disc_label ?></td>
                        <td><?= $disc->disc_genre ?> Music</td>
                        <td><?= $disc->disc_price ?>€</td>
                        <td><?= $disc->artist_name ?></td>
                        <td><a href="read.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-outline-info" role="button">Read</a>
                            <a href="edit.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-outline-warning" role="button">Edit</a>
                            <a href="../controllers/bdd_delete_controller.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-danger" role="button">DELETE</a></td>
                    </tr>
                <?php } ?>
                    <th><a class="badge badge-warning" href="create.php">Create</a></th>
            </table>
        </div>           
    </div>       
</div>

<?php
require 'footer.php';
?>