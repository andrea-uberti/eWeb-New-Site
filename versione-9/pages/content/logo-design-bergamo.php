<?php
/* Pagina della categoria "Content" — stesso impianto delle altre pagine
   di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "logo-design-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Content";
$heroTitle = "Logo.<br /><em>Il primo segno che resta in mente.</em>";
$heroLead = 'Riconoscibile, originale, capace di funzionare piccolo come
  grande, su schermo come su carta — un buon logo tiene insieme regole
  precise e, a volte, la voglia di romperle apposta. Nasce dopo aver
  capito chi sei, non prima.';
$ctaLine = 'Se il tuo logo non ti rappresenta più,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Logo Design Bergamo — eWeb</title>
    <meta
      name="description"
      content="Logo disegnato dopo l'analisi del brand e della concorrenza, pensato per restare riconoscibile. eWeb, Bergamo."
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
                "Logo" viene da logos:<br /><em>parola, pensiero.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Un logo non è un disegno a caso: è l'identità visiva che
            rappresenta un'azienda in un singolo segno, spesso l'unica
            cosa che resta in mente dopo un contatto veloce. Deve
            funzionare su uno schermo piccolo come su un'insegna, in
            bianco e nero come a colori — senza perdere chi sei.
          </p>
          <p class="body-l reveal">
            Riconoscibilità, originalità e versatilità sono le regole di
            base. Ma le regole, quando ha senso farlo, si possono anche
            rompere — se quello che ne esce ti rappresenta davvero.
          </p>
        </div>
      </section>

      <!-- ============ COME CI ARRIVIAMO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Come ci arriviamo</span>
              <h2 class="h2 reveal-lines">
                Prima si capisce,<br /><em>poi si disegna.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Analisi del brand</h3>
              <p>
                Chi sei, cosa fai, cosa vuoi comunicare — prima di
                qualsiasi bozzetto sulla carta.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Analisi della concorrenza</h3>
              <p>
                Guardare cosa fanno già gli altri nel tuo settore, per non
                finire a somigliargli per caso.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Fase creativa</h3>
              <p>
                Solo dopo i primi due passaggi — il disegno arriva per
                ultimo, non per primo.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Adeguato al settore</h3>
              <p>
                Un segno che comunica il settore giusto a prima vista,
                senza bisogno di spiegarlo.
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
                Non finisce qui.<br /><em>È il primo pezzo.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Un logo nuovo raramente vive da solo: diventa la base della
            brand identity, della palette colori, di tutto quello che
            porterà il tuo nome — dal sito al packaging. Vedi la pagina
            dedicata all'identità di marca qui sotto per il passo dopo.
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
