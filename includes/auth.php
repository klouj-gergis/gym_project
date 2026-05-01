<?php


   session_start();

 

    function isLoggedIn() {
      return isset($_SESSION['user_id']);
    }

    function requireLogin() {
      if (!isLoggedIn()) {
        header("Location: /login.php");
        exit();
      }
    }

    function login($email, $password, PDO $pdo): void {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = (bool)$user['is_admin'];


        if(isAdmin($user['role'])) {
      header("Location: dashboard.php");
    } else {
      header("Location: index.php");
    }
    } else {
        echo "Invalid credentials" . $user['email'];
    }
}

    function logout() {
      session_destroy();
    }

    function isAdmin($role) {
      return $role === 'admin';
    }

    function requireAdmin($admin) {
      if (!session_id()) {
        header("Location: /");
        exit();
      }
    }

    function register($user_data, PDO $pdo): void {
    $hashedPassword = password_hash($user_data['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        INSERT INTO users (username, email, password) 
        VALUES (?, ?, ?)
    ");

    $stmt->execute([
        $user_data['username'],
        $user_data['email'],
        $hashedPassword
    ]);

    header("Location: /login.php");
    exit();
}