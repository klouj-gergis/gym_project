<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us — EliteGym</title>

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

    /* grain */
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
    .sr-l { opacity: 0; transform: translateX(-32px); transition: opacity 0.75s ease, transform 0.75s ease; }
    .sr-l.in { opacity: 1; transform: translateX(0); }
    .sr-r { opacity: 0; transform: translateX(32px); transition: opacity 0.75s ease, transform 0.75s ease; }
    .sr-r.in { opacity: 1; transform: translateX(0); }

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
    .h-anim-1 { animation: slideUp 0.7s ease 0.1s  both; }
    .h-anim-2 { animation: slideUp 0.7s ease 0.25s both; }
    .h-anim-3 { animation: slideUp 0.7s ease 0.4s  both; }

    /* form inputs */
    .field {
      width: 100%;
      background: #111;
      border: 1px solid #2a2a2a;
      color: #F0EDE8;
      font-family: 'Outfit', sans-serif;
      font-size: 0.9rem;
      padding: 0.9rem 1.1rem;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
      appearance: none;
      -webkit-appearance: none;
    }
    .field::placeholder { color: #555; }
    .field:focus {
      border-color: #D42B0F;
      box-shadow: 0 0 0 3px rgba(212,43,15,0.1);
    }
    .field-label {
      display: block;
      font-size: 0.72rem;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: #666;
      margin-bottom: 0.5rem;
      font-weight: 500;
    }

    /* submit button */
    .btn-submit {
      display: inline-flex; align-items: center; gap: 10px;
      background: #D42B0F; color: #fff;
      font-family: 'Barlow Condensed', sans-serif;
      font-weight: 700; font-size: 1rem;
      letter-spacing: 0.15em; text-transform: uppercase;
      padding: 1rem 2.6rem;
      border: none; cursor: pointer;
      position: relative; overflow: hidden;
      transition: color 0.3s;
      width: 100%;
      justify-content: center;
    }
    .btn-submit::before {
      content: ''; position: absolute; inset: 0;
      background: #FF3B1F;
      transform: translateX(-101%);
      transition: transform 0.35s cubic-bezier(0.77,0,0.175,1);
    }
    .btn-submit:hover::before { transform: translateX(0); }
    .btn-submit span, .btn-submit svg { position: relative; z-index: 1; }
    .btn-submit:disabled { opacity: 0.5; cursor: not-allowed; }
    .btn-submit:disabled::before { display: none; }

    /* success banner */
    .success-banner {
      display: none;
      background: rgba(212,43,15,0.08);
      border: 1px solid rgba(212,43,15,0.35);
      padding: 1rem 1.25rem;
      font-size: 0.88rem;
      color: #F0EDE8;
      align-items: center;
      gap: 10px;
    }
    .success-banner.show { display: flex; }

    /* info card */
    .info-card {
      background: #111;
      border: 1px solid #1e1e1e;
      transition: border-color 0.3s, transform 0.3s;
    }
    .info-card:hover {
      border-color: #D42B0F;
      transform: translateY(-4px);
    }

    /* loading spinner */
    @keyframes spin { to { transform: rotate(360deg); } }
    .spinner {
      width: 18px; height: 18px;
      border: 2px solid rgba(255,255,255,0.3);
      border-top-color: #fff;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
      display: none;
    }
    .btn-submit.loading .spinner { display: block; }
    .btn-submit.loading .btn-label { display: none; }

    /* map placeholder */
    .map-placeholder {
      background: repeating-linear-gradient(
        45deg,
        #111 0px, #111 28px,
        #131313 28px, #131313 29px
      );
      border: 1px solid #1e1e1e;
      position: relative;
      overflow: hidden;
    }
    .map-placeholder::before {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(ellipse at 50% 50%, rgba(212,43,15,0.06) 0%, transparent 70%);
    }
  </style>
</head>
<body class="font-body antialiased">

  <!-- ══════════════════════════════════════════
       NAV
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
        <li><a href="services.php" class="nav-link">Plans</a></li>
        <li><a href="contact.php"  class="nav-link" style="color:#F0EDE8">Contact</a></li>
      </ul>
      <a href="register.php" class="hidden md:inline-flex items-center gap-2 bg-eg-red text-white font-display font-bold text-sm tracking-widest uppercase px-6 py-2.5 hover:bg-eg-redHot transition-colors">
        Join Now
      </a>
      <button id="navToggle" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="Open menu">
        <span class="w-6 h-px bg-eg-bone block"></span>
        <span class="w-6 h-px bg-eg-bone block"></span>
        <span class="w-4 h-px bg-eg-red  block"></span>
      </button>
    </div>
    <div id="mobileMenu" class="hidden md:hidden bg-eg-ink border-t border-eg-steel px-6 py-8 space-y-5">
      <a href="index.php"    class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">Home</a>
      <a href="about.php"    class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">About</a>
      <a href="services.php" class="block font-display text-3xl uppercase text-eg-bone hover:text-eg-red transition-colors">Plans</a>
      <a href="contact.php"  class="block font-display text-3xl uppercase text-eg-red">Contact</a>
    </div>
  </nav>


  <!-- ══════════════════════════════════════════
       HEADER
  ══════════════════════════════════════════ -->
  <header class="relative pt-40 pb-24 grid-bg overflow-hidden bg-eg-black">

    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none">
      <span class="font-display font-black text-[20vw] leading-none uppercase text-white/[0.018] whitespace-nowrap">
        CONTACT
      </span>
    </div>
    <div class="absolute top-0 right-0 w-[500px] h-[400px] bg-eg-red opacity-[0.05] rounded-full blur-[120px] translate-x-1/2 -translate-y-1/4 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-eg-red opacity-[0.04] rounded-full blur-[80px] -translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
      <p class="h-anim-1 inline-flex items-center gap-3 text-eg-red text-xs tracking-ultra uppercase font-semibold mb-6">
        <span class="w-8 h-px bg-eg-red"></span>
        Get In Touch
        <span class="w-8 h-px bg-eg-red"></span>
      </p>
      <h1 class="h-anim-2 font-display font-black uppercase leading-none text-eg-white"
          style="font-size:clamp(4rem,12vw,9rem)">
        Contact<br><span class="text-eg-red">Us</span>
      </h1>
    </div>
  </header>


  <!-- ══════════════════════════════════════════
       MAIN CONTENT: FORM + INFO
  ══════════════════════════════════════════ -->
  <section class="bg-eg-black py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">
      <div class="grid lg:grid-cols-[1fr_400px] gap-12 xl:gap-20 items-start">


        <!-- ── LEFT: FORM ── -->
        <div class="sr-l">

          <div class="mb-10">
            <div class="w-12 h-[3px] bg-eg-red mb-4"></div>
            <p class="text-eg-red text-xs tracking-ultra uppercase font-semibold mb-3">Drop Us a Line</p>
            <h2 class="font-display uppercase leading-none text-eg-white" style="font-size:clamp(2.5rem,5vw,4rem)">
              Send A Message
            </h2>
          </div>

          <!-- PHP success flash (server-side) -->
          <?php if (!empty($_GET['sent']) && $_GET['sent'] === '1'): ?>
          <div class="success-banner show mb-6">
            <svg class="w-5 h-5 text-eg-red shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path d="M5 13l4 4L19 7"/>
            </svg>
            <span>Message sent! We'll get back to you within 24 hours.</span>
          </div>
          <?php endif; ?>

          <!-- JS success (client-side, shown after AJAX) -->
          <div class="success-banner mb-6" id="successMsg">
            <svg class="w-5 h-5 text-eg-red shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path d="M5 13l4 4L19 7"/>
            </svg>
            <span>Message sent! We'll get back to you within 24 hours.</span>
          </div>

          <!-- FORM
               - action / method: wire up to your PHP handler (e.g. contact-handler.php)
               - Add CSRF token field as needed
               - Swap fetch() in JS below for full-page submit if preferred
          -->
          <form id="contactForm"
                action="contact-handler.php"
                method="POST"
                novalidate
                class="space-y-6">

            <!-- CSRF token placeholder -->
            <!-- <?php // echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token'] ?? '') . '">'; ?> -->

            <!-- Name -->
            <div>
              <label for="name" class="field-label">Your Name</label>
              <input
                type="text"
                id="name"
                name="name"
                class="field"
                placeholder="Ahmed Hassan"
                required
                autocomplete="name"
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
              />
              <p class="text-eg-red text-xs mt-1.5 hidden" data-error="name">Please enter your name.</p>
            </div>

            <!-- Email -->
            <div>
              <label for="email" class="field-label">Email Address</label>
              <input
                type="email"
                id="email"
                name="email"
                class="field"
                placeholder="ahmed@example.com"
                required
                autocomplete="email"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
              />
              <p class="text-eg-red text-xs mt-1.5 hidden" data-error="email">Please enter a valid email address.</p>
            </div>

            <!-- Message -->
            <div>
              <label for="message" class="field-label">Message</label>
              <textarea
                id="message"
                name="message"
                rows="6"
                class="field resize-none"
                placeholder="How can we help you?"
                required
              ><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
              <p class="text-eg-red text-xs mt-1.5 hidden" data-error="message">Please enter a message.</p>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-submit" id="submitBtn">
              <div class="spinner" aria-hidden="true"></div>
              <span class="btn-label inline-flex items-center gap-2">
                Send Message
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                </svg>
              </span>
            </button>

          </form>
        </div>


        <!-- ── RIGHT: CONTACT INFO ── -->
        <div class="sr-r space-y-6" style="transition-delay:0.1s">

          <div class="mb-10">
            <div class="w-12 h-[3px] bg-eg-red mb-4"></div>
            <p class="text-eg-red text-xs tracking-ultra uppercase font-semibold mb-3">Where We Are</p>
            <h2 class="font-display uppercase leading-none text-eg-white" style="font-size:clamp(2.5rem,5vw,4rem)">
              Find Us
            </h2>
          </div>

          <?php
            $info_cards = [
              [
                'icon'    => '<path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                'label'   => 'Email',
                'value'   => 'info@elitegym.com',
                'href'    => 'mailto:info@elitegym.com',
                'is_link' => true,
              ],
              [
                'icon'    => '<path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
                'label'   => 'Phone',
                'value'   => '+20 100 123 4567',
                'href'    => 'tel:+201001234567',
                'is_link' => true,
              ],
              [
                'icon'    => '<path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
                'label'   => 'Address',
                'value'   => '123 Fitness Street, Cairo, Egypt',
                'href'    => 'https://maps.google.com/?q=Cairo,Egypt',
                'is_link' => true,
              ],
              [
                'icon'    => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
                'label'   => 'Hours',
                'value'   => 'Open 24/7',
                'href'    => null,
                'is_link' => false,
              ],
            ];

            foreach ($info_cards as $i => $card):
          ?>
          <div class="info-card p-6 flex items-start gap-4">
            <div class="w-10 h-10 flex items-center justify-center bg-eg-red/10 border border-eg-red/20 shrink-0 mt-0.5">
              <svg class="w-4 h-4 text-eg-red" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <?= $card['icon'] ?>
              </svg>
            </div>
            <div>
              <p class="text-eg-ash text-xs uppercase tracking-widest mb-1 font-medium">
                <?= htmlspecialchars($card['label']) ?>
              </p>
              <?php if ($card['is_link'] && $card['href']): ?>
                <a href="<?= htmlspecialchars($card['href']) ?>"
                   target="<?= str_starts_with($card['href'], 'http') ? '_blank' : '_self' ?>"
                   rel="noopener"
                   class="text-eg-bone text-sm font-light leading-snug hover:text-eg-red transition-colors">
                  <?= htmlspecialchars($card['value']) ?>
                </a>
              <?php else: ?>
                <p class="text-eg-bone text-sm font-light leading-snug">
                  <?= htmlspecialchars($card['value']) ?>
                </p>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>

          <!-- Map placeholder -->
          <!-- Replace with Google Maps embed iframe in production -->
          <div class="map-placeholder h-52 flex items-center justify-center mt-2">
            <div class="relative z-10 text-center">
              <!-- Map pin icon -->
              <svg class="w-8 h-8 text-eg-red mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <p class="text-eg-ash text-xs uppercase tracking-widest">123 Fitness Street, Cairo</p>
            </div>
          </div>
          <!--
          <iframe
            src="https://www.google.com/maps/embed?pb=YOUR_EMBED_URL"
            class="w-full h-52 border-0 grayscale contrast-125"
            allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
          -->

        </div><!-- /right -->
      </div><!-- /grid -->
    </div>
  </section>


  <!-- ══════════════════════════════════════════
       FOOTER
  ══════════════════════════════════════════ -->
  <!-- <?php // include 'partials/footer.php'; ?> -->
  <?php include 'includes/footer.php'; ?>


  <!-- ══════════════════════════════════════════
       SCRIPTS
  ══════════════════════════════════════════ -->
  <script>
    // ── Mobile nav ──
    document.getElementById('navToggle').addEventListener('click', () => {
      document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    // ── Scroll reveal ──
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.sr, .sr-l, .sr-r').forEach(el => io.observe(el));


    // ── Form: client-side validation + AJAX submit ──
    // To use full-page PHP submit instead, remove this block and
    // delete the novalidate attribute from the <form> tag.

    const form      = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const successMsg = document.getElementById('successMsg');

    function showError(field, show) {
      const err = document.querySelector(`[data-error="${field}"]`);
      if (err) err.classList.toggle('hidden', !show);
      document.getElementById(field)?.classList.toggle('border-eg-red', show);
    }

    function validateForm() {
      let valid = true;
      const name    = document.getElementById('name').value.trim();
      const email   = document.getElementById('email').value.trim();
      const message = document.getElementById('message').value.trim();
      const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      showError('name',    !name);
      showError('email',   !email || !emailRx.test(email));
      showError('message', !message);

      if (!name || !email || !emailRx.test(email) || !message) valid = false;
      return valid;
    }

    // Clear error on input
    ['name','email','message'].forEach(id => {
      document.getElementById(id)?.addEventListener('input', () => showError(id, false));
    });

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      if (!validateForm()) return;

      // Loading state
      submitBtn.disabled = true;
      submitBtn.classList.add('loading');

      try {
        const data = new FormData(form);

        // ── AJAX to PHP handler ──
        // Swap this for your real endpoint URL if different
        const res = await fetch(form.action, { method: 'POST', body: data });

        if (res.ok) {
          form.reset();
          successMsg.classList.add('show');
          successMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
          throw new Error('Server error');
        }
      } catch (err) {
        // Fallback: degrade to normal form submit on fetch failure
        form.removeEventListener('submit', arguments.callee);
        form.submit();
      } finally {
        submitBtn.disabled = false;
        submitBtn.classList.remove('loading');
      }
    });
  </script>

</body>
</html>
