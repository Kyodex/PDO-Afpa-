<?php
require 'co_bdd_controller.php';
require 'bdd_read_controller.php';

$sql = "DELETE FROM disc WHERE disc_id= :disc_id";
$delete = $db->prepare($sql);
    $delete -> bindValue(':disc_id',$_GET['disc_id']);
  if ($delete->execute()) {
      $img="../assets/pictures/" . $disc->disc_picture;
      unset($img);
        header("Location: ../views/alldata.php");
    }
