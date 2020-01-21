<?php
// connexion a la base de données
$db = new PDO('mysql:host=localhost:3307;charset=utf8;dbname=record', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// regex :
$email_regex ='/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/' ;
$text_regex = '/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/';
$price_regex= '/^[\d]{1,6}[.]?[\d]{0,2}+$/';
$num_regex = '/^[0-9]+$/';
$password_regex= '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w])/';