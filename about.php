<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About — EliteGym</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts: Bebas Neue (display) + DM Sans (body) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Bebas Neue', 'sans-serif'],
            body: ['DM Sans', 'sans-serif'],
          },
          colors: {
            brand: {
              red:    '#E8220A',
              dark:   '#0D0D0D',
              gray:   '#1A1A1A',
              muted:  '#2E2E2E',
              light:  '#F5F3EE',
              cream:  '#EDE9E1',
              silver: '#8A8A8A',
            },
          },
          letterSpacing: {
            widest2: '0.25em',
          },
          keyframes: {
            fadeUp: {
              '0%':   { opacity: '0', transform: 'translateY(32px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            slideIn: {
              '0%':   { opacity: '0', transform: 'translateX(-24px)' },
              '100%': { opacity: '1', transform: 'translateX(0)' },
            },
            scaleX: {
              '0%':   { transform: 'scaleX(0)' },
              '100%': { transform: 'scaleX(1)' },
            },
          },
          animation: {
            'fade-up':   'fadeUp 0.7s ease forwards',
            'slide-in':  'slideIn 0.6s ease forwards',
            'scale-x':   'scaleX 0.8s ease forwards',
          },
        },
      },
    }
  </script>

  <style>
    /* ── Base ── */
    body {
      font-family: 'DM Sans', sans-serif;
      background-color: #0D0D0D;
      color: #F5F3EE;
      overflow-x: hidden;
    }

    /* ── Noise texture overlay ── */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 9999;
      opacity: 0.35;
    }

    /* ── Scroll-reveal utility ── */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .reveal-left {
      opacity: 0;
      transform: translateX(-30px);
      transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .reveal-left.visible {
      opacity: 1;
      transform: translateX(0);
    }

    /* ── Red accent bar ── */
    .red-bar::before {
      content: '';
      display: block;
      width: 48px;
      height: 3px;
      background: #E8220A;
      margin-bottom: 1rem;
      transform-origin: left;
    }

    /* ── Stat card hover ── */
    .stat-card {
      transition: transform 0.3s ease, background 0.3s ease;
    }
    .stat-card:hover {
      transform: translateY(-6px);
      background: #E8220A;
    }
    .stat-card:hover .stat-label {
      color: #fff;
    }

    /* ── Team card hover ── */
    .team-card {
      transition: transform 0.35s ease;
    }
    .team-card:hover {
      transform: translateY(-8px);
    }
    .team-card:hover .team-accent {
      width: 100%;
    }
    .team-accent {
      width: 40px;
      height: 2px;
      background: #E8220A;
      transition: width 0.4s ease;
    }

    /* ── Audio player custom ── */
    audio {
      width: 100%;
      filter: invert(1) hue-rotate(180deg);
    }

    /* ── Diagonal section divider ── */
    .skew-top {
      clip-path: polygon(0 5%, 100% 0, 100% 100%, 0 100%);
    }
    .skew-both {
      clip-path: polygon(0 5%, 100% 0, 100% 95%, 0 100%);
    }
  </style>
</head>

<body class="font-body antialiased">

  <!-- ══════════════════════════════════════════════
       HEADER / HERO
  ══════════════════════════════════════════════ -->
  <header class="relative min-h-[92vh] flex items-center overflow-hidden bg-brand-dark">

    <!-- Background diagonal accent -->
    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute top-0 right-0 w-1/2 h-full bg-brand-red opacity-5 skew-x-[-8deg] translate-x-16"></div>
      <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-brand-red opacity-5 blur-3xl"></div>
    </div>

    <!-- Vertical label -->
    <div class="absolute left-8 top-1/2 -translate-y-1/2 hidden lg:flex flex-col items-center gap-3">
      <span class="text-brand-silver text-xs tracking-widest2 font-body uppercase rotate-[-90deg] whitespace-nowrap">EliteGym Cairo</span>
      <div class="w-px h-24 bg-brand-muted"></div>
    </div>

    <div class="container mx-auto px-6 lg:px-24 py-32 relative z-10">

      <!-- Eyebrow -->
      <p class="reveal text-brand-red text-xs tracking-widest2 uppercase font-body font-semibold mb-5"
         style="transition-delay:0.05s">Our Story</p>

      <!-- Headline -->
      <h1 class="reveal font-display text-[clamp(4rem,12vw,10rem)] leading-none uppercase text-brand-light mb-8"
          style="transition-delay:0.15s">
        About<br>
        <span class="text-brand-red">Elite</span>Gym
      </h1>

      <!-- Divider -->
      <div class="reveal w-24 h-0.5 bg-brand-red mb-8" style="transition-delay:0.25s"></div>

      <!-- Subtext -->
      <p class="reveal max-w-xl text-brand-silver text-lg leading-relaxed font-light"
         style="transition-delay:0.35s">
        Founded in 2019, EliteGym has grown from a small training space into Cairo's premier fitness facility.
        We believe fitness is for everyone — not just athletes.
      </p>
    </div>

    <!-- Scroll hint -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-brand-silver opacity-50">
      <span class="text-xs tracking-widest uppercase">Scroll</span>
      <div class="w-px h-10 bg-brand-silver animate-bounce"></div>
    </div>
  </header>


  <!-- ══════════════════════════════════════════════
       MISSION
  ══════════════════════════════════════════════ -->
  <section class="skew-top bg-brand-gray py-32 -mt-8">
    <div class="container mx-auto px-6 lg:px-24 pt-8">

      <div class="grid lg:grid-cols-2 gap-16 items-start">

        <!-- Left: headline -->
        <div>
          <p class="reveal red-bar text-brand-red text-xs tracking-widest2 uppercase font-semibold mb-2">
            What We Stand For
          </p>
          <h2 class="reveal font-display text-[clamp(3rem,7vw,6rem)] uppercase leading-none text-brand-light">
            Our<br>Mission
          </h2>
        </div>

        <!-- Right: paragraphs -->
        <div class="space-y-6 pt-4">
          <p class="reveal text-brand-silver leading-relaxed text-lg" style="transition-delay:0.1s">
            To provide world-class training facilities and expert coaching to every person who walks through our doors —
            regardless of their starting point.
          </p>
          <p class="reveal text-brand-silver leading-relaxed text-lg" style="transition-delay:0.2s">
            We measure success not in months, but in lifelong transformations. Every member who hits a goal is a win for the whole team.
          </p>
        </div>

      </div>
    </div>
  </section>


  <!-- ══════════════════════════════════════════════
       STATS
  ══════════════════════════════════════════════ -->
  <section class="bg-brand-dark py-28">
    <div class="container mx-auto px-6 lg:px-24">

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

        <?php
          $stats = [
            ['value' => '2019', 'label' => 'Founded'],
            ['value' => '500+', 'label' => 'Members'],
            ['value' => '12',   'label' => 'Trainers'],
            ['value' => '3',    'label' => 'Locations'],
          ];
          foreach ($stats as $i => $stat):
        ?>
        <div class="stat-card reveal bg-brand-gray border border-brand-muted p-8 group cursor-default"
             style="transition-delay: <?= $i * 0.1 ?>s">
          <p class="font-display text-5xl lg:text-6xl text-brand-red mb-3"><?= htmlspecialchars($stat['value']) ?></p>
          <p class="stat-label text-brand-silver text-sm tracking-widest uppercase font-semibold transition-colors duration-300">
            <?= htmlspecialchars($stat['label']) ?>
          </p>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>


  <!-- ══════════════════════════════════════════════
       TEAM
  ══════════════════════════════════════════════ -->
  <section class="skew-both bg-brand-gray py-40">
    <div class="container mx-auto px-6 lg:px-24">

      <!-- Section heading -->
      <div class="mb-20 text-center">
        <p class="reveal text-brand-red text-xs tracking-widest2 uppercase font-semibold mb-4">The People Behind It</p>
        <h2 class="reveal font-display text-[clamp(3rem,7vw,6rem)] uppercase leading-none text-brand-light">
          Meet The Team
        </h2>
      </div>

      <!-- Cards -->
      <div class="grid md:grid-cols-3 gap-8">

        <?php
          $team = [
            [
              'name'       => 'Ahmed Hassan',
              'role'       => 'Head Coach',
              'specialty'  => 'Strength & Conditioning',
              'initials'   => 'AH',
            ],
            [
              'name'       => 'Sara Mohamed',
              'role'       => 'Nutrition Coach',
              'specialty'  => 'Diet & Weight Loss',
              'initials'   => 'SM',
            ],
            [
              'name'       => 'Omar Khaled',
              'role'       => 'Cardio Specialist',
              'specialty'  => 'Endurance & HIIT',
              'initials'   => 'OK',
            ],
          ];
          foreach ($team as $i => $member):
        ?>
        <div class="team-card reveal bg-brand-dark border border-brand-muted p-8 flex flex-col gap-6"
             style="transition-delay: <?= $i * 0.12 ?>s">

          <!-- Avatar -->
          <div class="w-16 h-16 rounded-full bg-brand-muted flex items-center justify-center
                      font-display text-2xl text-brand-light border border-brand-muted select-none">
            <?= htmlspecialchars($member['initials']) ?>
          </div>

          <!-- Info -->
          <div>
            <h3 class="font-display text-3xl uppercase text-brand-light leading-tight mb-1">
              <?= htmlspecialchars($member['name']) ?>
            </h3>
            <p class="text-brand-red text-sm font-semibold tracking-wide uppercase mb-1">
              <?= htmlspecialchars($member['role']) ?>
            </p>
            <div class="team-accent mb-3"></div>
            <p class="text-brand-silver text-sm"><?= htmlspecialchars($member['specialty']) ?></p>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>


  <!-- ══════════════════════════════════════════════
       AUDIO / TESTIMONIALS
  ══════════════════════════════════════════════ -->
  <section class="bg-brand-dark py-28">
    <div class="container mx-auto px-6 lg:px-24">

      <div class="grid lg:grid-cols-2 gap-16 items-center">

        <!-- Left text -->
        <div>
          <p class="reveal text-brand-red text-xs tracking-widest2 uppercase font-semibold mb-4">Real Stories</p>
          <h2 class="reveal font-display text-[clamp(3rem,6vw,5rem)] uppercase leading-none text-brand-light mb-6">
            Hear From<br>Our Members
          </h2>
          <p class="reveal text-brand-silver text-lg leading-relaxed max-w-md" style="transition-delay:0.15s">
            Listen to real success stories from EliteGym members.
          </p>
        </div>

        <!-- Right: audio players -->
        <div class="space-y-6">

          <?php
            // Replace src values with actual audio file paths in your project
            $audio_tracks = [
              ['label' => 'Ahmed — Lost 20kg in 4 months',    'src' => '/audio/testimonial-ahmed.mp3'],
              ['label' => 'Nour — Ran her first marathon',     'src' => '/audio/testimonial-nour.mp3'],
              ['label' => 'Kareem — Gained confidence & muscle','src' => '/audio/testimonial-kareem.mp3'],
            ];
            foreach ($audio_tracks as $i => $track):
          ?>
          <div class="reveal bg-brand-gray border border-brand-muted p-5 group"
               style="transition-delay: <?= $i * 0.1 ?>s">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-8 h-8 flex items-center justify-center bg-brand-red rounded-sm shrink-0">
                <!-- Play icon -->
                <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 16 16" fill="currentColor">
                  <path d="M3 2.5l10 5.5-10 5.5V2.5z"/>
                </svg>
              </div>
              <p class="text-brand-light text-sm font-medium"><?= htmlspecialchars($track['label']) ?></p>
            </div>
            <audio controls preload="none">
              <source src="<?= htmlspecialchars($track['src']) ?>" type="audio/mpeg" />
              Your browser does not support the audio element.
            </audio>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>


  <!-- ══════════════════════════════════════════════
       FOOTER CTA STRIP
  ══════════════════════════════════════════════ -->
  <div class="bg-brand-red py-14">
    <div class="container mx-auto px-6 lg:px-24 flex flex-col md:flex-row items-center justify-between gap-6">
      <p class="font-display text-4xl md:text-5xl uppercase text-white">Ready to Start?</p>
      <a href="/plans.php"
         class="inline-block border-2 border-white text-white font-body font-semibold text-sm tracking-widest uppercase
                px-10 py-4 hover:bg-white hover:text-brand-red transition-colors duration-300">
        Join EliteGym
      </a>
    </div>
  </div>

<?php include 'includes/footer.php'; ?>
  <!-- ══════════════════════════════════════════════
       SCROLL REVEAL SCRIPT
  ══════════════════════════════════════════════ -->
  <script>
    (function () {
      const els = document.querySelectorAll('.reveal, .reveal-left');
      const io  = new IntersectionObserver((entries) => {
        entries.forEach(e => {
          if (e.isIntersecting) {
            e.target.classList.add('visible');
            io.unobserve(e.target);
          }
        });
      }, { threshold: 0.15 });
      els.forEach(el => io.observe(el));
    })();
  </script>

</body>
</html>
