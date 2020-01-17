<?php
require '../controllers/bdd_read_controller.php';

require 'header.php';

if (isset($_SESSION['login'])) {
    require '../controllers/bdd_edit_controller.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="disc_title">Title</label>
                    <input type="text" name="title" id="disc_title" class="form-control" value="<?= $disc->disc_title ?>">
                    <p class="text-danger"><?php if (isset($error_msg['title'])) {echo $error_msg['title'];} ?></p>
                    <label for="disc_year">Année du disque</label>
                    <input type="text" name="year" id="disc_year" class="form-control" value="<?= $disc->disc_year ?>">
                    <p class="text-danger"><?php if (isset($error_msg['year'])) {echo $error_msg['year'];} ?></p>
                    <div class="custom-file">
                        <input type="file" name="picture" id="disc_picture" class="custom-file-input">
                        <label for="disc_picture" class="custom-file-label"><?= $picture_name ?></label>
                        <p class="text-danger"><?php if (isset($error_msg['picture'])) {echo $error_msg['picture'];} ?></p>
                    </div>
                    <img src ='../assets/pictures/<?= $disc->disc_picture ?>' class="img-thumbnail img-fluid">
                    <br>
                    <label for="disc_label">Label</label>
                    <input type="text" name="label" id="disc_label" class="form-control" value="<?= $disc->disc_label ?>">
                    <p class="text-danger"><?php if (isset($error_msg['label'])) { echo $error_msg['label'];} ?></p>
                    <label for="disc_genre">Genre musical</label>
                    <input type="text" name="genre" id="disc_genre" class="form-control" value="<?= $disc->disc_genre ?>">
                    <p class="text-danger"><?php if (isset($error_msg['genre'])) {echo $error_msg['genre'];} ?></p>
                    <label for="disc_price">Pix du disque</label>
                    <input type="text" name="price" id="disc_price" class="form-control" value="<?= $disc->disc_price ?>">
                    <p class="text-danger"><?php if (isset($error_msg['price'])) {echo $error_msg['price'];} ?></p>
                    <label for="disc_price">ID artiste</label>
                    <select class="form-control" id="artist" name="artist">
                 <?php foreach ($artiste AS $nom) {  //Affiche la liste des artistes
                    ?>
                            <option value="<?= $nom->artist_id ?>"<?php if ($disc->artist_id == $nom->artist_id) echo "selected" ?>>
                                    <?= $nom->artist_name ?>
                            </option>
                    <?php
                                                 }
                        ?>
                    </select>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                    <a class="btn btn-danger" role="button" data-toggle="modal" data-target="#delete">DELETE</a></td>
                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="delete">Delete confirm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Voulez vous vraiment supprimer cet objet ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-danger" href="../controllers/bdd_delete_controller.php?disc_id=<?= $disc->disc_id ?>">Delete confirm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>           
        </div>       
    </div>
<?php } else { 
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">          
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="2000">
                <img src="../assets/pictures/bien_essayer.jpg" class="d-block img-thumbnail img-fluid imgcarousel " alt="v">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="../assets/pictures/v_for_vegeta.jpg" class="d-block img-thumbnail img-fluid imgcarousel " alt="jeej">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="../assets/pictures/keyboard_cat.gif" class="d-block img-thumbnail img-fluid imgcarousel " alt="no_comment">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
  </div>           
  </div>       
 </div>
<?php
}
require 'footer.php'
?>