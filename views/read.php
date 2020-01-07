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
            </div>
        </div>           
    </div>       
</div>


<?php
require 'footer.php';
?>