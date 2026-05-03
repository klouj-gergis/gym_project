<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plans & Pricing — EliteGym</title>

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
    }

    /* noise grain */
    body::after {
      content: '';
      position: fixed; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
      pointer-events: none; z-index: 9998; opacity: 0.35;
    }

    /* grid bg */
    .grid-bg {
      background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
      background-size: 56px 56px;
    }

    /* scroll reveal */
    .sr { opacity: 0; transform: translateY(32px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .sr.in { opacity: 1; transform: translateY(0); }

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

    /* hero entry */
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(50px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .h-anim-1 { animation: slideUp 0.7s ease 0.1s both; }
    .h-anim-2 { animation: slideUp 0.7s ease 0.25s both; }
    .h-anim-3 { animation: slideUp 0.7s ease 0.4s both; }

    /* plan card */
    .plan-card {
      background: #111;
      border: 1px solid #222;
      position: relative;
      transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
    }
    .plan-card:hover {
      transform: translateY(-10px);
      border-color: #D42B0F;
      box-shadow: 0 24px 60px rgba(212,43,15,0.12);
    }
    .plan-card.featured {
      border-color: #D42B0F;
      background: #130a08;
    }
    .plan-card.featured:hover {
      box-shadow: 0 24px 80px rgba(212,43,15,0.22);
    }

    /* check / cross icons */
    .check { color: #D42B0F; }
    .cross  { color: #444; }

    /* btn */
    .btn-plan {
      display: block; width: 100%; text-align: center;
      font-family: 'Barlow Condensed', sans-serif;
      font-weight: 700; font-size: 0.95rem;
      letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.85rem 1.5rem;
      position: relative; overflow: hidden;
      transition: color 0.3s;
    }
    .btn-plan::before {
      content: ''; position: absolute; inset: 0;
      transform: translateX(-101%);
      transition: transform 0.35s cubic-bezier(0.77,0,0.175,1);
    }
    .btn-plan span { position: relative; z-index: 1; }
    .btn-plan:hover::before { transform: translateX(0); }

    .btn-plan-outline {
      border: 1.5px solid #333; color: #F0EDE8;
    }
    .btn-plan-outline::before { background: #F0EDE8; }
    .btn-plan-outline:hover { color: #080808; border-color: #F0EDE8; }

    .btn-plan-red {
      background: #D42B0F; color: #fff;
    }
    .btn-plan-red::before { background: #FF3B1F; }

    /* comparison table */
    .cmp-table th, .cmp-table td {
      padding: 0.9rem 1.2rem;
      border-bottom: 1px solid #1e1e1e;
      text-align: center;
      font-size: 0.88rem;
    }
    .cmp-table th:first-child,
    .cmp-table td:first-child { text-align: left; }
    .cmp-table thead th {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 1.1rem; font-weight: 700;
      letter-spacing: 0.06em; text-transform: uppercase;
      border-bottom: 1px solid #333;
      background: #111;
    }
    .cmp-table thead th.col-pro { background: #1a0c09; }
    .cmp-table tbody tr:hover td { background: #141414; }
    .cmp-table tbody tr:last-child td { border-bottom: none; }
    .cmp-table tbody td.col-pro { background: rgba(212,43,15,0.04); }
    .cmp-table tbody tr:hover td.col-pro { background: rgba(212,43,15,0.08); }

    /* popular badge */
    .badge-popular {
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 0.7rem; font-weight: 700;
      letter-spacing: 0.18em; text-transform: uppercase;
      background: #D42B0F; color: #fff;
      padding: 2px 10px;
    }

    /* divider line */
    .red-rule { width: 48px; height: 3px; background: #D42B0F; margin-bottom: 1rem; }
  </style>
</head>
<body class="font-body antialiased">

  <!-- ══════════════════════════════════════════
       NAV (shared — replace with include)
  ══════════════════════════════════════════ -->
  <!-- <?php // include 'partials/nav.php'; ?> -->
  <nav class="fixed top-0 inset-x-0 z-50 bg-eg-black/85 border-b border-eg-steel backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-16 flex items-center justify-between">
      <a href="index.php" class="font-display font-black text-2xl tracking-wide text-eg-white">
        ELITE<span class="text-eg-red">GYM</span>
      </a>
      <ul class="hidden md:flex items-center gap-10">
        <li><a href="index.php"    class="nav-link">Home</a></li>
        <li><a href="about.php"    class="nav-link">About</a></li>
        <li><a href="services.php" class="nav-link" style="color:#F0EDE8">Plans</a></li>
        <li><a href="contact.php"  class="nav-link">Contact</a></li>
      </ul>
      <a href="register.php" class="hidden md:inline-flex items-center gap-2 bg-eg-red text-white font-display font-bold text-sm tracking-widest uppercase px-6 py-2.5 hover:bg-eg-redHot transition-colors">
        Join Now
      </a>
      <button id="navToggle" class="md:hidden flex flex-col gap-1.5 p-2">
        <span class="w-6 h-px bg-eg-bone block"></span>
        <span class="w-6 h-px bg-eg-bone block"></span>
        <span class="w-4 h-px bg-eg-red  block"></span>
      </button>
    </div>
    <div id="mobileMenu" class="hidden md:hidden bg-eg-ink border-t border-eg-steel px-6 py-8 space-y-5">
      <a href="index.php"    class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">Home</a>
      <a href="about.php"    class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">About</a>
      <a href="services.php" class="block font-display text-3xl uppercase text-eg-red">Plans</a>
      <a href="contact.php"  class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">Contact</a>
    </div>
  </nav>


  <!-- ══════════════════════════════════════════
       HEADER / HERO
  ══════════════════════════════════════════ -->
  <header class="relative pt-40 pb-28 grid-bg overflow-hidden bg-eg-black">

    <!-- Large BG word -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none">
      <span class="font-display font-black text-[22vw] leading-none uppercase text-white/[0.018] whitespace-nowrap">
        PRICING
      </span>
    </div>

    <!-- Red glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-eg-red opacity-[0.06] rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
      <p class="h-anim-1 inline-flex items-center gap-3 text-eg-red text-xs tracking-ultra uppercase font-semibold mb-6">
        <span class="w-8 h-px bg-eg-red"></span>
        Membership Plans
        <span class="w-8 h-px bg-eg-red"></span>
      </p>
      <h1 class="h-anim-2 font-display font-black uppercase leading-none text-eg-white mb-6"
          style="font-size:clamp(4rem,12vw,9rem)">
        Simple<br><span class="text-eg-red">Pricing</span>
      </h1>
      <p class="h-anim-3 text-eg-ash text-lg font-light tracking-wide">
        No hidden fees. Cancel anytime.
      </p>
    </div>
  </header>


  <!-- ══════════════════════════════════════════
       PLANS GRID
  ══════════════════════════════════════════ -->
  <section class="bg-eg-black py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">

      <div class="grid md:grid-cols-3 gap-6 items-stretch">

        <?php
          // ── Plan data — swap with DB query in production ──
          $plans = [
            [
              'id'       => 'basic',
              'name'     => 'Basic',
              'price'    => 299,
              'featured' => false,
              'features' => [
                'Gym access (6am–10pm)',
                'Locker room',
                'Basic equipment',
                '2 group classes/month',
              ],
            ],
            [
              'id'       => 'pro',
              'name'     => 'Pro',
              'price'    => 499,
              'featured' => true,
              'features' => [
                '24/7 gym access',
                'All equipment',
                'Unlimited classes',
                '1 PT session/month',
                'Nutrition guide',
              ],
            ],
            [
              'id'       => 'elite',
              'name'     => 'Elite',
              'price'    => 899,
              'featured' => false,
              'features' => [
                'Everything in Pro',
                '4 PT sessions/month',
                'Custom meal plan',
                'Priority booking',
                'Guest passes x2',
              ],
            ],
          ];

          foreach ($plans as $i => $plan):
            $isFeatured = $plan['featured'];
        ?>

        <div class="plan-card <?= $isFeatured ? 'featured' : '' ?> sr flex flex-col"
             style="transition-delay:<?= $i * 0.1 ?>s">

          <!-- Featured ribbon -->
          <?php if ($isFeatured): ?>
          <div class="absolute -top-px left-1/2 -translate-x-1/2 badge-popular">
            Most Popular
          </div>
          <?php endif; ?>

          <!-- Card top -->
          <div class="p-8 pb-6 border-b border-eg-steel/60">
            <p class="font-display text-xs uppercase tracking-ultra text-eg-ash mb-4">
              <?= htmlspecialchars($plan['name']) ?> Plan
            </p>
            <div class="flex items-end gap-2 mb-1">
              <span class="font-display text-6xl font-black leading-none <?= $isFeatured ? 'text-eg-red' : 'text-eg-white' ?>">
                <?= number_format($plan['price']) ?>
              </span>
              <span class="text-eg-ash text-sm mb-2 font-light">EGP / month</span>
            </div>
          </div>

          <!-- Features list -->
          <div class="p-8 flex-1">
            <ul class="space-y-4">
              <?php foreach ($plan['features'] as $feat): ?>
              <li class="flex items-start gap-3 text-sm text-eg-bone/80 font-light leading-snug">
                <svg class="check w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path d="M5 13l4 4L19 7"/>
                </svg>
                <?= htmlspecialchars($feat) ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- CTA -->
          <div class="p-8 pt-2">
            <a href="register.php?plan=<?= urlencode($plan['id']) ?>"
               class="btn-plan <?= $isFeatured ? 'btn-plan-red' : 'btn-plan-outline' ?>">
              <span>Get <?= htmlspecialchars($plan['name']) ?></span>
            </a>
          </div>

        </div>

        <?php endforeach; ?>

      </div><!-- /grid -->

      <!-- Small trust note -->
      <p class="sr mt-10 text-center text-eg-ash text-xs tracking-widest uppercase" style="transition-delay:0.35s">
        All plans include locker access · Cancel anytime · No setup fees
      </p>
    </div>
  </section>


  <!-- ══════════════════════════════════════════
       COMPARISON TABLE
  ══════════════════════════════════════════ -->
  <section class="bg-eg-panel py-28">
    <div class="max-w-5xl mx-auto px-6 lg:px-12">

      <!-- Heading -->
      <div class="sr mb-16">
        <div class="red-rule"></div>
        <p class="text-eg-red text-xs tracking-ultra uppercase font-semibold mb-3">Side by Side</p>
        <h2 class="font-display uppercase leading-none text-eg-white" style="font-size:clamp(2.8rem,6vw,5rem)">
          Full Comparison
        </h2>
      </div>

      <!-- Scrollable on mobile -->
      <div class="sr overflow-x-auto" style="transition-delay:0.12s">
        <table class="cmp-table w-full border-collapse min-w-[600px]">

          <!-- Header row -->
          <thead>
            <tr>
              <th class="text-eg-ash font-body font-medium text-xs tracking-widest uppercase text-left" style="width:34%">Feature</th>
              <th class="text-eg-bone">Basic</th>
              <th class="col-pro text-eg-red">
                Pro
                <span class="ml-2 badge-popular" style="font-size:0.6rem;vertical-align:middle">Popular</span>
              </th>
              <th class="text-eg-bone">Elite</th>
            </tr>
          </thead>

          <tbody class="text-eg-ash">

            <?php
              // ── Table rows — swap with DB/dynamic data in production ──
              $rows = [
                ['feature' => 'Gym Access',        'basic' => '6am–10pm', 'pro' => '24/7',      'elite' => '24/7'],
                ['feature' => 'Group Classes',      'basic' => '2/month',  'pro' => 'Unlimited', 'elite' => 'Unlimited'],
                ['feature' => 'Personal Training',  'basic' => false,      'pro' => '1/month',   'elite' => '4/month'],
                ['feature' => 'Nutrition Guide',    'basic' => false,      'pro' => true,        'elite' => true],
                ['feature' => 'Custom Meal Plan',   'basic' => false,      'pro' => false,       'elite' => true],
                ['feature' => 'Guest Passes',       'basic' => false,      'pro' => false,       'elite' => '2/month'],
                ['feature' => 'Price EGP/month',    'basic' => '299',      'pro' => '499',       'elite' => '899', 'highlight' => true],
              ];

              foreach ($rows as $row):
                $isHighlight = !empty($row['highlight']);
            ?>
            <tr class="<?= $isHighlight ? 'bg-eg-steel/10' : '' ?>">

              <!-- Feature name -->
              <td class="text-eg-bone font-medium <?= $isHighlight ? 'font-display text-lg uppercase tracking-wide' : '' ?>">
                <?= htmlspecialchars($row['feature']) ?>
              </td>

              <!-- Basic -->
              <td>
                <?php if ($row['basic'] === false): ?>
                  <svg class="cross w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
                <?php elseif ($row['basic'] === true): ?>
                  <svg class="check w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                <?php else: ?>
                  <span class="<?= $isHighlight ? 'font-display text-xl text-eg-bone' : '' ?>">
                    <?= htmlspecialchars($row['basic']) ?>
                  </span>
                <?php endif; ?>
              </td>

              <!-- Pro (highlighted col) -->
              <td class="col-pro">
                <?php if ($row['pro'] === false): ?>
                  <svg class="cross w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
                <?php elseif ($row['pro'] === true): ?>
                  <svg class="check w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                <?php else: ?>
                  <span class="text-eg-red font-semibold <?= $isHighlight ? 'font-display text-xl' : '' ?>">
                    <?= htmlspecialchars($row['pro']) ?>
                  </span>
                <?php endif; ?>
              </td>

              <!-- Elite -->
              <td>
                <?php if ($row['elite'] === false): ?>
                  <svg class="cross w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
                <?php elseif ($row['elite'] === true): ?>
                  <svg class="check w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                <?php else: ?>
                  <span class="<?= $isHighlight ? 'font-display text-xl text-eg-bone' : '' ?>">
                    <?= htmlspecialchars($row['elite']) ?>
                  </span>
                <?php endif; ?>
              </td>

            </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div><!-- /overflow -->

      <!-- CTA under table -->
      <div class="sr mt-14 flex flex-col sm:flex-row items-center justify-center gap-4" style="transition-delay:0.2s">
        <a href="register.php?plan=pro"
           class="inline-flex items-center gap-2 bg-eg-red text-white font-display font-bold text-sm tracking-widest uppercase px-10 py-4 hover:bg-eg-redHot transition-colors">
          Start with Pro
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="contact.php"
           class="inline-flex items-center gap-2 border border-eg-wire text-eg-bone font-display font-bold text-sm tracking-widest uppercase px-10 py-4 hover:border-eg-bone transition-colors">
          Ask a Question
        </a>
      </div>

    </div>
  </section>


  <!-- ══════════════════════════════════════════
       FOOTER (shared — replace with include)
  ══════════════════════════════════════════ -->
  <!-- <?php // include 'partials/footer.php'; ?> -->
  <footer class="bg-eg-ink border-t border-eg-steel py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row items-center justify-between gap-6">
      <a href="index.php" class="font-display text-2xl tracking-wide text-eg-white">
        ELITE<span class="text-eg-red">GYM</span>
      </a>
      <ul class="flex items-center gap-8">
        <li><a href="about.php"    class="nav-link">About</a></li>
        <li><a href="services.php" class="nav-link">Plans</a></li>
        <li><a href="contact.php"  class="nav-link">Contact</a></li>
      </ul>
      <p class="text-eg-ash text-xs font-body">&copy; <?= date('Y') ?> EliteGym. All rights reserved.</p>
    </div>
  </footer>


  <!-- ══════════════════════════════════════════
       SCRIPTS
  ══════════════════════════════════════════ -->
  <script>
    // Mobile nav
    document.getElementById('navToggle').addEventListener('click', () => {
      document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    // Scroll reveal
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.sr').forEach(el => io.observe(el));
  </script>

</body>
</html>
