<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 — Page Not Found · EliteGym</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Barlow Condensed', 'sans-serif'],
            body:    ['Outfit', 'sans-serif'],
          },
          colors: {
            eg: {
              red:   '#D42B0F',
              redHot:'#FF3B1F',
              black: '#080808',
              ink:   '#111111',
              panel: '#161616',
              steel: '#222222',
              wire:  '#333333',
              ash:   '#888888',
              bone:  '#F0EDE8',
              white: '#FAFAFA',
            },
          },
          letterSpacing: { ultra: '0.28em' },
          keyframes: {
            flicker: {
              '0%, 100%': { opacity: '1' },
              '8%':        { opacity: '0.85' },
              '9%':        { opacity: '1' },
              '42%':       { opacity: '1' },
              '43%':       { opacity: '0.7' },
              '44%':       { opacity: '1' },
              '77%':       { opacity: '1' },
              '78%':       { opacity: '0.9' },
              '79%':       { opacity: '1' },
            },
            drift: {
              '0%,100%': { transform: 'translateY(0px)' },
              '50%':     { transform: 'translateY(-14px)' },
            },
            scanline: {
              '0%':   { transform: 'translateY(-100%)' },
              '100%': { transform: 'translateY(100vh)' },
            },
            pulseDot: {
              '0%,100%': { transform: 'scale(1)', opacity: '1' },
              '50%':     { transform: 'scale(1.3)', opacity: '0.6' },
            },
            fadeUp: {
              from: { opacity: '0', transform: 'translateY(24px)' },
              to:   { opacity: '1', transform: 'translateY(0)' },
            },
          },
          animation: {
            flicker:  'flicker 6s infinite',
            drift:    'drift 5s ease-in-out infinite',
            scanline: 'scanline 8s linear infinite',
            pulseDot: 'pulseDot 1.4s ease-in-out infinite',
            fadeUp:   'fadeUp 0.8s ease both',
          },
        },
      },
    }
  </script>

  <style>
    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: 'Outfit', sans-serif;
      background: #080808;
      color: #F0EDE8;
      overflow: hidden;
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* grain */
    body::after {
      content: '';
      position: fixed; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.07'/%3E%3C/svg%3E");
      pointer-events: none; z-index: 9997; opacity: 0.4;
    }

    /* grid bg */
    .grid-bg {
      background-image:
        linear-gradient(rgba(255,255,255,0.022) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.022) 1px, transparent 1px);
      background-size: 52px 52px;
    }

    /* scanline sweep */
    .scanline {
      position: fixed; inset: 0;
      background: linear-gradient(
        transparent 0%,
        rgba(212,43,15,0.022) 50%,
        transparent 100%
      );
      background-size: 100% 120px;
      pointer-events: none;
      z-index: 9996;
      animation: scanline 8s linear infinite;
    }

    /* nav link */
    .nav-link {
      position: relative; font-size: 0.8rem; letter-spacing: 0.1em;
      text-transform: uppercase; color: #888; transition: color 0.25s;
    }
    .nav-link::after {
      content: ''; position: absolute; bottom: -3px; left: 0;
      width: 0; height: 1px; background: #D42B0F; transition: width 0.3s;
    }
    .nav-link:hover { color: #F0EDE8; }
    .nav-link:hover::after { width: 100%; }

    /* 404 digit glitch */
    .glitch {
      position: relative;
      display: inline-block;
    }
    .glitch::before,
    .glitch::after {
      content: attr(data-text);
      position: absolute; top: 0; left: 0;
      width: 100%; height: 100%;
      font-family: inherit; font-size: inherit;
      font-weight: inherit; line-height: inherit;
      color: inherit;
    }
    .glitch::before {
      color: #D42B0F;
      clip-path: polygon(0 20%, 100% 20%, 100% 40%, 0 40%);
      transform: translateX(-3px);
      animation: glitchA 3.5s infinite;
      opacity: 0;
    }
    .glitch::after {
      color: #00d4ff22;
      clip-path: polygon(0 55%, 100% 55%, 100% 75%, 0 75%);
      transform: translateX(3px);
      animation: glitchB 3.5s infinite;
      opacity: 0;
    }
    @keyframes glitchA {
      0%,100%  { opacity: 0; }
      5%        { opacity: 0.9; transform: translateX(-4px); }
      6%        { opacity: 0; }
      44%       { opacity: 0; }
      45%       { opacity: 0.7; transform: translateX(-2px); }
      46%       { opacity: 0; }
    }
    @keyframes glitchB {
      0%,100%  { opacity: 0; }
      5%        { opacity: 0.6; transform: translateX(4px); }
      6%        { opacity: 0; }
      44%       { opacity: 0; }
      45%       { opacity: 0.5; transform: translateX(2px); }
      46%       { opacity: 0; }
    }

    /* buttons */
    .btn-primary {
      display: inline-flex; align-items: center; gap: 8px;
      background: #D42B0F; color: #fff;
      font-family: 'Barlow Condensed', sans-serif;
      font-weight: 700; font-size: 0.95rem;
      letter-spacing: 0.15em; text-transform: uppercase;
      padding: 0.85rem 2.2rem;
      position: relative; overflow: hidden;
      transition: color 0.3s;
    }
    .btn-primary::before {
      content: ''; position: absolute; inset: 0;
      background: #FF3B1F;
      transform: translateX(-101%);
      transition: transform 0.35s cubic-bezier(0.77,0,0.175,1);
    }
    .btn-primary:hover::before { transform: translateX(0); }
    .btn-primary span { position: relative; z-index: 1; }

    .btn-ghost {
      display: inline-flex; align-items: center; gap: 8px;
      border: 1.5px solid #2e2e2e; color: #888;
      font-family: 'Barlow Condensed', sans-serif;
      font-weight: 700; font-size: 0.95rem;
      letter-spacing: 0.15em; text-transform: uppercase;
      padding: 0.85rem 2.2rem;
      position: relative; overflow: hidden;
      transition: color 0.3s, border-color 0.3s;
    }
    .btn-ghost::before {
      content: ''; position: absolute; inset: 0;
      background: #1a1a1a;
      transform: translateX(-101%);
      transition: transform 0.35s cubic-bezier(0.77,0,0.175,1);
    }
    .btn-ghost:hover { color: #F0EDE8; border-color: #555; }
    .btn-ghost:hover::before { transform: translateX(0); }
    .btn-ghost span { position: relative; z-index: 1; }

    /* stagger fade-up delays */
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.25s; }
    .delay-3 { animation-delay: 0.4s; }
    .delay-4 { animation-delay: 0.55s; }
    .delay-5 { animation-delay: 0.7s; }
    .delay-6 { animation-delay: 0.85s; }
  </style>
</head>
<body class="font-body antialiased grid-bg">

  <!-- scanline sweep -->
  <div class="scanline" aria-hidden="true"></div>

  <!-- ══════════════════════════════════════════
       NAV
  ══════════════════════════════════════════ -->
  <!-- <?php // include 'partials/nav.php'; ?> -->
  <nav class="shrink-0 z-50 bg-eg-black/80 border-b border-eg-steel backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-16 flex items-center justify-between">
      <a href="index.php" class="font-display font-black text-2xl tracking-wide text-eg-white">
        ELITE<span class="text-eg-red">GYM</span>
      </a>
      <ul class="hidden md:flex items-center gap-10">
        <li><a href="index.php"    class="nav-link">Home</a></li>
        <li><a href="about.php"    class="nav-link">About</a></li>
        <li><a href="services.php" class="nav-link">Plans</a></li>
        <li><a href="contact.php"  class="nav-link">Contact</a></li>
      </ul>
      <a href="register.php" class="hidden md:inline-flex items-center gap-2 bg-eg-red text-white font-display font-bold text-sm tracking-widest uppercase px-6 py-2.5 hover:bg-eg-redHot transition-colors">
        Join Now
      </a>
    </div>
  </nav>


  <!-- ══════════════════════════════════════════
       404 BODY — fills remaining viewport
  ══════════════════════════════════════════ -->
  <main class="flex-1 flex items-center justify-center px-6 relative overflow-hidden">

    <!-- Red glow blobs -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] bg-eg-red opacity-[0.05] rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-eg-red opacity-[0.04] rounded-full blur-[100px] -translate-x-1/2 translate-y-1/2 pointer-events-none"></div>

    <!-- Decorative corner lines -->
    <div class="absolute top-6 left-6 w-12 h-12 border-t border-l border-eg-wire opacity-40"></div>
    <div class="absolute top-6 right-6 w-12 h-12 border-t border-r border-eg-wire opacity-40"></div>
    <div class="absolute bottom-6 left-6 w-12 h-12 border-b border-l border-eg-wire opacity-40"></div>
    <div class="absolute bottom-6 right-6 w-12 h-12 border-b border-r border-eg-wire opacity-40"></div>

    <!-- Vertical side label -->
    <div class="absolute left-6 top-1/2 -translate-y-1/2 hidden lg:flex flex-col items-center gap-3">
      <div class="w-px h-16 bg-eg-wire"></div>
      <span class="font-display text-[0.65rem] tracking-ultra text-eg-wire uppercase"
            style="writing-mode:vertical-rl; transform:rotate(180deg)">
        Error · 404
      </span>
      <div class="w-px h-16 bg-eg-wire"></div>
    </div>

    <div class="relative z-10 text-center max-w-2xl mx-auto">

      <!-- Pulse dot -->
      <div class="opacity-0 animate-fadeUp delay-1 flex justify-center mb-8">
        <span class="inline-flex items-center gap-2 text-eg-red text-xs font-semibold tracking-ultra uppercase">
          <span class="w-2 h-2 rounded-full bg-eg-red animate-pulseDot inline-block"></span>
          Page Not Found
          <span class="w-2 h-2 rounded-full bg-eg-red animate-pulseDot inline-block" style="animation-delay:0.7s"></span>
        </span>
      </div>

      <!-- Giant 404 -->
      <div class="opacity-0 animate-fadeUp delay-2 animate-drift select-none mb-6">
        <h1 class="font-display font-black leading-none animate-flicker"
            style="font-size: clamp(7rem, 22vw, 16rem); letter-spacing: -0.02em;">
          <span class="glitch text-eg-bone"    data-text="4">4</span><span
               class="glitch text-eg-red"     data-text="0">0</span><span
               class="glitch text-eg-bone"    data-text="4">4</span>
        </h1>
      </div>

      <!-- Divider -->
      <div class="opacity-0 animate-fadeUp delay-3 flex items-center justify-center gap-4 mb-6">
        <div class="h-px flex-1 max-w-[80px] bg-eg-wire"></div>
        <span class="font-display text-xs tracking-ultra uppercase text-eg-ash">Lost in the gym</span>
        <div class="h-px flex-1 max-w-[80px] bg-eg-wire"></div>
      </div>

      <!-- Message -->
      <p class="opacity-0 animate-fadeUp delay-4 text-eg-ash text-lg font-light leading-relaxed max-w-md mx-auto mb-10">
        This page skipped leg day — it doesn't exist. Let's get you back to the right place.
      </p>

      <!-- Buttons -->
      <div class="opacity-0 animate-fadeUp delay-5 flex flex-wrap items-center justify-center gap-4 mb-12">
        <a href="index.php" class="btn-primary">
          <span>Back to Home</span>
          <svg class="w-3.5 h-3.5 relative z-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </a>
        <a href="contact.php" class="btn-ghost">
          <span>Contact Us</span>
        </a>
      </div>

      <!-- Quick links -->
      <div class="opacity-0 animate-fadeUp delay-6">
        <p class="text-eg-wire text-xs uppercase tracking-ultra mb-4">Or jump to</p>
        <div class="flex flex-wrap justify-center gap-x-8 gap-y-2">
          <?php
            $links = [
              ['label' => 'Memberships', 'href' => 'services.php'],
              ['label' => 'About Us',    'href' => 'about.php'],
              ['label' => 'Join Now',    'href' => 'register.php'],
            ];
            foreach ($links as $lnk):
          ?>
          <a href="<?= htmlspecialchars($lnk['href']) ?>"
             class="text-eg-ash text-sm hover:text-eg-red transition-colors font-body underline underline-offset-4 decoration-eg-wire hover:decoration-eg-red">
            <?= htmlspecialchars($lnk['label']) ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </main>

</body>
</html>
