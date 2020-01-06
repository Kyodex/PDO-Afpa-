<?php
require 'co_bdd_controller.php';

$requete = $db->query("select * FROM artist ORDER BY artist_name;");
$artiste = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

if(isset($_POST['submit'])){
        $disc_title = $_POST['title'];
        $disc_year = $_POST['year'];
        $disc_picture =$_POST['picture'];
        $disc_label =$_POST['label'];
        $disc_genre =$_POST['genre'];
        $disc_price = $_POST['price'];
        $artist_name = $_POST['artist'];
        
        $requete = $db->prepare('SELECT artist_id FROM artist WHERE artist_name = :artist_name');
        $requete->bindValue(':artist_name',$artist_name);
        $requete->execute();
        $jeej = $requete->fetchAll(PDO::FETCH_OBJ);
        $artist_id = $jeej[0]->artist_id;
        

$sql = 'INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price, :artist_id)';

if($st = $db ->prepare($sql)){
    $st->bindValue(':disc_title',$disc_title);
    $st->bindValue(':disc_year',$disc_year);
    $st->bindValue(':disc_picture',$disc_picture);
    $st->bindValue(':disc_label',$disc_label);
    $st->bindValue(':disc_genre',$disc_genre);
    $st->bindValue(':disc_price',$disc_price);
    $st->bindValue(':artist_id',$artist_id);
        if($st->execute()){
            header('Location: ../views/alldata.php');

        }else{
            echo "Probleme technique.";
        }
}}
?>