<?php
require 'co_bdd_controller.php';
$message = 'Bienvenue sur notre CRUD test Je vous souhaites la bienvenue.'
        . 'en Passant bienvenue Cordialement '
        . 'Le hibou de mars';

$aHeaders[] = 'MIME-Version: 1.0';
    $aHeaders[] = 'Content-Type: text/html; charset=utf-8';
    $aHeaders[] = 'From: Jeej jeej <jeej.jeej@jeej.fr>';  
    $aHeaders[] = 'Reply-to: Service commercial <Révolutionnaire@jeej.fr>';  
    $sHeaders[] = 'X-Mailer: PHP/' . phpversion();


?>