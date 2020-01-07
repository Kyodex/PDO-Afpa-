<?php
require'header.php';
require '../controllers/bdd_create_controller.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="../controllers/bdd_create_controller.php" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" id="disc_title" class="form-control">
                <label for="year">Année du disque</label>
                <input type="text" name="year" id="disc_year" class="form-control">
                <label for="picture">Image de l'album</label>
                <input type="file" name="picture" id="disc_picture">
                <br>
                <label for="label">Label</label>
                <input type="text" name="label" id="disc_label" class="form-control">
                <label for="genre">Genre musical</label>
                <input type="text" name="genre" id="disc_genre" class="form-control">
                <label for="price">Pix du disque</label>
                <input type="text" name="price" id="disc_price" class="form-control">
                <label for="price">ID artiste</label>
                <select class="form-control" id="artist" name="artist">
                    <?php
                    foreach ($artiste AS $nom) {  //Affiche la liste des artistes
                        ?>
                        <option>
                            <?= $nom->artist_name ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
            </form>

            <a class="badge badge-info" href="alldata.php">Back to home</a>

        </div>           
    </div>       
</div>

<?php
require 'footer.php';
