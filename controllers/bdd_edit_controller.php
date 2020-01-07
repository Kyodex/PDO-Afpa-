<?php
require 'co_bdd_controller.php';

$requete = $db->query("select * FROM artist ORDER BY artist_name;");
$artiste = $requete->fetchall(PDO::FETCH_OBJ);
$requete->closeCursor();
$picture=$disc->disc_picture;
if(isset($_POST['submit'])){
        $disc_title = $_POST['title'];
        $disc_year = $_POST['year'];
        $disc_picture =basename($_POST['picture']).PHP_EOL;
        $disc_label =$_POST['label'];
        $disc_genre =$_POST['genre'];
        $disc_price = $_POST['price'];
        $artist_name = $_POST['artist'];
        
                
        $requete = $db->prepare('SELECT artist_id FROM artist WHERE artist_name = :artist_name');
        $requete->bindValue(':artist_name',$artist_name);
        $requete->execute();
        $jeej = $requete->fetchALL(PDO::FETCH_OBJ);
        $artist_id = $jeej[0]->artist_id;
        
$sql = 'UPDATE disc SET disc_title=:disc_title, disc_year=:disc_year, disc_label=:disc_label, disc_genre=:disc_genre, disc_price=:disc_price, disc_picture=:disc_picture, artist_id=:artist_id WHERE disc_id =:disc_id ';

if($st = $db ->prepare($sql)){
    $st->bindValue(':disc_id',$_GET['disc_id']);
    $st->bindValue(':disc_title',$disc_title);
    $st->bindValue(':disc_year',$disc_year);
    $st->bindValue(':disc_label',$disc_label);
    $st->bindValue(':disc_genre',$disc_genre);
    $st->bindValue(':disc_price',$disc_price);
    if(empty(trim($disc_picture))){
       $disc_picture=$picture;
    }
    $st->bindValue(':disc_picture',$disc_picture);
    
    $st->bindValue(':artist_id',$artist_id);
        if($st->execute()){
           header('Location: ../views/alldata.php');

        }else{
            echo "Probleme technique.";
        }
}}



