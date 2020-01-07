<?php
require'co_bdd_controller.php';


$artist = $db->query("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id ORDER BY disc_id");
$tableauart = $artist->fetchAll(PDO::FETCH_OBJ);
$artist->closeCursor();