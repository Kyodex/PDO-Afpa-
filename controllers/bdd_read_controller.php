<?php

require 'co_bdd_controller.php';

if (isset($_GET['disc_id'])) {
    $sql = 'SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id  WHERE disc_id =?';

    $st = $db->prepare($sql);
    $st->execute(array($_GET['disc_id']));
    $disc = $st->fetch(PDO::FETCH_OBJ);
   
}
    

