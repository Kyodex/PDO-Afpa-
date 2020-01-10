<?php
require'header.php';
require '../controllers/bdd_create_controller.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" id="disc_title" class="form-control">
                <p class="text-danger"><?php if(isset($error_msg['title'])){ echo $error_msg['title'];} ?></p>
                <label for="year">Année du disque</label>
                <input type="text" name="year" id="disc_year" class="form-control"> 
                <p class="text-danger"><?php if(isset($error_msg['year'])){ echo $error_msg['year'];} ?></p>
                <div class="custom-file">
                <input type="file" name="picture" id="disc_picture" class="custom-file-input">
                <label for="picture" class="custom-file-label">Image de l'album</label>
                <p class="text-danger"><?php if(isset($error_msg['picture'])){ echo $error_msg['picture'];} ?></p>
                </div>
                <label for="label">Label</label>
                <input type="text" name="label" id="disc_label" class="form-control">
                <p class="text-danger"><?php if(isset($error_msg['label'])){ echo $error_msg['label'];} ?></p>
                <label for="genre">Genre musical</label>
                <input type="text" name="genre" id="disc_genre" class="form-control">
                <p class="text-danger"><?php if(isset($error_msg['genre'])){ echo $error_msg['genre'];} ?></p>
                <label for="price">Pix du disque</label>
                <input type="text" name="price" id="disc_price" class="form-control">
                <p class="text-danger"><?php if(isset($error_msg['price'])){ echo $error_msg['price'];} ?></p>
                <label for="price">ID artiste</label>
                <select class="form-control" id="artist" name="artist">
                    <?php
                    foreach ($artiste AS $nom) {  //Affiche la liste des artistes
                        ?>
                    <option value="<?=$nom->artist_id?>">
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
