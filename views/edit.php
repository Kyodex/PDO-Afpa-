<?php
require '../controllers/bdd_read_controller.php';
require '../controllers/bdd_edit_controller.php';
require 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" id="disc_title" class="form-control" value="<?=$disc->disc_title?>">
                <label for="year">Année du disque</label>
                <input type="text" name="year" id="disc_year" class="form-control" value="<?=$disc->disc_year?>">
                <label for="picture">Image de l'album</label>
                <img src ='../assets/pictures/<?=$disc->disc_picture?>' class="img-thumbnail img-fluid">
                <input type="file" name="picture" id="disc_picture">
                <br>
                <label for="label">Label</label>
                <input type="text" name="label" id="disc_label" class="form-control" value="<?=$disc->disc_label?>">
                <label for="genre">Genre musical</label>
                <input type="text" name="genre" id="disc_genre" class="form-control" value="<?=$disc->disc_genre?>">
                <label for="price">Pix du disque</label>
                <input type="text" name="price" id="disc_price" class="form-control" value="<?=$disc->disc_price?>">
                <label for="price">ID artiste</label>
                <select class="form-control" id="artist" name="artist">
                    <?php
                    foreach ($artiste AS $nom) {  //Affiche la liste des artistes
                        ?>
                        <option value="<?= $nom->artist_name ?>"<?php if($disc->artist_id == $nom->artist_id) echo "selected"?>>
                            <?= $nom->artist_name ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
            </form>
        </div>           
    </div>       
</div>


<?php require 'footer.php'
?>