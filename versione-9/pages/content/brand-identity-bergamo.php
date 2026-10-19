<?php
/* Pagina della categoria "Content" — stesso impianto delle altre pagine
   di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "brand-identity-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Content";
$heroTitle = "Brand identity.<br /><em>Coerente ovunque ti si incontri.</em>";
$heroLead = 'Logo, colori, font, tono di voce — e tutto quello che non
  si vede subito ma si sente: carta intestata, divise, stand in fiera.
  Quando ogni pezzo racconta la stessa cosa, chi ti incontra se ne
  accorge, anche senza saperlo spiegare.';
$ctaLine = 'Se i tuoi materiali oggi sembrano di aziende diverse,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Brand Identity Bergamo — eWeb</title>
    <meta
      name="description"
      content="Identità di marca coerente su ogni materiale: naming, logo, palette, tipografia, tono di voce. eWeb, Bergamo."
    />
    <meta name="theme-color" content="#044d8b" />

    <!-- Favicon: la graffa del logo ("eWeb}"), colorata in navy — vedi assets/img/favicon.ico/generazione in memoria di progetto. -->
    <link rel="icon" href="assets/img/favicon.ico" sizes="any" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16.png" />
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter+Tight:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="custom/css/style.css" />
  </head>
  <body class="is-loading">
    <!-- ============ PRELOADER ============ -->
    <div class="loader" aria-hidden="true">
      <div class="loader__inner">
        <div class="loader__count">
          <span class="loader__num">0</span><span class="loader__pct">%</span>
        </div>
        <div class="hero__brand-wrap">
          <span
            class="logo logo--loader logo--banner hero__brand"
            role="img"
            aria-label="eWeb — Progettiamo. Sviluppiamo. Comunichiamo. 10 years."
          ></span>
          <span class="hero__badge" aria-hidden="true"></span>
        </div>
      </div>
      <div class="loader__bar"><span></span></div>
    </div>

    <!-- ============ CURSOR ============ -->
    <div class="cursor" aria-hidden="true">
      <span class="cursor__label"></span>
    </div>

    <!-- ============ GRAIN ============ -->
    <div class="grain" aria-hidden="true"></div>

    <?php include __DIR__ . "/../../inc/header.php"; ?>

    <main id="top">
      <?php include __DIR__ . "/../../inc/service-hero.php"; ?>

      <!-- ============ IL CONTESTO ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Il contesto</span>
              <h2 class="h2 reveal-lines">
                Un logo diverso<br /><em>su ogni materiale, si nota.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            L'identità visiva di un marchio vive in ogni punto di
            contatto: il sito, l'imballaggio, una brochure, un font
            scelto male su un volantino. Quando ogni pezzo segue le
            stesse regole — logo, colori, tipografia — chi ti incontra
            riconosce un'azienda sola, non frammenti scollegati.
          </p>
          <p class="body-l reveal">
            Non è un vezzo estetico: è coerenza che si sente, anche da
            chi non saprebbe spiegare perché un marchio "sembra serio" e
            un altro no.
          </p>
        </div>
      </section>

      <!-- ============ DOVE SI VEDE ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Dove si vede</span>
              <h2 class="h2 reveal-lines">
                Dal sito<br /><em>allo stand in fiera.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Naming e logo</h3>
              <p>
                Il punto di partenza — il nome e il segno che tutto il
                resto dovrà seguire con coerenza.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Palette e tipografia</h3>
              <p>
                Colori e font che si ripetono ovunque, invece di cambiare
                a seconda di chi ha preparato l'ultimo materiale.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Materiali fisici</h3>
              <p>
                Carta intestata, divise, gadget, veicoli, stand — ogni
                oggetto che porta il tuo nome in giro per il mondo.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Tono di voce</h3>
              <p>
                Come scrivi e parli, non solo come ti disegni — anche
                quello fa parte dell'identità.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- ============ COSA CAMBIA ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa cambia, in concreto</span>
              <h2 class="h2 reveal-lines">
                Parte da missione<br /><em>e valori, non dall'estetica.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Prima guardiamo mercato e concorrenza, per capire dove puoi
            differenziarti davvero — poi traduciamo quello che ti rende
            diverso in segni, colori, parole. Il risultato non è "un bel
            logo": è un'identità che comunica lo scopo della tua azienda
            a chi la incontra, sia B2B sia B2C.
          </p>
        </div>
      </section>

      <?php include __DIR__ . "/../../inc/related.php"; ?>

      <?php include __DIR__ . "/../../inc/service-cta.php"; ?>
    </main>

    <?php include __DIR__ . "/../../inc/footer.php"; ?>

    <!-- ============ COOKIE BANNER ============ -->
    <div class="cookie-banner" data-cookie-banner hidden>
      <p>
        Usiamo solo cookie tecnici necessari al funzionamento del sito.
        <a href="#" class="link">Cookie Policy</a>
      </p>
      <div class="cookie-banner__actions">
        <button type="button" class="btn btn--ghost" data-cookie-reject>
          Solo necessari
        </button>
        <button type="button" class="btn btn--solid" data-cookie-accept>
          Accetta
        </button>
      </div>
    </div>

    <!-- ============ LIBS ============ -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrambleTextPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js"></script>
    <script src="custom/functions/script.js"></script>
  </body>
</html>
