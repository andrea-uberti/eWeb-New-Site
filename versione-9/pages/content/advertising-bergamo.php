<?php
/* Pagina della categoria "Content" — stesso impianto delle altre pagine
   di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). Questa pagina guarda il
   marketing dal lato "above the line" (notorietà, pubblico ampio); la
   sorella below-the-line-bergamo.php guarda lo stesso tema dal lato
   opposto (vendita, pubblico mirato) — stesso argomento di base nel
   vecchio sito, differenziato qui per non duplicare il contenuto. */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "advertising-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Content";
$heroTitle = "Advertising.<br /><em>Farsi conoscere, prima di vendere.</em>";
$heroLead = 'Prima di chiedere a qualcuno di comprare, serve che sappia
  che esisti — e che si ricordi di te quando arriva il momento. È il
  lavoro della pubblicità ad ampio raggio: costruire notorietà, non
  chiudere una vendita subito.';
$ctaLine = 'Se nessuno sa ancora chi sei, prima di vendere,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Advertising Bergamo — eWeb</title>
    <meta
      name="description"
      content="Pubblicità ad ampio raggio per costruire notorietà di marca: media, riviste di settore, social, sponsorizzazioni. eWeb, Bergamo."
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
                Non tutta la pubblicità<br /><em>vuole una vendita subito.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            C'è un marketing che parla a un pubblico ampio per farsi
            conoscere — il cosiddetto "above the line" — e un marketing
            che parla a un gruppo preciso per vendere subito (lo trovi
            nella pagina sul below the line qui sotto). Il primo costruisce
            la base su cui il secondo poi lavora meglio.
          </p>
          <p class="body-l reveal">
            Senza notorietà, anche la campagna più mirata parla a
            qualcuno che non ti conosce ancora — e la fiducia, in quel
            caso, va costruita da zero ogni volta.
          </p>
        </div>
      </section>

      <!-- ============ COSA COMPRENDE ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa comprende</span>
              <h2 class="h2 reveal-lines">
                Dai grandi media<br /><em>alle riviste di settore.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Media e stampa</h3>
              <p>
                Pubblicità sui canali generalisti e sulle riviste del
                tuo settore, dove il pubblico giusto già guarda.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Social e display</h3>
              <p>
                Visibilità ampia, pensata per farti riconoscere più che
                per chiudere subito una vendita.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Email a grandi liste</h3>
              <p>
                Comunicazione diffusa, diversa dalle campagne mirate di
                email marketing che trovi nella pagina dedicata.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Sponsorizzazioni</h3>
              <p>
                Eventi e iniziative che associano il tuo nome a un
                contesto che il tuo pubblico già frequenta.
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
                Si misura diverso<br /><em>da una campagna di vendita.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Qui non si guarda solo al ritorno immediato: contano la
            notorietà, il ricordo del brand, quante persone in più ti
            riconoscono quando arriva il momento in cui devono scegliere.
            È un investimento a orizzonte più lungo — e per questo va
            pianificato insieme alle attività più mirate, non al posto
            loro.
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
        Usiamo cookie tecnici necessari al funzionamento del sito. Con il
        tuo consenso carichiamo anche la mappa di Google, che pianta
        cookie di terze parti.
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
