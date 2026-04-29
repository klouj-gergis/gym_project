<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

$uri = $_SERVER['REQUEST_URI'];

if($uri == '/') {
    include 'home.php';
} elseif($uri == '/about') {
    include 'about.php';
} elseif($uri == '/contact') {
    include 'contact.php';
} else {
    include '404.php';
}