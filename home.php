<?php
include 'includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <section class="w-full h-[90vh] bg-amber-300 overflow-hidden relative" >
    <img src="./assets/hero-image.jpeg" class="w-full -translate-y-50 z-0" />
    <div class="absolute z-10 top-20 left-20 bg-black/70 w-fit p-10 text-white flex flex-col gap-5">
      <h1 class="text-6xl font-bold">TRAIN. <br/> TRANSFORM. <br/> <span class="text-yellow-200">BECOME.</span></h1>
      <p class="w-56 text-lg">7TY7 is more than a gym. It's a mindset. It's a lifestyle. It's your next lever.</p>
      <div class="flex gap-5">
      <a href="/join" class="bg-amber-200 py-2 px-3 rounded-md text-black hover:bg-amber-300 cursor-pointer">JOIN NOW</a>
      <button class="border border-amber-200 rounded-md bg-transparent py-2 px-3 hover:bg-amber-200 hover:text-black cursor-pointer">LEARN MORE</button>
    </div>
    </div>
    
  </section>
</body>

</html>