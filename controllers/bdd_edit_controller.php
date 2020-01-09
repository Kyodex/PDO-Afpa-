<?php

require 'co_bdd_controller.php';

$requete = $db->query("select * FROM artist ORDER BY artist_name;");
$artiste = $requete->fetchall(PDO::FETCH_OBJ);
$requete->closeCursor();
$picture = $disc->disc_picture;



if (isset($_POST['submit'])) {
    $disc_title = $_POST['title'];
    $disc_year = $_POST['year'];
    $disc_picture = $_FILES['picture'];
    $disc_label = $_POST['label'];
    $disc_genre = $_POST['genre'];
    $disc_price = $_POST['price'];
    $artist_name = $_POST['artist'];
    
    // recuperation du chemin, du nom et du fichier
    $picture_path = '../assets/pictures/ ';
    $picture_name = basename($disc_picture['name']);
    $picture_path = trim($picture_path).$picture_name;
    // type de fichier accepter
    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
    // On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES['picture']['tmp_name']);
    finfo_close($finfo);

    if(in_array($mimetype,$aMimeTypes)){
       if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)){
            echo "image dl";
        } else {
            echo "fail dl";
    }}
    //recuperation des artist name pour le select .
    $requete = $db->prepare('SELECT artist_id FROM artist WHERE artist_name = :artist_name');
    $requete->bindValue(':artist_name', $artist_name);
    $requete->execute();
    $jeej = $requete->fetchALL(PDO::FETCH_OBJ);
    $artist_id = $jeej[0]->artist_id;
    
    $sql = 'UPDATE disc SET disc_title=:disc_title, disc_year=:disc_year, disc_label=:disc_label, disc_genre=:disc_genre, disc_price=:disc_price, disc_picture=:disc_picture, artist_id=:artist_id WHERE disc_id =:disc_id ';

    if ($st = $db->prepare($sql)) {
        $st->bindValue(':disc_id', $_GET['disc_id']);
        $st->bindValue(':disc_title', $disc_title);
        $st->bindValue(':disc_year', $disc_year);
        $st->bindValue(':disc_label', $disc_label);
        $st->bindValue(':disc_genre', $disc_genre);
        $st->bindValue(':disc_price', $disc_price);
        if (empty(trim($picture_name))) {
            $picture_name = $picture;
        }
        $st->bindValue(':disc_picture', $picture_name);

        $st->bindValue(':artist_id', $artist_id);
        if ($st->execute()) {
            header('Location: ../views/alldata.php');
        } else {
            echo "Probleme technique.";
        }
    }
}



