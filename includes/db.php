<?php

$host = 'localhost';
$db   = 'gym_project';
$user = 'root';
$pass = '181920';

function connect(){
    global $host, $db, $user, $pass;
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

$pdo = connect();

