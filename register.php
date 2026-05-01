<?php 
require 'includes/db.php';
require 'includes/auth.php';

$pdo = connect();
if (isLoggedIn()) {
  header("Location: /");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_data = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Passwords do not match!";
        exit();
    }

    register($user_data, $pdo);
}

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Register Page</h1>
  <form method="POST" action="/register.php" class="flex flex-col gap-5 w-80">
    <label class="" for="username">Username:</label>
    <input class="border" type="text" id="username" name="username" required>
    <br>
    <label class="" for="email">Email:</label>
    <input class="border" type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" class="border" required>
    <br>
    <label for="confirm_password">Confrim Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" class="border" required>
    <br>
    <button type="submit" class="bg-amber-300 py-2 px-3 rounded-md w-fit">Register</button>
    <p>Already have an account? <a href="/login" class="">Login here.</a></p>

  </form>
</body>
</html>