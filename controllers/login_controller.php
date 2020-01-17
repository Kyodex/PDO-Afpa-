<?php

require 'co_bdd_controller.php';


$errormsg = array();

if (isset($_POST['submit'])) {
    if (!empty($_POST['login'])) {
        $requete = $db->prepare("SELECT login,password FROM user_connexion WHERE login=:login;");
        $requete->bindValue(':login',$_POST['login'], PDO::PARAM_STR);
        $requete->execute();
        $user = $requete->fetch(PDO::FETCH_OBJ);
        if ($user->login == $_POST['login']) {
            if (password_verify($_POST['password'], $user->password)) {
                session_start();
                $_SESSION['login'] = $_POST['login'];
                header('Location: ../views/connect.php');
            } else {
                $errormsg['password']="Problème : Mot de pase incorrect";
            }
        } else {
            $errormsg['login'] = 'Problème : identifiant invalide';
        }
    }else{
        $error['login']="Problème : Veuillez rentrer un identifiant";
    }
}