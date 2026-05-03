<?php 
include 'includes/migration.php';
include 'includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="./public/output.css" >
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EliteGym — Build Your Best Body</title>



  <!-- Fonts: Barlow Condensed (display) + Outfit (body) -->
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
              red:    '#D42B0F',
              redHot: '#FF3B1F',
              black:  '#080808',
              ink:    '#111111',
              panel:  '#161616',
              steel:  '#222222',
              wire:   '#333333',
              ash:    '#888888',
              bone:   '#F0EDE8',
              white:  '#FAFAFA',
            },
          },
          letterSpacing: {
            ultra: '0.3em',
          },
          backgroundImage: {
            'grid-lines': "linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px)",
          },
          backgroundSize: {
            'grid': '60px 60px',
          },
        },
      },
    }
  </script>

  <style>
    *, *::before, *::after { box-sizing: border-box; }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Outfit', sans-serif;
      background: #080808;
      color: #F0EDE8;
      overflow-x: hidden;
      cursor: none;
    }

    /* ── Custom cursor ── */
    .cursor-dot {
      position: fixed;
      width: 10px; height: 10px;
      background: #D42B0F;
      border-radius: 50%;
      pointer-events: none;
      z-index: 10000;
      transform: translate(-50%, -50%);
      transition: transform 0.1s ease;
    }
    .cursor-ring {
      position: fixed;
      width: 34px; height: 34px;
      border: 1px solid rgba(212,43,15,0.5);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: all 0.18s ease;
    }
    body:hover .cursor-dot { opacity: 1; }

    /* ── Noise grain overlay ── */
    body::after {
      content: '';
      position: fixed; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 9998;
      opacity: 0.4;
    }

    /* ── Scroll reveal ── */
    .sr { opacity: 0; transform: translateY(36px); transition: opacity 0.75s ease, transform 0.75s ease; }
    .sr.in { opacity: 1; transform: translateY(0); }
    .sr-l { opacity: 0; transform: translateX(-36px); transition: opacity 0.75s ease, transform 0.75s ease; }
    .sr-l.in { opacity: 1; transform: translateX(0); }
    .sr-r { opacity: 0; transform: translateX(36px); transition: opacity 0.75s ease, transform 0.75s ease; }
    .sr-r.in { opacity: 1; transform: translateX(0); }

    /* ── Hero animations ── */
    @keyframes heroSlideUp {
      from { opacity: 0; transform: translateY(60px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes heroDash {
      from { width: 0; }
      to   { width: 80px; }
    }
    @keyframes ticker {
      from { transform: translateX(0); }
      to   { transform: translateX(-50%); }
    }
    @keyframes pulse-red {
      0%, 100% { box-shadow: 0 0 0 0 rgba(212,43,15,0.5); }
      50%       { box-shadow: 0 0 0 12px rgba(212,43,15,0); }
    }
    @keyframes rotateSlow {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }

    .hero-eyebrow { animation: heroSlideUp 0.7s ease 0.1s both; }
    .hero-h1      { animation: heroSlideUp 0.8s ease 0.25s both; }
    .hero-dash    { animation: heroDash 0.9s ease 0.7s both; }
    .hero-sub     { animation: heroSlideUp 0.7s ease 0.55s both; }
    .hero-btns    { animation: heroSlideUp 0.7s ease 0.7s both; }

    .ticker-track { animation: ticker 30s linear infinite; }

    /* ── Nav ── */
    nav { backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); }

    /* ── Btn base ── */
    .btn-primary {
      display: inline-flex; align-items: center; gap: 10px;
      background: #D42B0F; color: #FAFAFA;
      font-family: 'Barlow Condensed', sans-serif;
      font-weight: 700; font-size: 1rem; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.9rem 2.4rem;
      position: relative; overflow: hidden;
      transition: color 0.3s;
    }
    .btn-primary::before {
      content: '';
      position: absolute; inset: 0;
      background: #FF3B1F;
      transform: translateX(-101%);
      transition: transform 0.35s cubic-bezier(0.77,0,0.175,1);
    }
    .btn-primary:hover::before { transform: translateX(0); }
    .btn-primary span { position: relative; z-index: 1; }
    .btn-primary:hover { animation: pulse-red 0.6s ease; }

    .btn-ghost {
      display: inline-flex; align-items: center; gap: 10px;
      border: 1.5px solid rgba(240,237,232,0.25); color: #F0EDE8;
      font-family: 'Barlow Condensed', sans-serif;
      font-weight: 700; font-size: 1rem; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 0.9rem 2.4rem;
      position: relative; overflow: hidden;
      transition: color 0.3s, border-color 0.3s;
    }
    .btn-ghost::before {
      content: '';
      position: absolute; inset: 0;
      background: #F0EDE8;
      transform: translateX(-101%);
      transition: transform 0.35s cubic-bezier(0.77,0,0.175,1);
    }
    .btn-ghost:hover::before { transform: translateX(0); }
    .btn-ghost:hover { color: #080808; border-color: #F0EDE8; }
    .btn-ghost span { position: relative; z-index: 1; }

    /* ── Feature card ── */
    .feat-card {
      border: 1px solid #222;
      background: #111;
      transition: border-color 0.35s, transform 0.35s;
    }
    .feat-card:hover {
      border-color: #D42B0F;
      transform: translateY(-8px);
    }
    .feat-card .icon-wrap {
      width: 52px; height: 52px;
      background: rgba(212,43,15,0.12);
      border: 1px solid rgba(212,43,15,0.3);
      display: flex; align-items: center; justify-content: center;
      transition: background 0.3s;
    }
    .feat-card:hover .icon-wrap { background: rgba(212,43,15,0.25); }

    /* ── Stat card ── */
    .stat-item { border-left: 1px solid #222; }
    .stat-item:first-child { border-left: none; }
    @media (max-width: 767px) {
      .stat-item { border-left: none; border-top: 1px solid #222; }
      .stat-item:first-child { border-top: none; }
    }

    /* ── Video placeholder ── */
    .video-thumb {
      background: linear-gradient(135deg, #161616 0%, #1e1e1e 100%);
      border: 1px solid #222;
      position: relative;
      overflow: hidden;
    }
    .video-thumb::before {
      content: '';
      position: absolute; inset: 0;
      background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 40px,
        rgba(255,255,255,0.012) 40px,
        rgba(255,255,255,0.012) 41px
      );
    }
    .play-btn {
      width: 80px; height: 80px;
      background: #D42B0F;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      cursor: none;
      animation: pulse-red 2.5s ease infinite;
      transition: transform 0.3s;
    }
    .play-btn:hover { transform: scale(1.12); }
    .spin-ring {
      position: absolute;
      width: 140px; height: 140px;
      border: 1px dashed rgba(212,43,15,0.4);
      border-radius: 50%;
      animation: rotateSlow 12s linear infinite;
    }

    /* ── CTA section ── */
    .cta-section {
      background: #D42B0F;
      position: relative;
      overflow: hidden;
    }
    .cta-section::before {
      content: '';
      position: absolute;
      top: -60%; right: -10%;
      width: 600px; height: 600px;
      border-radius: 50%;
      background: rgba(255,255,255,0.04);
    }
    .cta-section::after {
      content: '';
      position: absolute;
      bottom: -40%; left: -5%;
      width: 400px; height: 400px;
      border-radius: 50%;
      background: rgba(0,0,0,0.08);
    }
    .btn-cta {
      display: inline-flex; align-items: center; gap: 10px;
      background: #080808; color: #FAFAFA;
      font-family: 'Barlow Condensed', sans-serif;
      font-weight: 700; font-size: 1.05rem; letter-spacing: 0.12em; text-transform: uppercase;
      padding: 1rem 2.8rem;
      position: relative; overflow: hidden;
      transition: color 0.3s;
    }
    .btn-cta::before {
      content: '';
      position: absolute; inset: 0;
      background: #FAFAFA;
      transform: translateX(-101%);
      transition: transform 0.35s cubic-bezier(0.77,0,0.175,1);
    }
    .btn-cta:hover::before { transform: translateX(0); }
    .btn-cta:hover { color: #D42B0F; }
    .btn-cta span { position: relative; z-index: 1; }

    /* ── Nav link underline ── */
    .nav-link {
      position: relative;
      font-family: 'Outfit', sans-serif;
      font-size: 0.82rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: #888;
      transition: color 0.25s;
    }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -3px; left: 0;
      width: 0; height: 1px;
      background: #D42B0F;
      transition: width 0.3s ease;
    }
    .nav-link:hover { color: #F0EDE8; }
    .nav-link:hover::after { width: 100%; }
  </style>
</head>
<body class="font-body antialiased">

  <!-- ── Custom cursor ── -->
  <div class="cursor-dot" id="dot"></div>
  <div class="cursor-ring" id="ring"></div>


  <!-- ══════════════════════════════════════════
       NAV
  ══════════════════════════════════════════ -->
  
  <?php include 'includes/header.php'; ?>

  <!-- ══════════════════════════════════════════
       HERO
  ══════════════════════════════════════════ -->
  <section class="relative min-h-screen flex flex-col justify-center overflow-hidden bg-eg-black pt-16">

    <!-- Grid background -->
    <div class="absolute inset-0 bg-grid-lines bg-grid opacity-100 pointer-events-none"></div>

    <!-- Large BG text -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none overflow-hidden">
      <span class="font-display font-900 text-[22vw] leading-none uppercase text-white/[0.02] whitespace-nowrap">
        ELITE
      </span>
    </div>

    <!-- Red gradient blob -->
    <div class="absolute bottom-0 right-0 w-[700px] h-[700px] bg-eg-red opacity-5 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>
    <div class="absolute top-20 left-0 w-[400px] h-[400px] bg-eg-red opacity-[0.04] rounded-full blur-[100px] -translate-x-1/2 pointer-events-none"></div>

    <!-- Vertical ticker -->
    <div class="absolute right-6 lg:right-12 top-1/2 -translate-y-1/2 hidden lg:flex flex-col items-center gap-4">
      <div class="w-px h-20 bg-eg-wire"></div>
      <span class="font-display text-xs tracking-ultra text-eg-ash uppercase writing-mode-vertical" style="writing-mode:vertical-rl; transform:rotate(180deg)">
        Cairo's Premier Gym · Est. 2019
      </span>
      <div class="w-px h-20 bg-eg-wire"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full py-24 relative z-10">

      <!-- Eyebrow -->
      <p class="hero-eyebrow flex items-center gap-3 text-eg-red font-body font-semibold text-xs tracking-ultra uppercase mb-6">
        <span class="w-8 h-px bg-eg-red"></span>
        No Excuses. Only Results.
      </p>

      <!-- Headline -->
      <h1 class="hero-h1 font-display font-900 uppercase leading-[0.9] text-eg-white mb-4"
          style="font-size: clamp(4.5rem, 13vw, 11rem);">
        Build Your<br>
        <span class="text-eg-red italic">Best</span> Body
      </h1>

      <!-- Red dash -->
      <div class="hero-dash h-[3px] bg-eg-red mb-8" style="width:80px"></div>

      <!-- Subtext -->
      <p class="hero-sub max-w-lg text-eg-ash text-lg leading-relaxed font-light mb-10">
        State-of-the-art equipment, expert trainers, and a community that pushes you further than you thought possible.
      </p>

      <!-- Buttons -->
      <div class="hero-btns flex flex-wrap gap-4">
        <a href="register.php" class="btn-primary">
          <span>Start Today</span>
          <svg class="w-4 h-4 relative z-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="plans.php" class="btn-ghost">
          <span>View Plans</span>
        </a>
      </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2">
      <div class="w-5 h-8 border border-eg-wire rounded-full flex justify-center pt-1.5">
        <div class="w-1 h-1.5 bg-eg-red rounded-full animate-bounce"></div>
      </div>
    </div>
  </section>


  <div class="bg-eg-red py-3 overflow-hidden relative">
    <div class="ticker-track flex whitespace-nowrap w-max">
      <?php for ($i = 0; $i < 2; $i++): ?>
        <span class="font-display text-sm uppercase tracking-widest text-white/90 px-10">Elite Equipment</span>
        <span class="text-white/40 px-2">✦</span>
        <span class="font-display text-sm uppercase tracking-widest text-white/90 px-10">24/7 Access</span>
        <span class="text-white/40 px-2">✦</span>
        <span class="font-display text-sm uppercase tracking-widest text-white/90 px-10">Expert Coaches</span>
        <span class="text-white/40 px-2">✦</span>
        <span class="font-display text-sm uppercase tracking-widest text-white/90 px-10">Cairo's #1 Gym</span>
        <span class="text-white/40 px-2">✦</span>
        <span class="font-display text-sm uppercase tracking-widest text-white/90 px-10">Est. 2019</span>
        <span class="text-white/40 px-2">✦</span>
        <span class="font-display text-sm uppercase tracking-widest text-white/90 px-10">No Excuses</span>
        <span class="text-white/40 px-2">✦</span>
      <?php endfor; ?>
    </div>
  </div>


  <section class="bg-eg-panel border-y border-eg-steel">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-2 md:grid-cols-4">

        <?php
          $stats = [
            ['num' => '500+', 'label' => 'Active Members'],
            ['num' => '12',   'label' => 'Expert Trainers'],
            ['num' => '50+',  'label' => 'Equipment Pieces'],
            ['num' => '5yr',  'label' => 'In Business'],
          ];
          foreach ($stats as $i => $s):
        ?>
        <div class="stat-item sr py-10 px-8 flex flex-col gap-1" style="transition-delay:<?= $i * 0.1 ?>s">
          <span class="font-display text-5xl text-eg-red leading-none"><?= htmlspecialchars($s['num']) ?></span>
          <span class="text-eg-ash text-sm uppercase tracking-widest font-body"><?= htmlspecialchars($s['label']) ?></span>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>


  
  <section class="bg-eg-black py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

      <!-- Heading -->
      <div class="mb-20 max-w-2xl">
        <p class="sr flex items-center gap-3 text-eg-red text-xs tracking-ultra uppercase font-semibold mb-5">
          <span class="w-8 h-px bg-eg-red"></span>
          The EliteGym Difference
        </p>
        <h2 class="sr font-display uppercase leading-none text-eg-white"
            style="font-size:clamp(3rem,7vw,5.5rem); transition-delay:0.1s">
          Why Choose<br>Elite<span class="text-eg-red">Gym</span>
        </h2>
      </div>

      <!-- Cards -->
      <div class="grid md:grid-cols-3 gap-6">

        <?php
          $features = [
            [
              'icon'  => '<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>',
              'title' => 'Elite Equipment',
              'body'  => 'Latest machines and free weights. Everything you need for any training style.',
              'tag'   => '50+ Machines',
            ],
            [
              'icon'  => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
              'title' => 'Expert Trainers',
              'body'  => 'Certified coaches who build programs around your specific goals.',
              'tag'   => '12 Specialists',
            ],
            [
              'icon'  => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
              'title' => 'Open 24/7',
              'body'  => 'Train on your schedule. We never close.',
              'tag'   => 'Always Open',
            ],
          ];
          foreach ($features as $i => $f):
        ?>
        <div class="feat-card sr p-8 flex flex-col gap-6" style="transition-delay:<?= $i * 0.12 ?>s">

          <!-- Tag -->
          <span class="self-start bg-eg-steel text-eg-ash text-xs font-semibold uppercase tracking-widest px-3 py-1">
            <?= htmlspecialchars($f['tag']) ?>
          </span>

          <!-- Icon -->
          <div class="icon-wrap">
            <svg class="w-5 h-5 text-eg-red" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
              <?= $f['icon'] ?>
            </svg>
          </div>

          <!-- Text -->
          <div>
            <h3 class="font-display text-3xl uppercase text-eg-white mb-3 leading-none">
              <?= htmlspecialchars($f['title']) ?>
            </h3>
            <p class="text-eg-ash leading-relaxed text-sm font-light">
              <?= htmlspecialchars($f['body']) ?>
            </p>
          </div>

          <!-- Arrow -->
          <div class="mt-auto">
            <span class="inline-flex items-center gap-2 text-eg-red text-xs uppercase tracking-widest font-semibold group-hover:gap-4 transition-all">
              Learn more
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>


  <section class="bg-eg-panel py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

      <!-- Heading -->
      <div class="sr mb-16 flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
          <p class="flex items-center gap-3 text-eg-red text-xs tracking-ultra uppercase font-semibold mb-5">
            <span class="w-8 h-px bg-eg-red"></span>
            Inside EliteGym
          </p>
          <h2 class="font-display uppercase leading-none text-eg-white" style="font-size:clamp(3rem,7vw,5.5rem)">
            See The Gym<br><span class="text-eg-red">In Action</span>
          </h2>
        </div>
        <p class="text-eg-ash max-w-xs text-sm leading-relaxed">
          Take a virtual tour of our facilities and see what makes EliteGym different.
        </p>
      </div>

      <!-- Video embed / placeholder -->
      <div class="sr video-thumb aspect-video w-full flex items-center justify-center" style="transition-delay:0.15s">

        <!-- Replace this block with a real <video> or YouTube embed -->
        <div class="relative flex items-center justify-center">
          <div class="spin-ring"></div>
          <button class="play-btn" id="playBtn" aria-label="Play video">
            <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
              <path d="M5 3l14 9-14 9V3z"/>
            </svg>
          </button>
        </div>

        <!-- Corner labels -->
        <span class="absolute top-4 left-4 font-display text-xs uppercase tracking-widest text-eg-ash">
          EliteGym Cairo · 2024
        </span>
        <span class="absolute bottom-4 right-4 font-display text-xs uppercase tracking-widest text-eg-ash">
          Facility Tour
        </span>
      </div>

      
    </div>
  </section>


 
  <section class="cta-section py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10 text-center">

      <p class="sr font-display text-xs tracking-ultra uppercase text-white/60 mb-6">
        Limited Spots Available
      </p>
      <h2 class="sr font-display uppercase leading-none text-white mb-6"
          style="font-size:clamp(3.5rem,10vw,8rem); transition-delay:0.1s">
        Ready To Start?
      </h2>
      <p class="sr text-white/70 text-lg mb-10 max-w-md mx-auto" style="transition-delay:0.2s">
        First week is on us. No credit card required.
      </p>
      <div class="sr" style="transition-delay:0.3s">
        <a href="register.php" class="btn-cta">
          <span>Create Free Account</span>
          <svg class="w-4 h-4 relative z-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>

      <p class="mt-16 font-display text-[18vw] leading-none text-white/[0.04] select-none pointer-events-none">
        EG
      </p>

    </div>
  </section>



  <?php include 'includes/footer.php'; ?>



  <script>
    // ── Custom cursor ──
    const dot  = document.getElementById('dot');
    const ring = document.getElementById('ring');
    document.addEventListener('mousemove', e => {
      dot.style.left  = e.clientX + 'px';
      dot.style.top   = e.clientY + 'px';
      setTimeout(() => {
        ring.style.left = e.clientX + 'px';
        ring.style.top  = e.clientY + 'px';
      }, 80);
    });

    // ── Mobile nav ──
    const toggle = document.getElementById('navToggle');
    const menu   = document.getElementById('mobileMenu');
    toggle.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });

    // ── Scroll reveal ──
    const revealEls = document.querySelectorAll('.sr, .sr-l, .sr-r');
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.12 });
    revealEls.forEach(el => io.observe(el));

    // ── Play button (connect to modal / actual video) ──
    document.getElementById('playBtn')?.addEventListener('click', () => {
      // TODO: open video modal or trigger YouTube embed
      alert('Connect your video source here.');
    });
  </script>

</body>
</html>
