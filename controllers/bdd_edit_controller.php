<?php

require 'co_bdd_controller.php';

$requete = $db->query("select * FROM artist ORDER BY artist_name;");
$artiste = $requete->fetchall(PDO::FETCH_OBJ);
$requete->closeCursor();
$picture_name = $disc->disc_picture;
$error_msg = array();



// verification des inputs :
if (isset($_POST['submit'])) {
    // verif title 
    if (!empty($_POST['title'])) {
        if (preg_match($text_regex, $_POST['title'])) {
            $disc_title = htmlspecialchars($_POST['title']);
        } else {
            $error_msg['title'] = "Veuillez rentrer un titre Valide...";
        }
    } else {
        $error_msg['title'] = "Veuillez rentrer un titre Valide...";
    }
    // verif year 
    if (!empty($_POST['year'])) {
        if (preg_match($num_regex, $_POST['year'])) {
            $disc_year = htmlspecialchars($_POST['year']);
        } else {
            $error_msg['year'] = 'Veuillez rentrer une date valide';
        }
    } else {
        $error_msg['year'] = 'Veuillez rentrer une date';
    }
    // verif image     
    if ($_FILES['picture']['name'] != "") {
        $disc_picture = $_FILES['picture'];
        $picture_path = '../assets/pictures/ ';
        $picture_name = basename($disc_picture['name']);
        $picture_path = trim($picture_path) . $picture_name;
        // type de fichier accepter
        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES['picture']['tmp_name']);
        finfo_close($finfo);
    } else {
        $picture_name = $disc->disc_picture;
    }
    // verif label 
    if (!empty($_POST['label'])) {
        if (preg_match($text_regex, $_POST['label'])) {
            $disc_label = htmlspecialchars($_POST['label']);
        } else {
            $error_msg['label'] = "Veuillez entrer un label correct";
        }
    } else {
        $error_msg['label'] = "Veuillez rentrer un label";
    }
    // verif genre musical 
    if (!empty($_POST['genre'])) {
        if (preg_match($text_regex, $_POST['genre'])) {
            $disc_genre = htmlspecialchars($_POST['genre']);
        } else {
            $error_msg['genre'] = "Veuillez rentrer un genre musical valid";
        }
    } else {
        $error_msg['genre'] = "veuillez rentrer un genre musical";
    }

    // verif prix
    if (!empty($_POST['price'])) {
        if (preg_match($price_regex, $_POST['price'])) {
            $disc_price = htmlspecialchars($_POST['price']);
        } else {
            $error_msg['price'] = " Veuillez rentrer un prix valide";
        }
    } else {
        $error_msg['price'] = "Veuillez rentrer un prix";
    }

    // verife artist name 
    if (!empty($_POST['artist'])) {
        if (preg_match($text_regex, $_POST['artist'])) {
            $artist_id = htmlspecialchars($_POST['artist']);
        }
    }

    if (count($error_msg) == 0) {
        $sql = 'UPDATE disc SET disc_title=:disc_title, disc_year=:disc_year, disc_label=:disc_label, disc_genre=:disc_genre, disc_price=:disc_price, disc_picture=:disc_picture, artist_id=:artist_id WHERE disc_id =:disc_id ';
        if (in_array($mimetype, $aMimeTypes)) {
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)) {
                echo "image dl";
            } else {
                echo "fail dl";
            }
        } else {
            $error_msg['picture'] = "veuillez rentrer une image valide.";
        }
        if ($st = $db->prepare($sql)) {
            $st->bindValue(':disc_id', $_GET['disc_id']);
            $st->bindValue(':disc_title', $disc_title, PDO::PARAM_STR);
            $st->bindValue(':disc_year', $disc_year, PDO::PARAM_INT);
            $st->bindValue(':disc_label', $disc_label, PDO::PARAM_STR);
            $st->bindValue(':disc_genre', $disc_genre, PDO::PARAM_STR);
            $st->bindValue(':disc_price', $disc_price);
            $st->bindValue(':disc_picture', $picture_name, PDO::PARAM_STR);
            $st->bindValue(':artist_id', $artist_id, PDO::PARAM_INT);
            if ($st->execute()) {
                header('Location: ../views/alldata.php');
            } else {
                echo "Probleme technique.";
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">C\'est un echec...</div>';
    }
}



