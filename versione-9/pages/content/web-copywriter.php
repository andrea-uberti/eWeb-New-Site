<?php
/* Pagina della categoria "Content" — stesso impianto delle altre pagine
   di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "web-copywriter"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Content";
$heroTitle = "Copywriting.<br /><em>Scritto per essere letto e trovato.</em>";
$heroLead = 'Un testo che funziona fa due cose insieme: si legge bene e
  si fa leggere da chi lo cerca su Google. Le due cose richiedono mani
  diverse che lavorano insieme — non un solo testo scritto due volte.';
$ctaLine = 'Se i tuoi testi oggi non convertono né si posizionano,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Web Copywriter — eWeb</title>
    <meta
      name="description"
      content="Testi scritti per convertire e per essere trovati: copywriting e SEO copywriting su misura. eWeb, Bergamo."
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
                Scrivere bene<br /><em>e scrivere per essere trovati.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Un testo può essere scritto benissimo e restare invisibile se
            non parla la lingua di chi lo cerca — title, meta title, H1,
            description, testo alternativo delle immagini: dettagli
            tecnici che decidono se un contenuto arriva o no a chi lo
            starebbe leggendo volentieri.
          </p>
          <p class="body-l reveal">
            Per questo un buon testo per il web nasce da un lavoro di
            squadra: chi scrive, chi conosce la SEO, chi guarda come le
            persone usano davvero la pagina e i dati che ne escono.
          </p>
        </div>
      </section>

      <!-- ============ COSA SCRIVIAMO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa scriviamo</span>
              <h2 class="h2 reveal-lines">
                Dalla pagina del sito<br /><em>al testo che convince.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Testi nuovi</h3>
              <p>
                Per aziende, professionisti ed enti — pensati per il
                settore e il pubblico specifico di chi li legge.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Riscrittura</h3>
              <p>
                Un testo che già esiste, ma non convince o non si
                posiziona, rivisto senza partire sempre da zero.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Struttura SEO</h3>
              <p>
                Ogni pagina costruita anche nei dettagli tecnici che la
                rendono leggibile dai motori di ricerca.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Seguito nel tempo</h3>
              <p>
                Con report sui risultati — un testo pubblicato non è un
                lavoro finito, è l'inizio di qualcosa da osservare.
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
                Da una visita<br /><em>a un contatto reale.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Un testo che funziona porta chi arriva sulla pagina un passo
            più vicino a scrivere, chiamare o comprare — non solo a
            leggere e andarsene. È lì che si vede davvero se il
            copywriting ha fatto il suo lavoro, non solo nel numero di
            visite che la pagina riceve.
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
