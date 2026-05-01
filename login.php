<?php 
 include './includes/auth.php';
  require './includes/db.php';
  $pdo = connect();
  if (isLoggedIn()) {
    header("Location: /");
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    login($email, $password, $pdo);
    
    
      exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Login Page</h1>
  <form method="POST" action="/login.php" class="flex flex-col gap-5 w-80">
    <label class="" for="email">Email:</label>
    <input class="border" type="text" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>
    <p>Don't have an account? <a href="/register.php" class="">Register
       here.</a></p>
  </form>
</body>
</html>