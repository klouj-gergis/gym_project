<header class="bg-black/90 backdrop-blur-2xl text-white">
        <div class=" flex items-center justify-between max-w-7xl mx-auto px-4">
            <div class="logo py-3">
                <a href="index.php" class="text-2xl"><span class="text-3xl text-amber-500">7</span>Ty7</a>
            </div>
            <nav class="flex items-center gap-6">
                <ul class=" flex items-center gap-6">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
                <?php $isloggedin = isLoggedIn(); 
                 $button = $isloggedin ? '<a href="/logout.php">logout</a>' : '<a class="py-2 px-3 bg-amber-500 rounded-xl cursor-pointer" href="/login.php">Login</a>';
                 echo $button;
                 ?>
            </nav>
        </div>
        
      </header>