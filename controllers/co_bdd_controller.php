<?php

$db = new PDO('mysql:host=localhost:3307;charset=utf8;dbname=record', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// regex :
$text_regex = '/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/';
$price_regex= '/^[\d]+[.]{1}[\d]{2,}+$/';
$num_regex = '/^[0-9]+$/';
