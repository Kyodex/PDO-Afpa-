<?php

require 'co_bdd_controller.php';

if (isset($_GET['disc_id'])) {
    $sql = 'SELECT * FROM disc WHERE disc_id =?';

    $st = $db->prepare($sql);
    $st->execute(array($_GET['disc_id']));
    $disc = $st->fetch(PDO::FETCH_OBJ);

}
    

