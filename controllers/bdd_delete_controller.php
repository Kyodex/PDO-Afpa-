<?php
require 'co_bdd_controller.php';

$sql = "DELETE FROM disc WHERE disc_id= :disc_id";
$delete = $db->prepare($sql);
    $delete -> bindValue(':disc_id',$_GET['disc_id']);
  if ($delete->execute()) {
        header("Location: ../views/alldata.php");
    }
