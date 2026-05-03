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
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Bebas Neue', 'sans-serif'],
            body: ['Barlow', 'sans-serif'],
          },
          colors: {
            amber: { DEFAULT: '#f5a623', light: '#ffc84a' },
            dark:  { DEFAULT: '#0a0a0a', 2: '#111111', 3: '#191919' },
          },
          keyframes: {
            fadeUp: { from: { opacity: '0', transform: 'translateY(20px)' }, to: { opacity: '1', transform: 'translateY(0)' } },
          },
          animation: {
            'fade-up': 'fadeUp 0.5s ease both',
          }
        }
      }
    }
  </script>
  <style>
    body { font-family: 'Barlow', sans-serif; }
    .gym-input:focus {
      outline: none;
      border-color: #f5a623;
      background: rgba(245,166,35,0.04);
      box-shadow: 0 0 0 3px rgba(245,166,35,0.08);
    }
    .btn-shimmer { position: relative; overflow: hidden; }
    .btn-shimmer::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.18), transparent);
      transform: translateX(-100%);
      transition: transform 0.45s ease;
    }
    .btn-shimmer:hover::before { transform: translateX(100%); }
  </style>
</head>
<body class="bg-dark min-h-screen flex items-center justify-center text-white">

  <div class="animate-fade-up w-full max-w-sm px-8 py-10 bg-dark-2 border border-white/[0.07] rounded-2xl shadow-2xl">

    <h1 class="font-display text-5xl tracking-wide mb-1">LOG <span class="text-amber">IN</span></h1>
    <p class="text-white/30 text-sm mb-8">Welcome back. Let's get to work.</p>

    <form method="POST" action="/login.php" class="flex flex-col gap-5 w-80">

      <label class="block text-[11px] font-semibold tracking-[3px] uppercase text-white/30 -mb-2" for="email">Email:</label>
      <input class="gym-input border border-white/[0.07] bg-dark-3 rounded-lg px-4 py-3 text-white text-[15px] placeholder-white/15 transition-all duration-200 w-full" type="text" id="email" name="email" required>
      <br>

      <label class="block text-[11px] font-semibold tracking-[3px] uppercase text-white/30 -mb-2" for="password">Password:</label>
      <input class="gym-input border border-white/[0.07] bg-dark-3 rounded-lg px-4 py-3 text-white text-[15px] placeholder-white/15 transition-all duration-200 w-full" type="password" id="password" name="password" required>
      <br>

      <button class="btn-shimmer w-full bg-amber hover:bg-amber-light text-black font-display text-xl tracking-[3px] py-3 rounded-lg transition-all duration-200 hover:-translate-y-[1px] active:scale-[0.99]" type="submit">Login</button>

      <p class="text-center text-white/30 text-sm">Don't have an account? <button type="submit" class="text-amber hover:text-amber-light transition-colors font-medium">Register here.</button></p>

    </form>

  </div>

</body>
</html>