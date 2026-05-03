<?php

include 'auth.php';
include 'db.php';

$pdo = connect();
if (!isLoggedIn()) {
    header("Location: /login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $membership_id = $_POST['membership_id'];
    $stmt = $pdo->prepare("INSERT INTO user_memberships (user_id, membership_id) VALUES (?, ?)");
    $stmt->execute([$user_id, $membership_id]);
    echo "Membership joined successfully!";
    exit();
}