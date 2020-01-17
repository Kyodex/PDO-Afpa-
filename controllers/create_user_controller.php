<?php

require 'co_bdd_controller.php';

$errorco = array();

if (isset($_POST['submit'])) {
// verif login :
    if (!empty($_POST['login'])) {
        if (preg_match($text_regex, $_POST['login'])) {
            $login = htmlspecialchars($_POST['login']);
        } else {
            $errorco['login'] = "Problème : Veuillez rentrer un login sans cararctere speciaux.";
        }
    } else {
        $errorco['login'] = "Problème : Veuillez rentrer un indentifiant";
    }

// verif mot de passe : 
    if (!empty($_POST['password1'])) {
        if(preg_match($password_regex, $_POST['password1'])){
        $password1 = htmlspecialchars($_POST['password1']);
        }else{
            $errorco['password1']="Votre mot de passe n'est pas assez sécuriser : Une MAJ un Chiffre et un caractère special min.";
        }
    } else {
        $errorco['password1'] = "Veuillez rentrer un mot de passe";
    }
    if (!empty($_POST['password2'])) {
        if(preg_match($password_regex, $_POST['password2'])){
        }else{
            $errorco['password2']="Votre mot de passe n'est pas assez sécuriser : Une MAJ un Chiffre et un caractère special min.";
        }
        if ($_POST['password2'] == $password1) {
            $password = password_hash($password1, PASSWORD_DEFAULT);
        } else {
            $errorco['password2'] = "Problème: Le mot de passe est different de celui tapé précedement";
        }
    } else {
        $errorco['password2'] = "Problème: Veuillez réentrer votre mot de passe";
    }
    
    if(count($errorco)==0){
                $sql = 'INSERT INTO user_connexion (login, password) VALUES (:login, :password)';
            if($st = $db->prepare($sql)){
                $st->bindValue(':login', $login, PDO::PARAM_STR);
                $st->bindValue(':password', $password, PDO::PARAM_STR);
            if($st->execute()){
               echo '<div class="alert alert-success" role="alert">Votre compte a bien été créééééééééé!!!</div>';
                header("Refresh:4; url= ../views/login.php");
                
            }else{
                echo "Problème technique non executé";
            }
                
            }    
    }else{
        echo '<div class="alert alert-danger" role="alert">C\'est un echec...</div>';
    }
}