<?php
require'../controllers/bdd_read_controller.php';
require'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3>Disc N° <?= $disc->disc_id; ?></h1>
                    <div class="card-header">
                        <h3 class="card-title"><?= $disc->disc_title; ?></h3>                    
                        <caption class="card-text"><?= $disc->disc_year; ?></caption>
                    </div>
                    <img src="../assets/pictures/<?= $disc->disc_picture; ?>" class="card-img img-thumbnail">
                    <div class="card-body">
                        <p class="card-text">Label: <?= $disc->disc_label; ?></p>
                        <p class="card-text">Genre: <?= $disc->disc_genre; ?></p>
                        <p class="card-text">Prix: <?= $disc->disc_price; ?>€</p>
                        <p class="card-text">  <?= $disc->artist_name; ?> </p>
                    </div>
                    <a class="badge badge-info" href="alldata.php">Back to home</a>
                    <a href="../controllers/bdd_delete_controller.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-danger" role="button" data-toggle="modal" data-target="#delete">DELETE</a></td>
                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete">Delete confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><?=$disc->disc_title?></span>
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
            </div>
        </div>           
    </div>       
</div>


<?php
require 'footer.php';
?>