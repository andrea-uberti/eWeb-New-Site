<?php
/* Pagina della categoria "Software Web" — stesso impianto delle altre
   pagine di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "software-gestione-timbrature-personale"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Software Web";
$heroTitle = "Timbrature.<br /><em>Dati veri, non stime a fine mese.</em>";
$heroLead = 'Orari, turni, straordinari raccolti da rilevatori, app o QR
  code — ed esportati dove servono, verso il gestionale paghe, senza
  passaggi a mano. Conforme agli obblighi di legge, pensato sul tuo modo
  di organizzare il personale.';
$ctaLine = 'Se le presenze oggi si ricostruiscono a fine mese,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Software Gestione Timbrature Personale — eWeb</title>
    <meta
      name="description"
      content="Rilevazione presenze su misura, da rilevatori, app o QR code, esportata verso il gestionale paghe. Software di eWeb, Bergamo."
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
                Ricostruire le presenze<br /><em>non dovrebbe essere un lavoro.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Orari, turni, straordinari: quando le presenze si tengono su
            foglio o si ricostruiscono a memoria, ogni fine mese diventa
            un lavoro a sé. Un software di rilevazione le raccoglie da
            sole, da rilevatori fisici, app o QR code, e le tiene pronte
            quando servono — non solo quando c'è tempo di cercarle.
          </p>
          <p class="body-l reveal">
            Non è solo un obbligo di legge (anche se lo è, e questo
            software lo rispetta): è anche il modo più semplice per
            capire davvero come lavora il personale.
          </p>
        </div>
      </section>

      <!-- ============ COSA CAMBIA PER CHI GESTISCE ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa cambia per chi gestisce</span>
              <h2 class="h2 reveal-lines">
                Turni più equi,<br /><em>carichi più chiari.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Dati sempre pronti</h3>
              <p>
                Orari e straordinari esportati verso il gestionale paghe,
                senza passaggi a mano tra un sistema e l'altro.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Pianificazione più semplice</h3>
              <p>
                Turni e carichi di lavoro distribuiti su dati reali, non
                su una stima di quanto ciascuno lavora davvero.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Più canali di rilevazione</h3>
              <p>
                Rilevatori dedicati, app o QR code — quello che si adatta
                meglio a come è organizzato il tuo personale.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Conforme per costruzione</h3>
              <p>
                Pensato per rispettare gli obblighi sul Libro Unico del
                Lavoro, non un adattamento successivo.
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
                Niente da installare.<br /><em>Tutto esportabile.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Accessibile da qualsiasi browser, con dati consultabili ed
            esportabili in ogni momento e backup programmati — niente
            da configurare su ogni singolo dispositivo. E quando serve
            qualcosa in più — magazzino, ticketing, CRM — si aggiunge
            come modulo, costruito sulla stessa logica su misura.
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
