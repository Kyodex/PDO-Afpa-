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
                <tbody>
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
                                <a href="../controllers/bdd_delete_controller.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-danger" role="button" data-toggle="modal" data-target="#delete">DELETE</a></td>
                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete">Delete confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">JEEJ</span>
                                                </button>
                                            </div>
                                        <div class="modal-body">
                                            Voulez vous vraiment supprimer cet objet ?
                                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Delete confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <th><a class="badge badge-warning" href="create.php">Create</a></th>
                </tfoot>
            </table>            
        </div>           
    </div>       
</div>

<?php
require 'footer.php';
?>