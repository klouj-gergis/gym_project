<nav class="fixed top-0 inset-x-0 z-50 bg-eg-black/80 border-b border-eg-steel">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-16 flex items-center justify-between">

      <!-- Logo -->
      <a href="index.php" class="font-display font-900 text-2xl tracking-wide text-eg-white">
        ELITE<span class="text-eg-red">GYM</span>
      </a>

      <!-- Links -->
      <ul class="hidden md:flex items-center gap-10">
        <li><a href="index.php"  class="nav-link" style="color:#F0EDE8">Home</a></li>
        <li><a href="about.php"  class="nav-link">About</a></li>
        <li><a href="plans.php"  class="nav-link">Plans</a></li>
        <li><a href="contact.php" class="nav-link">Contact</a></li>
      </ul>

      <!-- CTA -->
      <a href="plans.php" class="btn-primary hidden md:inline-flex">
        <span>Join Now</span>
        <svg class="w-4 h-4 relative z-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>

      <!-- Mobile hamburger -->
      <button id="navToggle" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="Menu">
        <span class="w-6 h-px bg-eg-bone block transition-all" id="hb1"></span>
        <span class="w-6 h-px bg-eg-bone block transition-all" id="hb2"></span>
        <span class="w-4 h-px bg-eg-red   block transition-all" id="hb3"></span>
      </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-eg-ink border-t border-eg-steel px-6 py-8 space-y-6">
      <a href="index.php"   class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">Home</a>
      <a href="about.php"   class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">About</a>
      <a href="plans.php"   class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">Plans</a>
      <a href="contact.php" class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">Contact</a>
      <a href="register.php" class="btn-primary inline-flex mt-4">
        <span>Join Now</span>
      </a>
    </div>
  </nav>