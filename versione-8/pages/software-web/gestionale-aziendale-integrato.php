<?php
/* Pagina della categoria "Software Web" — stesso impianto delle altre
   pagine di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "gestionale-aziendale-integrato"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Software Web";
$heroTitle = "Gestionale integrato.<br /><em>La tua azienda, in un posto solo.</em>";
$heroLead = 'Contabilità, magazzino, vendite e acquisti — oggi probabilmente
  su strumenti diversi che non si parlano tra loro. Un gestionale su
  misura li mette insieme, accessibile da qualsiasi dispositivo, ovunque
  tu lavori.';
$ctaLine = 'Se i tuoi dati vivono ancora in software diversi che non
  comunicano, <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestionale Aziendale Integrato — eWeb</title>
    <meta
      name="description"
      content="Contabilità, magazzino, vendite e acquisti in un unico gestionale su misura, accessibile da qualsiasi dispositivo. Software di eWeb, Bergamo."
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
                Dati giusti,<br /><em>sparsi nei posti sbagliati.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Contabilità in un software, magazzino in un altro, preventivi
            in un terzo — spesso funzionano bene presi singolarmente, ma
            non si parlano tra loro. Ogni volta che un dato deve passare
            da uno strumento all'altro c'è un copia-incolla, un errore
            possibile, un ritardo.
          </p>
          <p class="body-l reveal">
            Un gestionale integrato non sostituisce tutto per principio:
            mette insieme quello che oggi è separato, in un unico posto
            accessibile da qualsiasi dispositivo — in ufficio o fuori.
          </p>
        </div>
      </section>

      <!-- ============ COSA METTI INSIEME ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa metti insieme</span>
              <h2 class="h2 reveal-lines">
                Da un software lento<br /><em>a uno che segue il lavoro.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Contabilità e fatturazione</h3>
              <p>
                Fatturazione elettronica compresa, costruita intorno al
                tuo processo e non a un template generico.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Magazzino e vendite</h3>
              <p>
                Giacenze, ordini e vendite sempre sincronizzati — senza
                dover controllare due sistemi per avere un dato solo.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Report su misura</h3>
              <p>
                Ore di lavoro, vendite settimanali, spesa per fornitore:
                gli indicatori che contano davvero per te, non standard.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Accesso ovunque</h3>
              <p>
                Da qualsiasi dispositivo, con condivisione sicura delle
                informazioni tra chi deve vederle.
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
                Cresce con l'azienda,<br /><em>non la frena.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Nessuna installazione hardware, dati consultabili in tempo
            reale, monitoraggio di quello che conta senza aspettare fine
            mese. E quando serve qualcosa in più — magazzino, timbrature,
            un CRM — si aggiunge come modulo, senza ripartire da zero.
            Più di dieci anni di gestionali costruiti così ci hanno
            insegnato dove nascono davvero i rallentamenti.
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
