<?php

$pdo = require_once 'db.php';

function createUsersTable(PDO $pdo) {
   
    
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        die("Error creating table: " . $e->getMessage());
    }
    

};

function createMembersTable(PDO $pdo) {
    
    
    $sql = "CREATE TABLE IF NOT EXISTS members (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        phone VARCHAR(20),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        die("Error creating table: " . $e->getMessage());
    }
};

function createMembershipsTable(PDO $pdo) {
    
    
    $sql = "CREATE TABLE IF NOT EXISTS bundles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        period VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        die("Error creating table: " . $e->getMessage());
    }
};

function migrate(PDO $pdo) {
    
    createUsersTable($pdo);
    createMembersTable($pdo);
    createMembershipsTable($pdo);
    
    echo "Migration completed successfully.";
}

migrate($pdo);