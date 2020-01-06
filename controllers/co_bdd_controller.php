<?php
session_start();
$db = new PDO('mysql:host=localhost:3307;charset=utf8;dbname=record', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


