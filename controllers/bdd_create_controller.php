<?php

require 'co_bdd_controller.php';

$requete = $db->query("select * FROM artist ORDER BY artist_name;");
$artiste = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

if (isset($_POST['submit'])) {
    $disc_title = $_POST['title'];
    $disc_year = $_POST['year'];
    $disc_picture = $_FILES['picture'];
    $disc_label = $_POST['label'];
    $disc_genre = $_POST['genre'];
    $disc_price = $_POST['price'];
    $artist_name = $_POST['artist'];

    $picture_path = '../assets/pictures/ ';
    $picture_name = basename($disc_picture['name']);
    $picture_path = trim($picture_path) . $picture_name;
    // type de fichier accepter
    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
    // On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES['picture']['tmp_name']);
    finfo_close($finfo);

    if (in_array($mimetype, $aMimeTypes)) {
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)) {
            echo "image dl";
        } else {
            echo "fail dl";
        }
    }

    $requete = $db->prepare('SELECT artist_id FROM artist WHERE artist_name = :artist_name');
    $requete->bindValue(':artist_name', $artist_name);
    $requete->execute();
    $jeej = $requete->fetchAll(PDO::FETCH_OBJ);
    $artist_id = $jeej[0]->artist_id;


    $sql = 'INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price, :artist_id)';

    if ($st = $db->prepare($sql)) {
        $st->bindValue(':disc_title', $disc_title);
        $st->bindValue(':disc_year', $disc_year);
        $st->bindValue(':disc_picture', $picture_name);
        $st->bindValue(':disc_label', $disc_label);
        $st->bindValue(':disc_genre', $disc_genre);
        $st->bindValue(':disc_price', $disc_price);
        $st->bindValue(':artist_id', $artist_id);
        if ($st->execute()) {
            header('Location: ../views/alldata.php');
        } else {
            echo "Probleme technique.";
        }
    }
}
?>